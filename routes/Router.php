<?php

namespace routes;

use app\http\Response;

class Router
{
    private $params = [];
    private $path;

    public static function get($path, $arr)
    {
        $router = new Router();
        $router->path = $path;
        echo "assdsd " . $router->match();
    }

    public static function post($path, $arr)
    {
        if (empty($_POST)) {
            //TODO переписать на редирект
            exit();
        }
        $router = new Router();
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        return $url === $this->path;
    }

    public function extractParams()
    {

    }
}