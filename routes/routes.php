<?php
use routes\Router;


Router::get('about', ['AboutController', 'index']);
Router::post('about', ['AboutController', 'send']);
Router::get('main', ['MainController', 'index']);

