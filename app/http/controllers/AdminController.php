<?php

namespace app\http\controllers;

use app\requests\AuthRequest;
use app\http\Response;
use app\models\User;

class AdminController extends Controller
{

    public function index()
    {
        Response::view('admin/users');
    }


}