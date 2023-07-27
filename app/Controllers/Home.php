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
