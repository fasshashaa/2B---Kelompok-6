<?php
require_once '../config/database.php';
class Courses {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllCourses() {
        $query = "SELECT * FROM courses";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCourse($judul_kursus, $deskripsi, $id_instruktur, $durasi) {
        $query = "INSERT INTO courses (judul_kursus, deskripsi, id_instruktur, durasi) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$judul_kursus, $deskripsi, $id_instruktur, $durasi]);
    }

    public function deleteCourse($id) {
        $query = "DELETE FROM courses WHERE id_course = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
    }
}
?>