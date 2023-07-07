<?php

namespace routes;

use app\http\Response;
use app\http\middleware\Middleware;

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

    public static function middleware($arr, $closure)
    {
        if(Middleware::check($arr)) {
            $closure();
        }
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
        $routeArr = explode('/', $this->path);
        $urlArr = explode('/', $url);

        if (count($routeArr) !== count($urlArr)) {
            return false;
        }

        for ($i = 0; $i < count($routeArr); $i++) {

            if ($routeArr[$i] !== $urlArr[$i]) {
                if ( !empty($routeArr[$i]) && $routeArr[$i][0] === ":") {

                    $this->params[mb_substr($routeArr[$i], 1)] = $urlArr[$i];
                } else {
                    return false;
                }
            }
        }
        return true;
    }
}