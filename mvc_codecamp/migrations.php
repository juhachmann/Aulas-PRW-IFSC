<?php

    use app\controllers\AuthController;
    use app\controllers\SiteController;
    use app\core\Application;

    require_once __DIR__ . '/vendor/autoload.php';

    $config = [
        'db' => [
            'server' => 'localhost',
            'user' => 'root',
            'password' => '',
        ],
    ];


    $app = new Application(__DIR__, $config);

    $app->db->applyMigrations();
