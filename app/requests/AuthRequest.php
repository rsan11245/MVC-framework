<?php

namespace app\requests;

use app\models\User;

class AuthRequest
{
    public static function register() : array|bool
    {
        $data = [];
        if ($_POST['name'] < 1) {
            return false;
        }

        $userModel = new User();
        $user = $userModel->userByEmail($_POST['email']);
        if ($user) {
            return false;
        }

        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['password'] = password_hash($_POST['password'], null);
        $data['role'] = 1;
        return $data;
    }

    public static function login() : array|bool
    {
        $data = [];
        if ($_POST['email'] < 5) {
            return false;
        }
        $userModel = new User();
        $user = $userModel->userByEmail($_POST['email']);
        if (!$user) {
            return false;
        }

        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        return $data;
    }
}