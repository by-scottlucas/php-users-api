<?php
require_once __DIR__ . '/../models/user.php';

class UserController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function list($request, $response, $args)
    {
        try {
            $users = $this->userModel->getAllUsers();

            if (!$users) {
                $response->getBody()
                    ->write(json_encode(["error" => "Nenhum usuário encontrado."]));
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(404);
            }

            $response->getBody()->write(json_encode(["data" => $users]));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } catch (Exception $e) {
            $response
                ->getBody()
                ->write(json_encode(["error" => $e->getMessage()]));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(500);
        }
    }

    public function create($request, $response, $args)
    {
        try {
            $data = $request->getParsedBody();

            if (!$data) {
                $data = json_decode($request->getBody()->getContents(), true);
            }

            if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
                $error = ['error' => 'Todos os campos (name, email, password) são obrigatórios.'];
                $response->getBody()->write(json_encode($error));
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(400);
            }

            $result = $this->userModel->createUser($data);

            $success = $data;
            $response->getBody()->write(json_encode($success));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        } catch (Exception $e) {
            $error = ['error' => 'Erro ao criar o usuário.', 'details' => $e->getMessage()];
            $response->getBody()->write(json_encode($error));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(500);
        }
    }

    public function read($request, $response, $args)
    {
        try {
            $id = $args['id'];
            $user = $this->userModel->getUser($id);

            if (!$user) {
                $response
                    ->getBody()
                    ->write(json_encode(["error" => "Usuário não encontrado."]));
                return $response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus(404);
            }

            $response->getBody()->write(json_encode(["data" => $user]));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } catch (Exception $e) {
            $response
                ->getBody()
                ->write(json_encode(["error" => $e->getMessage()]));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(500);
        }
    }
}
