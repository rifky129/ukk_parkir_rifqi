<?php
class OwnerController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'owner') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Owner';
        $data['user'] = $_SESSION['user_parkir'];
        
        $laporan_hari_ini = $this->model('TransaksiModel')->getLaporanByDate(date('Y-m-d'), date('Y-m-d'));
        $pendapatan_hari_ini = 0;
        foreach($laporan_hari_ini as $l) {
            if ($l['biaya_total']) $pendapatan_hari_ini += $l['biaya_total'];
        }
        
        $laporan_bulan_ini = $this->model('TransaksiModel')->getLaporanByDate(date('Y-m-01'), date('Y-m-t'));
        $pendapatan_bulan_ini = 0;
        foreach($laporan_bulan_ini as $l) {
            if ($l['biaya_total']) $pendapatan_bulan_ini += $l['biaya_total'];
        }

        $data['pendapatan_hari_ini'] = $pendapatan_hari_ini;
        $data['pendapatan_bulan_ini'] = $pendapatan_bulan_ini;
        $data['transaksi_hari_ini'] = count($laporan_hari_ini);

        $this->view('templates/header', $data);
        $this->view('templates/sidebar_owner');
        $this->view('owner/index', $data);
        $this->view('templates/footer_dashboard');
    }
}
