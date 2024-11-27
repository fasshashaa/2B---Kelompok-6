<?php
// routes.php


require_once 'app/controllers/EnrollmentController.php';
require_once 'app/controllers/UserController.php';

$controller = new UserController();
$controller1 = new EnrollmentController();

$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/enrollment/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/enrollment/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/enrollment/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/enrollment\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $controller->edit($id);
} elseif (preg_match('/\/enrollment\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id = $matches[1];
    $controller->update($id, $_POST);
    
} elseif (preg_match('/\/enrollment\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id = $matches[1];
    $controller->delete($id);
} else {
    http_response_code(404);
    echo "404 Not Found";
}

if ($url == '/user/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/user/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/user/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/user\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller->edit($userId);
} elseif (preg_match('/\/user\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $controller->update($userId, $_POST);
} elseif (preg_match('/\/user\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller->delete($userId);
} else {
    http_response_code(404);
    echo "404 Not Found";
}

