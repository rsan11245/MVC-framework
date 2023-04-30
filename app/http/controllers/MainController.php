<?php

namespace app\http\controllers;

use app\http\Response;
use app\models\Main;


class MainController extends Controller
{
    public function index()
    {
        Response::view('main');
    }
}