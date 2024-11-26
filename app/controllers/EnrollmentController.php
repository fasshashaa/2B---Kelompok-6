<?php
// app/controllers/UserController.php
require_once '../app/models/Enrollment.php';

class EnrollmentController {
    private $pesertaenrollment;

    public function __construct() {
        $this->pesertaenrollment = new Enrollment();
    }

    public function index() {
        $users = $this->pesertaenrollment->getAllUsers();
        require_once '../app/views/user/index.php';

    }

    public function create() {
        require_once '../app/views/user/create.php';
    }

    public function store() {
        $peserta = $_POST['peserta'];
        $kursus = $_POST['kursus'];
        $tanggal_daftar = $_POST['tanggal_daftar'];
        $this->pesertaenrollment->add($peserta, $kursus, $tanggal_daftar);
        header('Location: /user/index');
    }
    // Show the edit form with the user data
    public function edit($id) {
        $peserta = $this->pesertaenrollment->find($id); // Assume find() gets user by ID
        require_once __DIR__ . '/../views/user/edit.php';
    }

    // Process the update request
    public function update($id, $data) {
        $updated = $this->pesertaenrollment->update($id, $data);
        if ($updated) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }

    // Process delete request
    public function delete($id) {
        $deleted = $this->pesertaenrollment->delete($id);
        if ($deleted) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
        }
    }
}
