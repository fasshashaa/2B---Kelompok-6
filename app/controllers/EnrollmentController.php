<?php
// app/controllers/enrollmentController.php
require_once '../app/models/Enrollment.php';

class EnrollmentController {
    private $pesertaenrollment;

    public function __construct() {
        $this->pesertaenrollment = new Enrollment();
    }

    public function index() {
        $users = $this->pesertaenrollment->getAllPeserta();
        require_once '../app/views/enrollment/index.php';

    }

    public function create() {
        require_once '../app/views/enrollment/create.php';
    }

    public function store() {
        $peserta = $_POST['peserta'];
        $kursus = $_POST['kursus'];
        $tanggal_daftar = $_POST['tanggal_daftar'];
        $this->pesertaenrollment->add($peserta, $kursus, $tanggal_daftar);
        header('Location: /enrollment/index');
    }
    // Show the edit form with the user data
    public function edit($id) {
        $peserta = $this->pesertaenrollment->find($id); // Assume find() gets user by ID
        require_once __DIR__ . '/../views/enrollment/edit.php';
    }

    // Process the update request
    public function update($id, $data) {
        // Validasi data
        if (empty($data['peserta']) || empty($data['kursus']) || empty($data['tanggal_daftar'])) {
            die("Error: Semua field harus diisi.");
        }
    
        // Lakukan update
        $updated = $this->pesertaenrollment->update($id, $data);
    
        if ($updated) {
            header("Location: /enrollment/index"); // Redirect to user list
            exit;
        } else {
            echo "Failed to update peserta.";
        }
    }
    

    // Process delete request
    public function delete($id) {
        $deleted = $this->pesertaenrollment->delete($id);
        if ($deleted) {
            header("Location: enrollment/index"); // Redirect to user list
        } else {
            echo "Failed to delete peserta.";
        }
    }
}
