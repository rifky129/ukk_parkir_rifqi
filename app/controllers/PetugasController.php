<?php
class PetugasController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'petugas') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Petugas';
        $data['user'] = $_SESSION['user_parkir'];
        
        $areas = $this->model('AreaModel')->getAllArea();
        $kapasitas = 0; $terisi = 0;
        foreach($areas as $a) {
            $kapasitas += $a['kapasitas'];
            $terisi += $a['terisi'];
        }
        $data['kapasitas'] = $kapasitas;
        $data['terisi'] = $terisi;
        $data['kendaraan_aktif'] = count($this->model('TransaksiModel')->getActiveTransaksi());

        $this->view('templates/header', $data);
        $this->view('templates/sidebar_petugas');
        $this->view('petugas/index', $data);
        $this->view('templates/footer_dashboard');
    }
}
