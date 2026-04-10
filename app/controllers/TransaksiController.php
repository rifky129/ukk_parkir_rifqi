<?php
class TransaksiController extends Controller {
    public function __construct() {
        if (!isset($_SESSION['user_parkir']) || $_SESSION['user_parkir']['role'] !== 'petugas') {
            $this->redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Kelola Transaksi';
        $data['active'] = $this->model('TransaksiModel')->getActiveTransaksi();
        $data['area'] = $this->model('AreaModel')->getAllArea();
        $data['tarif'] = $this->model('TarifModel')->getAllTarif();
        
        $this->view('templates/header', $data);
        $this->view('templates/sidebar_petugas');
        $this->view('petugas/transaksi/index', $data);
        $this->view('templates/footer_dashboard');
    }

    public function masuk() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kendaraanModel = $this->model('KendaraanModel');
            $k = $kendaraanModel->getKendaraanByPlat($_POST['plat_nomor']);
            if ($k) {
                $id_kendaraan = $k['id_kendaraan'];
            } else {
                $id_kendaraan = $kendaraanModel->insertKendaraan([
                    'plat_nomor' => $_POST['plat_nomor'],
                    'jenis_kendaraan' => $_POST['jenis_kendaraan'],
                    'warna' => $_POST['warna'],
                    'pemilik' => $_POST['pemilik'],
                    'id_user' => $_SESSION['user_parkir']['id_user']
                ]);
            }

            $tarifList = $this->model('TarifModel')->getAllTarif();
            $id_tarif = 1;
            foreach($tarifList as $t) {
                if($t['jenis_kendaraan'] == $_POST['jenis_kendaraan']) {
                    $id_tarif = $t['id_tarif']; break;
                }
            }

            $this->model('TransaksiModel')->insertTransaksi([
                'id_kendaraan' => $id_kendaraan,
                'id_tarif' => $id_tarif,
                'id_user' => $_SESSION['user_parkir']['id_user'],
                'id_area' => $_POST['id_area']
            ]);

            $this->model('AreaModel')->incrementTerisi($_POST['id_area']);
            
            $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Input parkir masuk plat: ' . $_POST['plat_nomor']);
            $this->redirect('transaksi');
        }
    }

    public function keluar($id_parkir) {
        $trx = $this->model('TransaksiModel')->getTransaksiById($id_parkir);
        if ($trx && $trx['status'] == 'masuk') {
            date_default_timezone_set('Asia/Jakarta');
            $waktu_masuk = strtotime($trx['waktu_masuk']);
            $waktu_keluar = time();
            
            $diffSeconds = $waktu_keluar - $waktu_masuk;
            $durasi_jam = ceil($diffSeconds / 3600);
            if ($durasi_jam < 1) $durasi_jam = 1;

            $biaya_total = $durasi_jam * $trx['tarif_per_jam'];

            $this->model('TransaksiModel')->updateTransaksiKeluar([
                'id_parkir' => $id_parkir,
                'durasi_jam' => $durasi_jam,
                'biaya_total' => $biaya_total
            ]);

            $this->model('AreaModel')->decrementTerisi($trx['id_area']);
            
            $this->model('LogModel')->insertLog($_SESSION['user_parkir']['id_user'], 'Input parkir keluar plat: ' . $trx['plat_nomor']);
            
            $this->redirect('transaksi/struk/' . $id_parkir);
        }
    }

    public function struk($id_parkir) {
        $data['title'] = 'Struk Parkir';
        $data['trx'] = $this->model('TransaksiModel')->getTransaksiById($id_parkir);
        
        $this->view('templates/header', $data);
        $this->view('petugas/transaksi/struk', $data);
    }
}
