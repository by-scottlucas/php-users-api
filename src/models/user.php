<?php
class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllUsers()
    {
        $stmt = $this->pdo->query("SELECT * FROM tb_user");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
