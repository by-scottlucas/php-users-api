<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/models/user.php';
require_once __DIR__ . '/../src/controllers/user_controller.php';

use Slim\Factory\AppFactory;

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$app = AppFactory::create();

$userController = new UserController($pdo);

(require __DIR__ . '/../src/routes/routes.php')($app, $userController);

$app->run();
