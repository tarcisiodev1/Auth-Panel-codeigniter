<?php

namespace App\Controllers;

class IndexDashboard extends BaseController
{
    public function index(string $csrf)
    {

        if ($csrf !== csrf_hash()) {
            return redirect()->route('/');
        }

        return view('fetch/_dashboard');
    }
}
