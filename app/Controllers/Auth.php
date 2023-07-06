<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Exception;

class Auth extends BaseController
{
    public function index()
    {
        echo "register page";
    }

    public function register()
    {
        $data['msg'] = '';



        if (is_null($this->request->getPost())) {
            $userModel = model("UserModel");
            try {
                $userData = $this->request->getPost();
                $userData['profile'] = 'user';
                if ($userModel->save($userData)) {
                    $data['msg'] = 'Usuario cadastrado com sucesso';
                } else {
                    $data['msg'] = 'Erro ao criar usuário';
                    $data['erros'] = $userModel->errors();
                }
            } catch (Exception $e) {
            }
        }

        return view('auth/register');
    }

    public function login()
    {

        $data['msg'] = '';

        if (is_null($this->request->getPost())) {
            $userModel = model("UserModel");
            try {
                $userData = $this->request->getPost();
                $userData['profile'] = 'user';
                if ($userModel->save($userData)) {
                    $data['msg'] = 'Usuario cadastrado com sucesso';
                } else {
                    $data['msg'] = 'Erro ao criar usuário';
                    $data['erros'] = $userModel->errors();
                }
            } catch (Exception $e) {
            }
        }
        return view('auth/login');
    }
}
