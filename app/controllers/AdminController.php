<?php
class AdminController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'admin') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $_SESSION['user_parkir'];
        
        $data['total_users'] = count($this->model('UserModel')->getAllUsers());
        
        $areas = $this->model('AreaModel')->getAllArea();
        $kapasitas = 0; $terisi = 0;
        foreach($areas as $a) {
            $kapasitas += $a['kapasitas'];
            $terisi += $a['terisi'];
        }
        $data['kapasitas'] = $kapasitas;
        $data['terisi'] = $terisi;
        $data['kendaraan_aktif'] = count($this->model('TransaksiModel')->getActiveTransaksi());
        
        $laporan = $this->model('TransaksiModel')->getLaporanByDate('2000-01-01', date('Y-m-d'));
        $total_pendapatan = 0;
        foreach($laporan as $l) {
            if ($l['biaya_total']) $total_pendapatan += $l['biaya_total'];
        }
        $data['total_pendapatan'] = $total_pendapatan;

        $this->view('templates/header', $data);
        $this->view('templates/sidebar_admin');
        $this->view('admin/index', $data);
        $this->view('templates/footer_dashboard');
    }
}
