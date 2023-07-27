<?php

namespace App\Controllers;

use App\Models\PostModel;

class Home extends BaseController
{
    public function index()
    {
        $postmodel = new PostModel();
        $posts     = $postmodel->select('id,title,slug,created_at')->orderBy('id', 'DESC')->paginate(15);

        $postmodel->pager->links();
        $postmodel->pager->getPerPage();

        return view('home', ['posts' => $posts, 'pager' => $postmodel->pager]);
    }
}
