<?php

namespace app\http\controllers;

use app\http\Response;

class MainController
{
    public function index()
    {
        Response::view('main');
    }
}