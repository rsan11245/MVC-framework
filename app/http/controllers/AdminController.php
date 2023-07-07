<?php

namespace app\http\controllers;

use app\requests\AuthRequest;
use app\http\Response;
use app\models\User;

class AdminController extends Controller
{

    public function index()
    {
        $userModel = new User();
        $users = $userModel->all();
        Response::view('admin/users', ['users' => $users]);
    }

    public function edit(int $id): string
    {
        $model = new User();
        $user = $model->findById($id);
        return Response::json($user);
    }


}