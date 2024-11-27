<?php
// routes.php

require_once 'app/controllers/EnrollmentController.php';

$controller = new EnrollmentController();
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
