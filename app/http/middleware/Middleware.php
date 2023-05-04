<?php
namespace app\http\middleware;

use app\http\Response;

class Middleware
{
    public static function check($arr)
    {

        $actions = require 'actions.php';
        for ($i = 0; $i < count($arr); $i++) {
            foreach ($actions as $middlewareName => $action) {
                if ($arr[$i] === $middlewareName) {
                   return Middleware::$action();
                }
            }
        }
    }

    private static function adminCheck() : bool
    {
        if (isset($_SESSION['user']['role'])) {
            return (int)$_SESSION['user']['role'] === 2;
        } else {
            return false;
        }
    }

    private static function authCheck() : bool
    {
        return isset($_SESSION['user']);
    }
}