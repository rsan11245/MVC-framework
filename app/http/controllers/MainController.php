<?php

namespace app\http\controllers;

use app\http\Response;
use app\models\Main;


class MainController extends Controller
{
    public function index()
    {
        $model = new Main();
        $result= $model->update([
            'id' => 2,
            'name' => 'alex'
        ]);
        var_dump($result);
    }
}