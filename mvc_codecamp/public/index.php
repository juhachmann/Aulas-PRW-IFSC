<?php

    use app\controllers\AuthController;
    use app\controllers\SiteController;
    use app\core\Application;

    require_once __DIR__ . '/../vendor/autoload.php';


    // Obviamente, estes dados não eram para estar aqui...
    $config = [
        'db' => [
            'dns' => 'mysql:host=localhost;charset=utf8mb4',
            'server' => 'localhost',
            'user' => 'root',
            'password' => '',
            'dbName' => 'mvc_codecamp'
        ],
    ];


    $app = new Application(dirname(__DIR__), $config);

    $app->router->get('/', [SiteController::class, 'home']);
    
    $app->router->get('/contact', [SiteController::class, 'contact']);
    $app->router->post('/contact', [SiteController::class, 'handleContact']);

    $app->router->get('/login', [AuthController::class, 'login']);
    $app->router->post('/login', [AuthController::class, 'login']);
    
    $app->router->get('/register', [AuthController::class, 'register']);
    $app->router->post('/register', [AuthController::class, 'register']);


    $app->run();
