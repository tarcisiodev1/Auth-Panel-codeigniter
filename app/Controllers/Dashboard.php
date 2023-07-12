<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {

        $uploadPath = WRITEPATH . 'uploads\images';
        $data = ['img_user' => $uploadPath . '\\'];
        // var_dump($data['img_user']);
        // die();
        return view('dashboard/index');
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    // 'is_image[userfile]',
                    // 'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    // 'max_size[userfile,100]',
                    // 'max_dims[userfile,1024,768]',
                ],
            ],
        ];


        $loggedInUserId = session()->get('id');
        // $config['upload_path'] = getcwd() . '/images';

        // Verifica se o diretório de upload não existe e o cria
        // if (!is_dir($config['upload_path'])) {
        //     mkdir($config['upload_path'], 0777);
        // }

        // var_dump($img);
        // die();
        // $imageName = $this->request->getFile('userImage')->getName();

        if (!$this->validate($validationRule)) {
            return redirect()->route('dashboard.upload')->with('error', 'upload failed');
        }
        $img = $this->request->getFile('userfile');


        // Verifica se o arquivo ainda não foi movido e se o ID do usuário está definido
        if (!$img->hasMoved()) {
            //Redimensionar imagem
            $newName = $img->getRandomName();
            \Config\Services::image()
                ->withFile($img)
                ->resize(200, 200, true)
                ->save(WRITEPATH . 'uploads\images\\' . $newName);
            // Move o arquivo para o diretório de upload com o nome obtido anteriormente

            $uploadPath = WRITEPATH . 'uploads/images';
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


            $avatarPath = WRITEPATH . 'uploads/images/' . session()->get('avatar');
            $newAvatarPath = FCPATH . 'images/' . session()->get('avatar');
            // Move a imagem para o diretório público
            copy($avatarPath, $newAvatarPath);
            // var_dump(WRITEPATH);
            // die();
            // $data = ['upload_file_path' => $uploadPath . '\\'];
            // Redireciona para a página de dashboard com uma mensagem de notificação
            return redirect()->route('dashboard')->with('notification', 'Image uploaded successfully');
        } else {
            // Redireciona para a página de dashboard com uma mensagem de notificação de falha
            return redirect()->route('dashboard')->with('notification', 'Image uploaded failed');
        }

        // $userModel = new UserModel();


        // $data = [
        //     'avatar' => $imageName,
        // ];

        // $userModel->update($loggedInUserId, $data);

        // $file->move(WRITEPATH . 'uploads');

        $data = ['upload_file_path' => $img->getPathname()];

        return view('dashboard/index', $data);
    }
}
