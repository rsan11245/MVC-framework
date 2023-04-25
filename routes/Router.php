<?php

namespace routes;

use app\http\Response;

class Router
{
    private $params = [];
    private $actionArr = [];
    private $path;

    public function __construct($path, $actionArr)
    {
        $this->path = $path;
        $this->actionArr = $actionArr;
    }

    public static function get($path, $arr)
    {
        if (empty($_POST)) {
            $router = new Router($path, $arr);
            if ($router->matchAndExtractParams()) {
                $router->execute($router->params);
            }
        }
    }

    public static function post($path, $arr)
    {
        if (!empty($_POST)) {
            $router = new Router($path, $arr);
            if ($router->matchAndExtractParams()) {
                $router->execute($_POST);
            }
        }
    }

    public function execute($parameters)
    {
        $controller = $this->actionArr[0];
        $pathToController = 'app\http\controllers\\' . $controller;
        $action = $this->actionArr[1];

        $object = new $pathToController($parameters);
        $object->$action();
    }

    public function matchAndExtractParams()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        if ($url === '') {
            return $url === $this->path;
        }
        $pathExploded = explode('/', $this->path);
        $urlExploded = explode('/', $url);
        if (count($pathExploded) !== count($urlExploded)) {
            return false;
        }

        for ($i = 0; $i < count($pathExploded); $i++) {
            $UrlParam = $urlExploded[$i];

            if ($pathExploded[$i] !== $urlExploded[$i]) {
                if ($pathExploded[$i][0] === ":") {
                    $this->params[$UrlParam] = $UrlParam;
                } else {
                    return false;
                }
            }
        }
        return true;
    }
}