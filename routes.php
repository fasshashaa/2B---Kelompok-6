<?php
// routes.php

require_once 'app/controllers/EnrollmentController.php';

$controller = new Controller(); // Ganti UserController dengan DataPesertaController
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/user/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/user/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/user/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/user\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $pesertaId = $matches[1];
    $controller->edit($pesertaId);
} elseif (preg_match('/\/user\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $pesertaId = $matches[1];
    $controller->update($pesertaId, $_POST);
} elseif (preg_match('/\/user\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $pesertaId = $matches[1];
    $controller->delete($pesertaId);
} else {
    http_response_code(404);
    echo "404 Not Found";
}
