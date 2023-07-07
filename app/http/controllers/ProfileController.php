<?php

namespace app\http\controllers;

use app\requests\AuthRequest;
use app\http\Response;
use app\models\User;

class ProfileController extends Controller
{

    public function index()
    {
        $model = new User();
        $user = $model->findById($_SESSION['user']['id']);
        Response::view('profile', $user);
    }

    public function update() {
        $model = new User();
        $user = $model->findById($_SESSION['user']['id']);
        $user['first_name'] = $_POST['first_name'];
        $user['last_name'] = $_POST['last_name'];
        $model->update($user);
        echo 'success';
    }

    public function delete() {
        $model = new User();
        if (!empty($_SESSION['user']['id'])) {
            $model->deleteById($_SESSION['user']['id']);

        }
        unset($_SESSION['user']);
    }


}