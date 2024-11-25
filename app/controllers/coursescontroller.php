<?php
require_once '../app/models/courses.php';

class CourseController {
    private $courseModel;

    public function __construct($courseModel) {
        $this->courseModel = $courseModel;
    }

    public function listCourses() {
        $courses = $this->courseModel->getAllCourses();
        include 'views/courses/create.php';
    }

    public function addCourse() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul_kursus = $_POST['judul_kursus'];
            $deskripsi = $_POST['deskripsi'];
            $id_instrukstur = $_POST['id_instruktur'];
            $durasi = $_POST['durasi'];

            $this->courseModel->createCourse($judul_kursus, $deskripsi, $id_instrukstur, $durasi);
            header('Location: /courses');
        } else {
            include 'views/courses/add.php';
        }
    }
}
?>