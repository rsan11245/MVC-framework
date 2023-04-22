<?php
use routes\Router;

//$routes = [];

Router::get(':id', ['MainController', 'index']);

//return $routes;