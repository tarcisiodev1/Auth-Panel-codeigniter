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



        if ($this->request->is('post')) {
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



        if ($this->request->is('post')) {


            $validated = $this->validate(
                [
                    'user' => 'required',
                    // 'user' => 'required|is_unique[users.user]',
                    // 'name' => 'required',
                    // 'email' => 'required',
                    // 'profile' => 'required',
                    'password' => 'required',
                    // 'avatar' => 'required',
                ],
            );

            if (!$validated) {
                return redirect()->route('auth.login')->with('errors', $this->validator->getErrors());
            }



            $userModel = new UserModel();

            $userCheck = $userModel->check(
                $this->request->getPost('user'),
                $this->request->getPost('password')
            );
            if (!$userCheck) {

                return redirect()->route('auth.login')->with('error', 'Incorrect user and/or password');
            }
            if ($userCheck) {
                //salva os dados na sessão

                session()->set('user', $userCheck->user);
                session()->set('profile', $userCheck->profile);

                //redireciona o user para dashboard
                return redirect()->route('dashboard');
            }
        }
        return view('auth/login');
    }

    public function logout()
    {
        //destruir a sessao (session) e voltar para o login
        session()->destroy();
        return redirect()->route('auth.login');
    }
}
