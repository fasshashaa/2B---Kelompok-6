<?php

require_once 'app/controllers/CoursesController.php';

$controller = new CoursesController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Rute untuk pengguna
if ($url == '/courses/index' || $url == '/') {
    $controller->index();
} elseif ($url == '/courses/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/courses/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif ($url == '/courses/add_course' && $requestMethod == 'GET') {
    $controller->addCourse();
} elseif ($url == '/courses/add_course' && $requestMethod == 'POST') {
    $controller->addCourse();
} elseif (preg_match('/\/courses\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $coursesId = $matches[1];
    $controller->edit($coursesId);
} elseif (preg_match('/\/courses\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $coursesId = $matches[1];
    $controller->update($coursesId, $_POST);
} elseif (preg_match('/\/courses\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $coursesId = $matches[1];
    $controller->delete($coursesId);

// Rute untuk kursus
} elseif (preg_match('/\/courses\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $courseId = $matches[1];
    $controller->editCourse($courseId);

} elseif (preg_match('/\/courses\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $courseId = $matches[1];
    $controller->updateCourse($courseId, $_POST);
} elseif (preg_match('/\/courses\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $courseId = $matches[1];
    $controller->deleteCourse($courseId);

// Rute jika tidak ditemukan
} else {
    http_response_code(404);
    echo "404 Not Found";
}
