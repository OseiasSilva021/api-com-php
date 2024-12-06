<?php

class User {
    private $conn;

    public function __construct() {
        $this->conn = $this->getConnection();
    }

    // Conectar ao banco de dados
    private function getConnection() {
        $host = 'localhost';
        $dbname = 'api_db';
        $username = 'root';
        $password = '';

        try {
            return new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Obter todos os usuários
    public function getUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obter um usuário por ID
    public function getUserById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    // Criar um novo usuário
    public function createUser($name, $email) {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
    }

    // Atualizar um usuário por ID
    public function updateUserById($id, $name, $email) {
        $stmt = $this->conn->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }

    // Excluir um usuário por ID
    public function deleteUserById($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
