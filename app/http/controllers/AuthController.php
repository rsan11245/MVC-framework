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
            $user = $userModel->userByEmail($data['email']);
            $_SESSION['user']['id'] = $user['id'];
            $_SESSION['user']['role'] = $user['role'];

            echo $this->profile();
        }
    }

    public function login()
    {
        //Перенести проверку в реквест?
        $data = AuthRequest::login();
        if ($data === false) {
            echo Response::json(['message' => 'no such email'], 404);
        }

        $userModel = new User();
        if ($data) {
            $user = $userModel->userByEmail($data['email']);
            if (!$user) {
                return Response::json(['message' => 'Нет такого пользоваля', 'url' => '/login'], 404);
            }
            if (password_verify($data['password'], $user['password'])) {
                $_SESSION['user']['id'] = $user['id'];
                $_SESSION['user']['role'] = $user['role'];
                echo $this->profile();
            }
        }

    }

    public function logout()
    {
        unset($_SESSION['user']);
    }

    public function profile()
    {
        if ((int)$_SESSION['user']['role'] === 1) {
            return Response::json(['role' => 'user', 'url' => '/profile']);
        } else if ((int)$_SESSION['user']['role'] === 2) {
            return Response::json(['role' => 'admin', 'url' => '/admin/users']);
        }
        if (!isset($_SESSION['user'])) {
            return Response::json(['role' => 'none', 'url' => '/login']);
        }
    }


}