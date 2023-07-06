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
        // var_dump($userModel = model("UserModel"));
        // die();
        $data['msg'] = '';

        if (is_null($this->request->getPost())) {
            $userModel = model("UserModel");
            $userCheck = $userModel->check(
                $this->request->getPost('user'),
                $this->request->getPost('password')
            );
            if (!$userCheck) {
                $data['msg'] = 'Usuário e/ou senha incorretos';
                return;
            };
            if ($userCheck) {
                //salva os dados na sessão
                session()->set('user', $userModel->user);
                session()->set('profile', $userModel->profile);
                //redireciona o user para a página restrita
                return redirect()->route('dashboard');
            }
        }
        return view('auth/login', $data);
    }

    public function logout()
    {
        //destruir a sessao (session) e voltar para o login
        session()->destroy();
        return redirect()->route('logout');
    }
}
