<?php
// app/controllers/DataPesertaController.php
class Controller {
    private $dataPesertaa;

    public function __construct() {
        $this->dataPesertaa = new DataPeserta();
    }

    public function index() {
        $peserta = $this->dataPesertaa->getAllData();
        require_once '../app/views/user/index.php';
    }

    public function create() {
        require_once '../app/views/user/create.php';
    }

    public function store() {
        $peserta = $_POST['peserta'];
        $kursus = $_POST['kursus'];
        $tanggal_daftar = $_POST['tanggal_daftar'];
        $this->dataPesertaModel->add($peserta, $kursus, $tanggal_daftar);
        header('Location: /user/index');
    }

    public function edit($id) {
        $peserta = $this->dataPesertaa->find($id);
        require_once '../app/views/user/edit.php';
    }

    public function update($id, $data) {
        $this->dataPesertaa->update($id, $data);
        header('Location: /user/index');
    }

    public function delete($id) {
        $this->dataPesertaa->delete($id);
        header('Location: /user/index');
    }
}
