<?php

require_once 'C:\Users\valmi\Downloads\xampp\htdocs\api\models\User.php';

class UserController {
    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function getUsers() {
        header('Content-Type: application/json');
        echo json_encode($this->user->getUsers());
    }

    public function createUser() {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->name) && isset($data->email)) {
            $this->user->createUser($data->name, $data->email);
            echo json_encode(["message" => "User created successfully"]);
        } else {
            echo json_encode(["message" => "Invalid data"]);
        }
    }

    public function readUser($id) {
        header('Content-Type: application/json');
        $user = $this->user->getUserById($id);
        if ($user) {
            echo json_encode($user);
        } else {
            echo json_encode(["message" => "User not found"]);
        }
    }

    public function updateUser($id) {
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->name) && isset($data->email)) {
            $result = $this->user->updateUserById($id, $data->name, $data->email);
            if ($result) {
                echo json_encode(["message" => "User updated successfully"]);
            } else {
                echo json_encode(["message" => "User not found"]);
            }
        } else {
            echo json_encode(["message" => "Invalid data"]);
        }
    }

    public function deleteUser($id) {
        $result = $this->user->deleteUserById($id);
        if ($result) {
            echo json_encode(["message" => "User deleted successfully"]);
        } else {
            echo json_encode(["message" => "User not found"]);
        }
    }
}
?>
