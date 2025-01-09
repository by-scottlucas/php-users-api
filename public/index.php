<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../src/models/user.php';
require_once __DIR__ . '/../src/controllers/user_controller.php';

use Slim\Factory\AppFactory;

// Configuração de cabeçalhos
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Inicializa a aplicação Slim
$app = AppFactory::create();

// Instancia o controlador
$userController = new UserController($pdo);

// Carrega as rotas, passando o app e o controlador
(require __DIR__ . '/../src/routes/routes.php')($app, $userController);

// Executa o aplicativo
$app->run();
