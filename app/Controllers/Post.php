<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) 2021 CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Post extends BaseController
{
    //usando injeção de dependencia para o model

    private $post;


    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {

        parent::initController($request, $response, $logger);

        $this->post = model('PostModel');
    }

    public function index(string $slug)
    {


        $post = $this->post->select('posts.id,posts.title,posts.slug,posts.body,posts.created_at')->where('posts.slug', $slug)->first();

        $data = [
            'post' => $post,
        ];

        return view('dashboard/postView', $data);
    }

    public function store()
    {

        return view('dashboard/post');
    }

    public function create()
    {

        if (!$this->request->is('post')) {

            return redirect()->route('/');
        }
        $validated = $this->validate(
            [
                'title' => 'required|max_length[255]|min_length[3]',

                'body' => 'required|max_length[800]|min_length[10]',

            ],
        );

        if (!$validated) {
            return redirect()->route('post.store')->with('errors', $this->validator->getErrors());
        }
        $post = $this->request->getPost();



        $inserted = $this->post->insert([
            'user_id' => session()->get('id'),
            'title'   => $post['title'],
            'slug'    => url_title($post['title'], '-', true),
            'body'    => $post['body'],
        ]);
        if (!$inserted) {
            return redirect()->route('post.store')->with('error', 'OCORREU UM ERRO AO  CADASTRAR USUARIO 🥹');
        }

        return redirect()->back()->with('notification', 'Post realizado com sucesso!🥳');
    }

    public function edit(string $slug)
    {

        $post = $this->post->select('posts.id,posts.title,posts.slug,posts.body,posts.created_at')->where('posts.slug', $slug)->first();

        $data = [
            'post' => $post,
        ];

        return view('dashboard/postedit', $data);
    }

    public function update(string $slug)
    {
        if (!$this->request->is('post')) {

            return redirect()->route('/');
        }
        $validated = $this->validate(
            [
                'title' => 'required|max_length[255]|min_length[3]',

                'body' => 'required|max_length[800]|min_length[10]',
            ],
        );

        if (!$validated) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        $post = $this->request->getPost();


        $id        = $this->post->select('id')->where('slug', $slug)->first()->id;

        $data = [
            'user_id' => session()->get('id'),
            'title'   => $post['title'],
            'slug'    => url_title($post['title'], '-', true),
            'body'    => $post['body'],
        ];

        $updated = $this->post->update($id, $data);
        if (!$updated) {
            return redirect()->back()->with('error', 'OCORREU UM ERRO AO  CADASTRAR USUARIO 🥹');
        }

        return redirect()->route('/')->with('notification', 'Edição realizada com sucesso!🥳');
    }

    public function destroy(string $slug)
    {



        $id        = $this->post->select('id')->where('slug', $slug)->first()->id;

        $deleted = $this->post->delete(['id' => $id]);
        if (!$deleted) {
            return redirect()->back()->with('error', 'OCORREU UM ERRO AO  CADASTRAR USUARIO 🥹');
        }

        return redirect()->route('/')->with('notification', 'Post deletado com sucesso!👍🏻');
    }
}
