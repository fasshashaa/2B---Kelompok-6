<?php
// app/models/User.php
require_once '../config/database.php';

class Enrollment {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllUsers() {
        $query = $this->db->query("SELECT * FROM enrollments");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $query = $this->db->prepare("SELECT * FROM enrollments WHERE id = :id");
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($peserta, $kursus, $tanggal_daftar) {
        $query = $this->db->prepare("INSERT INTO enrollments (peserta, kursus, tanggal_daftar) VALUES (:peserta, :kursus, :tanggal_daftar)");
        $query->bindParam(':peserta', $peserta);
        $query->bindParam(':kursus', $kursus);
        $query->bindParam(':tanggal_daftar', $tanggal_daftar);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id, $data) {
        $query = "UPDATE enrollments SET peserta = :peserta, kursus = :kursus, tanggal_daftar = :tanggal_daftar WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':peserta', $data['peserta']);
        $stmt->bindParam(':kursus', $data['kursus']);
        $stmt->bindParam(':tanggal_daftar', $data['tanggal_daftar']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Delete user by ID
    public function delete($id) {
        $query = "DELETE FROM enrollments WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
