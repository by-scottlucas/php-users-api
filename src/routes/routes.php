<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function ($app, $userController) {

    $app->get('/api/hello', function (Request $request, Response $response) {
        $response->getBody()->write(json_encode(["message" => "API funcionando!"]));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $app->get('/api/users', [$userController, 'list']);
    $app->post('/api/users', [$userController, 'create']);
    $app->get('/api/users/{id}', [$userController, 'read']);
    $app->put('/api/users/{id}', [$userController, 'update']);
    $app->delete('/api/users/{id}', [$userController, 'delete']);
};
