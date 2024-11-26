<?php
// app/models/DataPeserta.php

class DataPeserta {
    private $db;

    public function __construct() {
        $this->db = new Database(); // Pastikan kelas Database sudah benar.
    }

    public function getAllData() {
        $query = $this->db->query("SELECT * FROM enrollments");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($peserta, $kursus, $tanggal_daftar) {
        $query = $this->db->prepare("INSERT INTO enrollments (peserta, kursus, tanggal_daftar) VALUES (:peserta, :kursus, :tanggal_daftar)");
        return $query->execute([
            ':peserta' => $peserta,
            ':kursus' => $kursus,
            ':tanggal_daftar' => $tanggal_daftar,
        ]);
    }

    public function find($id) {
        $query = $this->db->prepare("SELECT * FROM enrollments WHERE id = :id");
        $query->execute([':id' => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data) {
        $query = $this->db->prepare("UPDATE enrollments SET peserta = :peserta, kursus = :kursus, tanggal_daftar = :tanggal_daftar WHERE id = :id");
        return $query->execute([
            ':id' => $id,
            ':peserta' => $data['peserta'],
            ':kursus' => $data['kursus'],
            ':tanggal_daftar' => $data['tanggal_daftar'],
        ]);
    }

    public function delete($id) {
        $query = $this->db->prepare("DELETE FROM enrollments WHERE id = :id");
        return $query->execute([':id' => $id]);
    }
}
