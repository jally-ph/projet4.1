<?php
require '../config/dev.php';
require '../vendor/autoload.php';
require '../templates/head.php';
session_start();
$router = new \App\config\Router();
$router->run();