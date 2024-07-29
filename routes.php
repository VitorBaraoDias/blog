<?php
require_once 'controllers/AuthController.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/usercontrollers/PerfilController.php';


return [
    'defaultRoute' => ['GET', 'HomeController', 'index'],
    'home' => [
        'index' => ['GET', 'HomeController', 'index'],
    ],
    'auth' => [
        'index' => ['GET', 'AuthController', 'index'],
        'create' => ['GET', 'AuthController', 'create'],
        'store' => ['POST', 'AuthController', 'store'],
        'login' => ['POST', 'AuthController', 'login'],
        'logout' => ['GET', 'AuthController', 'logout'],
    ],
    'perfil' => [
        'index' => ['GET', 'PerfilController', 'index'],
        'store' => ['POST', 'PerfilController', 'store'],
        'update' => ['POST', 'PerfilController', 'update'],
        'upload' => ['POST', 'PerfilController', 'upload'],

    ],
];
