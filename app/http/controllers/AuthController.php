<?php
namespace app\http\controllers;

use app\http\Response;

class AuthController extends Controller
{

    public function registerGet() {
        Response::view('auth/register');
    }
    public function loginGet() {
        Response::view('auth/login');
    }

    public function register()
    {
        //Валидация
        //Сохранение в бд
        //Сохранение сессии
        //Перенаправление в зависимости от роли
        echo "AUTH";
    }

    public function login()
    {

    }

    public function logout()
    {

    }
}