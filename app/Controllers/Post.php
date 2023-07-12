<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Post extends BaseController
{
    public function index()
    {
        return view('dashboard/post');
    }
}
