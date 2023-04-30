<?php
use routes\Router;


//auth
Router::get('register', ['AuthController', 'registerGet']);
Router::get('login', ['AuthController', 'loginGet']);
Router::post('register', ['AuthController', 'register']);


//admin
Router::get('', ['MainController', 'index']);





Router::get('about', ['AboutController', 'index']);
Router::post('about', ['AboutController', 'send']);
Router::get('main', ['MainController', 'index']);

