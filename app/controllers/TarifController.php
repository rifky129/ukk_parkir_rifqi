<?php
class TarifController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'admin') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Kelola Tarif Parkir';
        $data['tarif'] = $this->model('TarifModel')->getAllTarif();
        
        $this->view('templates/header', $data);
        $this->view('templates/sidebar_admin');
        $this->view('admin/tarif/index', $data);
        $this->view('templates/footer_dashboard');
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('TarifModel')->insertTarif($_POST)) {
                $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Menambah tarif parkir: ' . $_POST['jenis_kendaraan']);
                $this->redirect('tarif');
            }
        }
    }

    public function ubah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('TarifModel')->updateTarif($_POST)) {
                $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Mengubah tarif parkir ID: ' . $_POST['id_tarif']);
                $this->redirect('tarif');
            }
        }
    }

    public function hapus($id) {
        if ($this->model('TarifModel')->deleteTarif($id)) {
            $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Menghapus tarif parkir ID: ' . $id);
            $this->redirect('tarif');
        }
    }
}
