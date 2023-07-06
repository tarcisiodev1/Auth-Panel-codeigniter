<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
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



        if ($this->request->getMethod() === 'post') {
            // var_dump($this->request->getPost());
            // die();
            $userModel = model("UserModel");
            try {
                $userData = $this->request->getPost();
                $userData['profile'] = 'user';
                $userData['avatar'] = 'null';
                if ($userModel->insert($userData)) {
                    $data['msg'] = 'Usuario cadastrado com sucesso';
                } else {
                    $data['msg'] = 'Erro ao criar usuário';
                    $data['erros'] = $userModel->errors();
                }
            } catch (Exception $e) {
                $data['msg'] = 'Erro ao criar usuário:' . $e->getMessage();
            }
        }

        return view('auth/register', $data);
    }

    public function login()
    {
        // var_dump($userModel = model("UserModel"));
        // die();
        $data['msg'] = '';

        if ($this->request->getMethod() === 'post') {
            $userModel = new UserModel();
            // var_dump($this->request->getPost('user'));
            // var_dump($this->request->getPost('password'));
            // die();
            $userCheck = $userModel->check(
                $this->request->getPost('user'),
                $this->request->getPost('password')
            );
            if (!$userCheck) {
                $data['msg'] = 'Usuário e/ou senha incorretos';
                return;
            } else {
                //salva os dados na sessão
                // var_dump($userModel->user);
                // var_dump($userModel->profile);
                // die();
                session()->set('user', $userCheck->user);
                session()->set('profile', $userCheck->profile);

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
