<?php

namespace app\http\controllers;

use app\http\Response;

class MainController extends Controller
{
    public function index()
    {
        Response::view('main');
    }
}