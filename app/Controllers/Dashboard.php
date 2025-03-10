<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {


        $uploadPath = WRITEPATH . 'uploads\images';
        $data       = ['img_user' => $uploadPath . '\\'];

        return view('dashboard/index');
    }

    public function upload()
    {

        if (!$this->request->is('post')) {
            return redirect()->route('dashboard')->with('notification', 'Image uploaded failed🙀');
        }

        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    // 'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[userfile,100]',

                ],
            ],
        ];

        $loggedInUserId = session()->get('id');

        if (!$this->validate($validationRule)) {
            return redirect()->route('dashboard.upload')->with('error', 'upload failed');
        }
        $img = $this->request->getFile('userfile');

        // Verifica se o arquivo ainda não foi movido e se o ID do usuário está definido
        if ($img->isValid() && !$img->hasMoved()) {

            // Redimensionar imagem
            $newName = $img->getRandomName();
            $img->move(WRITEPATH . 'uploads/images/', $newName);


            \Config\Services::image()
                ->withFile(WRITEPATH . 'uploads/images/' . $newName)
                ->resize(200, 200, true)
                ->save(WRITEPATH . 'uploads/images/' . $newName);
            // Move o arquivo para o diretório de upload com o nome obtido anteriormente


            // $img->move($uploadPath, $newName);

            // Define os dados a serem atualizados no banco de dados
            $data = [
                'avatar' => $newName,
            ];

            // Cria uma instância do model de usuário
            $userModel = new UserModel();

            // Atualiza os dados do usuário no banco de dados usando o ID do usuário logado
            $userModel->update($loggedInUserId, $data);

            session()->set('avatar', $newName);

            // $avatarPath    = WRITEPATH . 'uploads/images/' . session()->get('avatar');
            // $newAvatarPath = FCPATH . 'images/' . session()->get('avatar');
            // // Move a imagem para o diretório público
            // copy($avatarPath, $newAvatarPath);

            // Redireciona para a página de dashboard com uma mensagem de notificação
            return redirect()->route('dashboard')->with('notification', 'Image uploaded successfully👽');
        }
        // Redireciona para a página de dashboard com uma mensagem de notificação de falha
        return redirect()->route('dashboard')->with('notification', 'Image uploaded failed🙀');

        // $userModel = new UserModel();

        // $data = [
        //     'avatar' => $imageName,
        // ];

        // $userModel->update($loggedInUserId, $data);

        // $file->move(WRITEPATH . 'uploads');

        $data = ['upload_file_path' => $img->getPathname()];

        return view('dashboard/index', $data);
    }

    public function fetch(string $csrf)
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
        $imagePath = WRITEPATH . 'uploads/images/' . $imageName;

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
