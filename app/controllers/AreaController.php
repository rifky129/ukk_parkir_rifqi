<?php
class AreaController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'admin') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Kelola Area Parkir';
        $data['area'] = $this->model('AreaModel')->getAllArea();
        
        $this->view('templates/header', $data);
        $this->view('templates/sidebar_admin');
        $this->view('admin/area/index', $data);
        $this->view('templates/footer_dashboard');
    }

    public function tambah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('AreaModel')->insertArea($_POST)) {
                $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Menambah area parkir: ' . $_POST['nama_area']);
                $this->redirect('area');
            }
        }
    }

    public function ubah() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('AreaModel')->updateArea($_POST)) {
                $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Mengubah area parkir ID: ' . $_POST['id_area']);
                $this->redirect('area');
            }
        }
    }

    public function hapus($id) {
        if ($this->model('AreaModel')->deleteArea($id)) {
            $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Menghapus area parkir ID: ' . $id);
            $this->redirect('area');
        }
    }
}
