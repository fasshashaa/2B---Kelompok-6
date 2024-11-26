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

    // Menampilkan daftar pengguna
    public function index() {
        $courses = $this->courseModel->getAllCourses();
        require_once '../app/views/courses/index.php';
    }

    // Menampilkan form pembuatan pengguna
    public function create() {
        require_once '../app/views/courses/create.php';
    }

    // Menyimpan data pengguna baru
    public function store() {
        $name = htmlspecialchars($_POST['name'] ?? '');
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);

        if ($name && $email) {
            if ($this->userModel->add($name, $email)) {
                header('Location: /user/index');
                exit;
            } else {
                $error = "Gagal menambahkan pengguna.";
            }
        } else {
            $error = "Data input tidak valid.";
        }

        require_once '../app/views/user/create.php';
    }

    // Menampilkan form edit dengan data pengguna
    public function edit($id) {
        $id = intval($id);
        $user = $this->userModel->find($id);

        if ($user) {
            require_once '../app/views/user/edit.php';
        } else {
            echo "Pengguna tidak ditemukan.";
        }
    }

    // Memproses permintaan update pengguna
    public function update($id) {
        $id = intval($id);
        $name = htmlspecialchars($_POST['name'] ?? '');
        $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);

        if ($name && $email) {
            if ($this->userModel->update($id, ['name' => $name, 'email' => $email])) {
                header('Location: /user/index');
                exit;
            } else {
                echo "Gagal memperbarui pengguna.";
            }
        } else {
            echo "Data input tidak valid.";
        }
    }

    // Memproses permintaan penghapusan pengguna
    public function delete($id) {
        $id = intval($id);
        if ($this->userModel->delete($id)) {
            header('Location: /user/index');
            exit;
        } else {
            echo "Gagal menghapus pengguna.";
        }
    }

    // Menampilkan form tambah kursus atau memproses penambahan kursus baru
    public function addCourse() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $judul_kursus = htmlspecialchars($_POST['judul_kursus'] ?? '');
            $deskripsi = htmlspecialchars($_POST['deskripsi'] ?? '');
            $id_instruktur = intval($_POST['id_instruktur'] ?? 0);
            $durasi = intval($_POST['durasi'] ?? 0);

            if ($judul_kursus && $deskripsi && $id_instruktur && $durasi) {
                if ($this->courseModel->addCourse($judul_kursus, $deskripsi, $id_instruktur, $durasi)) {
                    header('Location: /user/index');
                    exit;
                } else {
                    $error = "Gagal menambahkan kursus.";
                }
            } else {
                $error = "Semua kolom wajib diisi!";
            }
        }

        require_once '../app/views/user/add_course.php';
    }

    // Menampilkan form edit kursus atau memproses pembaruan kursus
    public function editCourse($courseId) {
        $courseId = intval($courseId); // Pastikan ID valid
        $course = $this->courseModel->getCourseById($courseId); // Ambil data kursus
        $instructors = $this->userModel->getAllUsers(); // Ambil data instruktur
        if ($course) {
            require_once '../app/views/user/editCourse.php'; // Tampilkan form edit
        } else {
            echo "Kursus tidak ditemukan.";
        }
    }

    // Update Kursus (POST)
    public function updateCourse($courseId, $postData) {
        // Validasi dan proses data yang dikirim melalui form
        $judulKursus = $postData['judul_kursus'];
        $deskripsi = $postData['deskripsi'];
        $idInstruktur = $postData['id_instruktur'];
        $durasi = $postData['durasi'];
        
        // Update data kursus di database
        $updateResult = $this->courseModel->updateCourse($courseId, $judulKursus, $deskripsi, $idInstruktur, $durasi);
        
        if ($updateResult) {
            // Jika berhasil, arahkan pengguna kembali ke halaman daftar kursus atau halaman lainnya
            header('Location: /user/index');
            exit;
        } else {
            echo "Gagal memperbarui kursus.";
        }
    }
    
    

    // Hapus Kursus (POST)
    public function deleteCourse($courseId) {
        $courseId = intval($courseId);
        if ($this->courseModel->deleteCourse($courseId)) {
            header('Location: /user/index');
            exit;
        } else {
            echo "Gagal menghapus kursus.";
        }
    }

    
}
