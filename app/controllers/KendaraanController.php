<?php
class KendaraanController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'admin') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Data Kendaraan';
        $data['kendaraan'] = $this->model('KendaraanModel')->getAllKendaraan();
        
        $this->view('templates/header', $data);
        $this->view('templates/sidebar_admin');
        $this->view('admin/kendaraan/index', $data);
        $this->view('templates/footer_dashboard');
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST['id_user'] = $_SESSION['user_parkir']['id_user'];
            if ($this->model('KendaraanModel')->insertKendaraan($_POST)) {
                $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Menambah kendaraan plat: ' . $_POST['plat_nomor']);
                $this->redirect('kendaraan');
            }
        }
    }

    public function ubah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('KendaraanModel')->updateKendaraan($_POST)) {
                $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Mengubah kendaraan plat: ' . $_POST['plat_nomor']);
                $this->redirect('kendaraan');
            }
        }
    }

    public function hapus($id) {
        if ($this->model('KendaraanModel')->deleteKendaraan($id)) {
            $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Menghapus kendaraan ID: ' . $id);
            $this->redirect('kendaraan');
        }
    }
}
