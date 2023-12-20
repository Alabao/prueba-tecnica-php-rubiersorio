<?php
require 'Controller/UserController.php';
require 'Repository/UserRepository.php';
require 'Entity/User.php';

use Controller\UserController;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UserController();
    $controller->addUser();
}elseif ($_SERVER['REQUEST_METHOD'] == 'GET'){
    $controller = new UserController();
    $controller->getUser();
}else{
    echo 'Method Not Allow';
}