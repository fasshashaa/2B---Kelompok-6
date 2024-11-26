<?php
require_once '../config/database.php';

class Courses {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

    /**
     * Mendapatkan semua data kursus.
     *
     * @return array
     */
    public function getAllCourses() {
        try {
            $query = "
                SELECT 
                    courses.judul_kursus,
                    courses.deskripsi,
                    users.name AS instruktur,
                    courses.durasi
                FROM 
                    courses
                INNER JOIN 
                    users
                ON 
                    courses.id_instruktur = users.id_user
            ";
            $stmt = $this->db->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching courses: " . $e->getMessage());
        }
    }

    public function addCourse($judul_kursus, $deskripsi, $id_instruktur, $durasi) {
        try {
            $query = "INSERT INTO courses (judul_kursus, deskripsi, id_instruktur, durasi) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([$judul_kursus, $deskripsi, $id_instruktur, $durasi]);
        } catch (PDOException $e) {
            die("Error adding course: " . $e->getMessage());
        }
    }
    public function updateCourse($id, $judul_kursus, $deskripsi, $id_instruktur, $durasi) {
        $query = "
            UPDATE courses 
            SET judul_kursus = ?, deskripsi = ?, id_instruktur = ?, durasi = ?
            WHERE id_courses = ?
        ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$judul_kursus, $deskripsi, $id_instruktur, $durasi, $id]);
    }
    

    public function deleteCourse($id_courses) {
        $query = "DELETE FROM courses WHERE id_courses = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id_courses]);
    }
    public function getCourseById($courseId) {
        try {
            $query = "
                SELECT 
                    courses.judul_kursus,
                    courses.deskripsi,
                    courses.id_instruktur,
                    courses.durasi,
                    courses.id_courses
                FROM 
                    courses
                WHERE 
                    courses.id_courses = ?
            ";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$courseId]);
            return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan satu baris data kursus
        } catch (PDOException $e) {
            die("Error fetching course by ID: " . $e->getMessage());
        }
    }
    
    
}
?>
