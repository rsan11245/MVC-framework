<?php

namespace app\requests;

use app\models\User;

class ProfileRequest
{
    public static function register() : array|bool
    {
        $data = [];
        if ($_POST['first_name'] < 1) {
            return false;
        }

        $userModel = new User();
        $user = $userModel->userByEmail($_POST['email']);
        if ($user) {
            return false;
        }

        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['email'] = $_POST['email'];
        $data['password'] = password_hash($_POST['password'], null);
        $data['role'] = 1;
        if (isset($_FILES['image'])) {
            $data['image'] = $_FILES['image'];
        }
        else {
            $data['image'] = null;
        }
        return $data;
    }

}