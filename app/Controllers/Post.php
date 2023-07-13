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
            return redirect()->route('auth.register')->with('error', 'OCORREU UM ERRO AO  CADASTRAR USUARIO 🥹');
        }

        return view('dashboard/post');
    }
}
