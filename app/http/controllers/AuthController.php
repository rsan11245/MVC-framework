<?php

namespace app\http\controllers;

use app\requests\AuthRequest;
use app\http\Response;
use app\models\User;

class AuthController extends Controller
{

    //Изменить Get на Show или Page
    public function registerShow()
    {
        Response::view('auth/register');
    }

    public function loginShow()
    {
        Response::view('auth/login');
    }

    public function register()
    {
        $data = AuthRequest::register();
        $userModel = new User();
        if ($data) {
            $userModel->create($data);
        }
        $user = $userModel->userByEmail($data['email']);
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['role'] = $user['role'];
        $this->profile();
        //Можно ли все это перенести в тело if?
    }

    public function login()
    {
        $data = AuthRequest::login();
        $userModel = new User();
        if ($data) {
            $user = $userModel->userByEmail($data['email']);
            if (password_verify($data['password'], $user['password'])) {
                $_SESSION['user']['id'] = $user['id'];
                $_SESSION['user']['role'] = $user['role'];
                $this->profile();
            }
        }
    }

    public function logout()
    {
        echo 'logout';
        unset($_SESSION['user']);
    }

    public function profile()
    {
        if ((int)$_SESSION['user']['role'] === 1) {
            Response::redirect('profile');
        }
        if ((int)$_SESSION['user']['role'] === 2) {
            Response::redirect('admin/users');
        }
        if (!isset($_SESSION['user'])) {
            Response::redirect('login');
        }
    }


}