<?php

namespace app\http\controllers;

use app\http\Response;

class AboutController extends Controller
{
    public function index()
    {
        var_dump($this->params);
    }

    public function send()
    {
        var_dump($this->params);
    }

}