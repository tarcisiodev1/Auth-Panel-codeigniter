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



class IndexDashboard extends BaseController
{
    public function index(string $csrf)
    {

        if ($csrf !== csrf_hash()) {
            return redirect()->route('/');
        }

        // $avatarPath    = WRITEPATH .
        //     'uploads\images\\' . session()->get('avatar');



        return view('fetch/_dashboard',);
    }

    public function serveImage($imageName)
    {
        $imagePath = WRITEPATH . 'uploads\images\\' . $imageName;

        if (file_exists($imagePath)) {
            $imageInfo = getimagesize($imagePath);
            $fileSize = filesize($imagePath);

            // Defina os cabeçalhos adequados para servir a imagem
            header('Content-Type: ' . $imageInfo['mime']);
            header('Content-Length: ' . $fileSize);

            // Exiba o conteúdo da imagem
            readfile($imagePath);
            exit();
        } else {
            // Se a imagem não existir, retorne um erro 404
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
