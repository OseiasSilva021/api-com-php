<?php

require_once 'C:\Users\valmi\Downloads\xampp\htdocs\api\controllers\UserController.php';

$method = $_SERVER['REQUEST_METHOD'];
$requestUri = $_SERVER['REQUEST_URI'];

$requestUri = str_replace('/api/public/index.php', '', $requestUri);
$controller = new UserController();

if ($requestUri === '/api/users' && $method === 'GET') {
    $controller->getUsers();
} elseif (preg_match('/\/api\/users\/(\d+)/', $requestUri, $matches) && $method === 'GET') {
    $controller->readUser($matches[1]);
} elseif ($requestUri === '/api/users' && $method === 'POST') {
    $controller->createUser();
} elseif (preg_match('/\/api\/users\/(\d+)/', $requestUri, $matches) && $method === 'PUT') {
    $controller->updateUser($matches[1]);
} elseif (preg_match('/\/api\/users\/(\d+)/', $requestUri, $matches) && $method === 'DELETE') {
    $controller->deleteUser($matches[1]);
} else {
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(["message" => "Method not allowed"]);
}

?>
