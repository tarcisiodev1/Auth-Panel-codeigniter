<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        echo "register page";
    }

    public function register()
    {
        return view('auth/register');
    }

    public function login()
    {
        return view('auth/login');
    }
}
