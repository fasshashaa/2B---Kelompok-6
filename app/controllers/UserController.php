<?php
require_once '../config/database.php'; // Pastikan koneksi database sudah benar
require_once '../app/models/Courses.php'; // Pastikan model Courses sudah di-include

class UserController {
    private $courseModel;

    // Konstruktor untuk menerima model Courses
    public function __construct($courseModel = null) {
        if ($courseModel === null) {
            $this->courseModel = new Courses(); // Jika model belum diberikan, buat instance baru
        } else {
            $this->courseModel = $courseModel; // Jika sudah ada model yang diteruskan, gunakan itu
        }
    }

    /**
     * Menampilkan daftar kursus
     */
    public function listCourses() {
        $courses = $this->courseModel->getAllCourses();
        include '../app/views/user/list.php'; // Pastikan path untuk view daftar kursus sudah benar
    }

    /**
     * Menampilkan form untuk menambah kursus baru
     */
    public function addCourse() {
        // Menangani permintaan POST dari form
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Ambil data dari POST
            $judul_kursus = $_POST['judul_kursus'];
            $deskripsi = $_POST['deskripsi'];
            $id_instruktur = $_POST['id_instruktur'];
            $durasi = $_POST['durasi'];

            // Validasi data
            if (empty($judul_kursus) || empty($deskripsi) || empty($id_instruktur) || empty($durasi)) {
                $error = "Semua kolom wajib diisi!";
                include '../app/views/user/add_course.php'; // Menampilkan kembali form jika ada error
                return;
            }

            // Menyimpan kursus ke database
            $isSuccess = $this->courseModel->createCourse($judul_kursus, $deskripsi, $id_instruktur, $durasi);

            // Jika berhasil, arahkan ke halaman daftar kursus
            if ($isSuccess) {
                header('Location: /course/list'); // Redirect ke daftar kursus setelah berhasil menambah
                exit;
            } else {
                // Jika gagal, tampilkan error
                $error = "Gagal menambahkan kursus. Silakan coba lagi.";
                include '../app/views/user/add_course.php'; // Tampilkan form dengan pesan error
            }
        } else {
            // Jika bukan POST, tampilkan form kosong
            include '../app/views/user/add_course.php'; // Pastikan path-nya benar
        }
    }
    
}
?>
