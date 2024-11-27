<?php
require_once 'app/controllers/CoursesController.php';

$controllerCourses = new CoursesController();
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); 
$requestMethod = $_SERVER['REQUEST_METHOD'];


if ($url === '/courses/index' || $url === '/') {
    $controllerCourses->index();
} elseif ($url === '/courses/create' && $requestMethod === 'GET') {
    $controllerCourses->create(); 
} elseif ($url === '/courses/store' && $requestMethod === 'POST') {
    $controllerCourses->store(); 
} elseif (preg_match('/^\/courses\/edit\/(\d+)$/', $url, $matches) && $requestMethod === 'GET') {
    $courseId = intval($matches[1]); 
    $controllerCourses->editCourse($courseId);
} elseif (preg_match('/^\/courses\/update\/(\d+)$/', $url, $matches) && $requestMethod === 'POST') {
    $courseId = intval($matches[1]); 
    $controllerCourses->updateCourse($courseId);
} elseif (preg_match('/^\/courses\/delete\/(\d+)$/', $url, $matches) && $requestMethod === 'POST') {
    $courseId = intval($matches[1]); 
    $controllerCourses->deleteCourse($courseId); 
} else {
    http_response_code(404);
    echo "404 Not Found";
}
