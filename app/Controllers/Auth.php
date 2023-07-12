<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Exception;

use function PHPUnit\Framework\isEmpty;

class Auth extends BaseController
{
    public function index()
    {
        echo "register page";
    }

    public function register()
    {

        if ($this->request->is('post')) {

            $validated = $this->validate(
                [

                    'user' => 'required|is_unique[users.user]',
                    'name' => 'required',
                    'email' => 'required|valid_email|is_unique[users.email]',
                    'passconf' => 'required|matches[password]',
                    // 'profile' => 'required',
                    'password' => 'required|min_length[5]',
                    // 'avatar' => 'required',
                ],
            );

            if (!$validated) {
                return redirect()->route('auth.register')->with('errors', $this->validator->getErrors());
            }
            $userData = $this->request->getPost();
            $userData['profile'] = 'user';
            $userData['avatar'] = 'null';

            $userModel = new UserModel();

            $inserted = $userModel->insert($userData);
            if (!$inserted) {
                return redirect()->route('auth.register')->with('error', 'OCORREU UM ERRO AO  CADASTRAR USUARIO');
            }

            return redirect()->route('auth.register')->with('success', 'Cadastro realizado com sucesso!');
        }

        return view('auth/register');
    }

    public function login()
    {
        if (session()->has('user')) {
            return redirect()->route('dashboard');
        }


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
                unset($userCheck->password);
                session()->set('id', $userCheck->id);
                session()->set('user', $userCheck->user);
                session()->set('name', $userCheck->name);
                session()->set('profile', $userCheck->profile);
                session()->set('email', $userCheck->email);
                session()->set('avatar', $userCheck->avatar);


                $avatarPath = WRITEPATH . 'uploads/images/' . session()->get('avatar');
                $newAvatarPath = FCPATH . 'images/' . session()->get('avatar');
                // Move a imagem para o diretório público
                if (file_exists($avatarPath)) {
                    copy($avatarPath, $newAvatarPath);
                    return redirect()->route('dashboard');
                }



                //redireciona o user para dashboard
                return redirect()->route('dashboard');
            }
        }
        return view('auth/login');
    }

    public function logout()
    {

        helper('filesystem');
        //destruir a sessao (session) e voltar para o login
        session()->destroy();
        delete_files('images/');
        return redirect()->route('auth.login');
    }
}
