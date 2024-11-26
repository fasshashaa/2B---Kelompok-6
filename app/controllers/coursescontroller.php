<?php
require_once '../app/models/User.php';
require_once '../app/models/Courses.php';

class CoursesController {
    private $userModel;
    private $courseModel;

    public function __construct() {
        $this->userModel = new User();
        $this->courseModel = new Courses();
    }

    // Menampilkan daftar kursus
    public function index() {
        $kursus = $this->courseModel->getAllCourses();
        require_once '../app/views/courses/index.php';
    }

    // Menampilkan form pembuatan kursus
    public function create() {
        $users = $this->userModel->getAllUsers(); // Ambil semua instruktur
        require_once '../app/views/courses/create.php';
    }

    // Menyimpan data kursus baru
    public function store() {
        $judul_kursus = htmlspecialchars($_POST['judul_kursus'] ?? '');
        $deskripsi = htmlspecialchars($_POST['deskripsi'] ?? '');
        $id_instruktur = filter_var($_POST['id_instruktur'] ?? '', FILTER_VALIDATE_INT);
        $durasi = filter_var($_POST['durasi'] ?? '', FILTER_VALIDATE_INT);

        if ($judul_kursus && $deskripsi && $id_instruktur && $durasi) {
            if ($this->courseModel->addCourse($judul_kursus, $deskripsi, $id_instruktur, $durasi)) {
                header('Location: /courses/index');
                exit;
            } else {
                $error = "Gagal menambahkan kursus.";
            }
        } else {
            $error = "Semua kolom wajib diisi!";
        }
        require_once '../app/views/courses/create.php';  // Tampilkan form kembali jika ada error
    }

    // Menampilkan form edit kursus
public function editCourse($courseId) {
    $courseId = intval($courseId); // Pastikan ID valid
    $course = $this->courseModel->getCourseById($courseId); // Ambil data kursus
    if ($course) {
        require_once '../app/views/courses/edit.php'; // Tampilkan form edit
    } else {
        echo "Kursus dengan ID $courseId tidak ditemukan.";
    }
}


    // Memproses pembaruan kursus
    public function updateCourse($courseId) {
        $id_courses = intval($courseId); // Pastikan ID valid
        $judul_kursus = htmlspecialchars($_POST['judul_kursus'] ?? '');
        $deskripsi = htmlspecialchars($_POST['deskripsi'] ?? '');
        $id_instruktur = filter_var($_POST['id_instruktur'] ?? '');
        $durasi = filter_var($_POST['durasi'] ?? '');

        if ($judul_kursus && $deskripsi && $id_instruktur && $durasi) {
            $updateResult = $this->courseModel->updateCourse($courseId, $judul_kursus, $deskripsi, $id_instruktur, $durasi);
            if ($updateResult) {
                header('Location: /courses/index');
                exit;
            } else {
                echo "Gagal memperbarui kursus.";
            }
        } else {
            echo "Data input tidak valid.";
        }
    }

    // Memproses penghapusan kursus
    public function deleteCourse($id_courses) {
        $id_courses = intval($id_courses); // Pastikan ID valid
        if ($this->courseModel->deleteCourse($id_courses)) {
            header('Location: /courses/index');
            exit;
        } else {
            echo "Gagal menghapus kursus.";
        }
    }
}
?>
