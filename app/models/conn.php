<?php

namespace app\models;

function connection()
{
    $arr = require 'database/connectionData.php';
    return new \PDO("mysql:host={$arr['host']};dbname={$arr['name']}", $arr['user'], $arr['password']);
}