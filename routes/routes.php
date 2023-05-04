<?php
use routes\Router;


//auth
Router::get('register', ['AuthController', 'registerShow']);
Router::get('login', ['AuthController', 'loginShow']);
Router::post('register', ['AuthController', 'register']);
Router::post('login', ['AuthController', 'login']);
Router::post('logout', ['AuthController', 'logout']);

//user profile
Router::get('profile', ['ProfileController', 'index']);



//admin
Router::middleware(['admin'], function () {
    Router::get('admin/users', ['AdminController', 'index']);
});






Router::get('about', ['AboutController', 'index']);
Router::post('about', ['AboutController', 'send']);
Router::get('main', ['MainController', 'index']);

