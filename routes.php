<?php

require_once 'app/controllers/CoursesController.php';

$controller = new CoursesController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Rute untuk pengguna
if ($url == '/courses/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/courses/create' && $requestMethod == 'GET') {
    $controller->create(); // Menampilkan form untuk menambah kursus
} elseif ($url == '/courses/store' && $requestMethod == 'POST') {
    $controller->store(); // Menyimpan kursus baru
// Rute untuk edit kursus (GET)
}elseif (preg_match('/\/courses\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $courseId = $matches[1];
    $controller->editCourse($courseId);
} 
// Rute untuk update kursus (POST)
elseif (preg_match('/\/courses\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $courseId = $matches[1];
    $controller->updateCourse($courseId);

} elseif (preg_match('/\/courses\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    // Menghapus kursus
    $courseId = $matches[1];
    $controller->deleteCourse($courseId);

// Rute jika tidak ditemukan
} else {
    http_response_code(404);
    echo "404 Found";
}
