<?php
class TransaksiModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllTransaksi() {
        $this->db->query("SELECT t.*, k.plat_nomor, k.pemilik, a.nama_area, tf.jenis_kendaraan, tf.tarif_per_jam, u.nama_lengkap AS nama_petugas 
                          FROM tb_transaksi t
                          JOIN tb_kendaraan k ON t.id_kendaraan = k.id_kendaraan
                          JOIN tb_area_parkir a ON t.id_area = a.id_area
                          JOIN tb_tarif tf ON t.id_tarif = tf.id_tarif
                          LEFT JOIN tb_user u ON t.id_user = u.id_user
                          ORDER BY t.waktu_masuk DESC");
        return $this->db->resultSet();
    }

    public function getActiveTransaksi() {
        $this->db->query("SELECT t.*, k.plat_nomor, k.jenis_kendaraan as jenis, k.pemilik, a.nama_area, tf.tarif_per_jam 
                          FROM tb_transaksi t
                          JOIN tb_kendaraan k ON t.id_kendaraan = k.id_kendaraan
                          JOIN tb_area_parkir a ON t.id_area = a.id_area
                          JOIN tb_tarif tf ON t.id_tarif = tf.id_tarif
                          WHERE t.status = 'masuk'
                          ORDER BY t.waktu_masuk DESC");
        return $this->db->resultSet();
    }

    public function getTransaksiById($id) {
        $this->db->query("SELECT t.*, k.plat_nomor, k.jenis_kendaraan as jenis, k.pemilik, a.nama_area, tf.tarif_per_jam, u.nama_lengkap AS nama_petugas 
                          FROM tb_transaksi t
                          JOIN tb_kendaraan k ON t.id_kendaraan = k.id_kendaraan
                          JOIN tb_area_parkir a ON t.id_area = a.id_area
                          JOIN tb_tarif tf ON t.id_tarif = tf.id_tarif
                          LEFT JOIN tb_user u ON t.id_user = u.id_user
                          WHERE t.id_parkir = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function insertTransaksi($data) {
        $this->db->query("INSERT INTO tb_transaksi (id_kendaraan, waktu_masuk, id_tarif, status, id_user, id_area) 
                          VALUES (:id_kendaraan, NOW(), :id_tarif, 'masuk', :id_user, :id_area)");
        $this->db->bind('id_kendaraan', $data['id_kendaraan']);
        $this->db->bind('id_tarif', $data['id_tarif']);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('id_area', $data['id_area']);
        if($this->db->execute()){
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function updateTransaksiKeluar($data) {
        $this->db->query("UPDATE tb_transaksi SET waktu_keluar = NOW(), durasi_jam = :durasi_jam, biaya_total = :biaya_total, status = 'keluar' WHERE id_parkir = :id_parkir");
        $this->db->bind('durasi_jam', $data['durasi_jam']);
        $this->db->bind('biaya_total', $data['biaya_total']);
        $this->db->bind('id_parkir', $data['id_parkir']);
        return $this->db->execute();
    }

    public function getLaporanByDate($start, $end) {
        $this->db->query("SELECT t.*, k.plat_nomor, tf.jenis_kendaraan 
                          FROM tb_transaksi t
                          JOIN tb_kendaraan k ON t.id_kendaraan = k.id_kendaraan
                          JOIN tb_tarif tf ON t.id_tarif = tf.id_tarif
                          WHERE t.status = 'keluar' 
                          AND DATE(t.waktu_masuk) >= :start AND DATE(t.waktu_keluar) <= :end
                          ORDER BY t.waktu_keluar DESC");
        $this->db->bind('start', $start);
        $this->db->bind('end', $end);
        return $this->db->resultSet();
    }
}
