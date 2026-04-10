<?php
class LaporanController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'owner') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Rekap Transaksi';
        
        $start = isset($_GET['start']) ? $_GET['start'] : date('Y-m-d');
        $end = isset($_GET['end']) ? $_GET['end'] : date('Y-m-d');
        
        $data['start'] = $start;
        $data['end'] = $end;
        $data['laporan'] = $this->model('TransaksiModel')->getLaporanByDate($start, $end);
        
        $this->view('templates/header', $data);
        $this->view('templates/sidebar_owner');
        $this->view('owner/laporan/index', $data);
        $this->view('templates/footer_dashboard');
    }
}
