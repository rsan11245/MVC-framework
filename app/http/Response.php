<?php

namespace app\http;

class Response
{
    public static function view($viewPath, $vars = [])
    {
        extract($vars);
        if (file_exists('public/views/' . $viewPath . '.php')) {
            ob_start();
            ob_get_clean();
            require 'public/views/' . $viewPath . '.php';

        }
    }

    public static function json(array $arr, int $status = 200) : string
    {
        header("Content-Type: application/json");
        return json_encode(['data' => $arr, 'status' => $status]);
    }

    public static function errorPage($code)
    {
        http_response_code($code);
        require 'public/views/errors/' . $code . '.php';
    }

    public static function redirect($url)
    {
        header('Location: /' . $url);
    }
}