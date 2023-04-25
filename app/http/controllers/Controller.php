<?php

namespace app\http\controllers;

abstract class Controller
{
    public $params;
    public function __construct($params)
    {
        $this->params = $params;
    }
}