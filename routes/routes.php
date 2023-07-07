<?php
use routes\Router;


//auth
Router::middleware(['guest'], function() {
    Router::get('register', ['AuthController', 'registerShow']);
    Router::get('login', ['AuthController', 'loginShow']);
    Router::post('auth.register', ['AuthController', 'register']);
    Router::post('auth.login', ['AuthController', 'login']);
});

Router::middleware(['auth'], function() {
    Router::post('logout', ['AuthController', 'logout']);


    Router::get('profile', ['ProfileController', 'index']);
    Router::post('profile/update', ['ProfileController', 'update']);
    Router::post('profile/delete', ['ProfileController', 'delete']);
});

//user profile
//Router::get('profile/user/:id', ['UserController', 'show']);




//admin
Router::middleware(['admin'], function () {
    Router::get('admin/users', ['AdminController', 'index']);
    Router::post('admin/edit', ['AdminController', 'edit']);
});


Router::get('main', ['MainController', 'index']);

