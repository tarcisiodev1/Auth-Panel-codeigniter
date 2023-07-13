<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;

class Post extends BaseController
{
    public function index(String $slug)
    {
        // String $slug
        $post = new PostModel();
        $post = $post->select('posts.id,posts.title,posts.slug,posts.body,posts.created_at')->where('posts.slug', $slug)->first();

        // var_dump($post);
        // die();

        $data = [
            'post' => $post,
        ];

        return view('dashboard/postView',  $data);
    }

    public function store()
    {


        return view('dashboard/post');
    }

    public function create()
    {

        // var_dump("ergremropgmreogoe");

        // die();
        if (!$this->request->is('post')) {

            return redirect()->route('/');
        }
        $validated = $this->validate(
            [
                'title' => 'required|max_length[255]|min_length[3]',
                // 'user' => 'required|is_unique[users.user]',
                // 'name' => 'required',
                // 'email' => 'required',
                // 'profile' => 'required',
                'body' => 'required|max_length[800]|min_length[10]',
                // 'avatar' => 'required',
            ],
        );

        if (!$validated) {
            return redirect()->route('post.store')->with('errors', $this->validator->getErrors());
        }
        $post = $this->request->getPost();




        $postModel = new PostModel();

        $inserted = $postModel->insert([
            'user_id' => session()->get('id'),
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ]);
        if (!$inserted) {
            return redirect()->route('post.store')->with('error', 'OCORREU UM ERRO AO  CADASTRAR USUARIO 🥹');
        }
        return redirect()->back()->with('notification', 'Post realizado com sucesso!🥳');
    }
    public function edit(String $slug)
    {
        $post = new PostModel();
        $post = $post->select('posts.id,posts.title,posts.slug,posts.body,posts.created_at')->where('posts.slug', $slug)->first();

        $data = [
            'post' => $post,
        ];


        return view('dashboard/postedit', $data);
    }

    public function update(String $slug)
    {
        if (!$this->request->is('post')) {

            return redirect()->route('/');
        }
        $validated = $this->validate(
            [
                'title' => 'required|max_length[255]|min_length[3]',
                // 'user' => 'required|is_unique[users.user]',
                // 'name' => 'required',
                // 'email' => 'required',
                // 'profile' => 'required',
                'body' => 'required|max_length[800]|min_length[10]',
                // 'avatar' => 'required',
            ],
        );

        if (!$validated) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }
        $post = $this->request->getPost();

        // var_dump($post['body']);
        // var_dump($post['title']);
        // die();
        $postModel = new PostModel();
        $id = $postModel->select('id')->where('slug', $slug)->first()->id;
        // var_dump($id);
        // die();
        $data = [
            'user_id' => session()->get('id'),
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
        ];
        // var_dump($data);
        // die();

        $updated = $postModel->update($id, $data);
        if (!$updated) {
            return redirect()->back()->with('error', 'OCORREU UM ERRO AO  CADASTRAR USUARIO 🥹');
        }


        return redirect()->route('/')->with('notification', 'Edição realizada com sucesso!🥳');
    }

    public function destroy(String $slug)
    {
        $postModel = new PostModel();
        $id = $postModel->select('id')->where('slug', $slug)->first()->id;
        // var_dump($id);
        // die();
        $deleted = $postModel->delete(['id' => $id]);
        if (!$deleted) {
            return redirect()->back()->with('error', 'OCORREU UM ERRO AO  CADASTRAR USUARIO 🥹');
        }

        return redirect()->route('/')->with('notification', 'Post deletado com sucesso!👍🏻');
    }
}
