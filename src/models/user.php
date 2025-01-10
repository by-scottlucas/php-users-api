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

    public function createUser($data)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO tb_user
                (name, email, password)
                    VALUES (:name, :email, :password)"
        );
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        return $stmt->execute();
    }

    public function getUser($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tb_user WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $data)
    {
        $stmt = $this->pdo->prepare(
            "UPDATE tb_user SET
                name = :name,
                email = :email,
                password = :password
                WHERE id = :id"
        );
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', $data['password']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tb_user WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
