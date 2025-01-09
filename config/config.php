<?php
$dsn = "mysql:host=localhost;dbname=php_users";
$user = "luke";
$password = "artindie";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo json_encode(["message" => "Conexão bem-sucedida"]);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
