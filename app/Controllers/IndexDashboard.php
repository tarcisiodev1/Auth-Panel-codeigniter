<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class IndexDashboard extends BaseController
{
    public function index(String $csrf)
    {



        if ($csrf !== csrf_hash()) {
            return redirect()->route('/');
        }

        return view('fetch/_dashboard');
    }
}
