<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function ($app, $userController) {
    // Rota de teste
    $app->get('/api/hello', function (Request $request, Response $response) {
        $response->getBody()->write(json_encode(["message" => "API funcionando!"]));
        return $response->withHeader('Content-Type', 'application/json');
    });

    // Rota para buscar todos os usuários (usando o controlador)
    $app->get('/api/users', [$userController, 'getUsers']);
};
