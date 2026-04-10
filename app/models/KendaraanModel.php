<?php
class KendaraanModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllKendaraan() {
        $this->db->query("SELECT k.*, u.nama_lengkap AS nama_pendaftar FROM tb_kendaraan k LEFT JOIN tb_user u ON k.id_user = u.id_user");
        return $this->db->resultSet();
    }

    public function getKendaraanById($id) {
        $this->db->query("SELECT * FROM tb_kendaraan WHERE id_kendaraan = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getKendaraanByPlat($plat_nomor) {
        $this->db->query("SELECT * FROM tb_kendaraan WHERE plat_nomor = :plat_nomor");
        $this->db->bind('plat_nomor', $plat_nomor);
        return $this->db->single();
    }

    public function insertKendaraan($data) {
        $this->db->query("INSERT INTO tb_kendaraan (plat_nomor, jenis_kendaraan, warna, pemilik, id_user) VALUES (:plat_nomor, :jenis_kendaraan, :warna, :pemilik, :id_user)");
        $this->db->bind('plat_nomor', $data['plat_nomor']);
        $this->db->bind('jenis_kendaraan', $data['jenis_kendaraan']);
        $this->db->bind('warna', $data['warna']);
        $this->db->bind('pemilik', $data['pemilik']);
        $this->db->bind('id_user', $data['id_user']);
        if($this->db->execute()){
            return $this->db->lastInsertId();
        }
        return false;
    }

    public function updateKendaraan($data) {
        $this->db->query("UPDATE tb_kendaraan SET plat_nomor = :plat_nomor, jenis_kendaraan = :jenis_kendaraan, warna = :warna, pemilik = :pemilik WHERE id_kendaraan = :id_kendaraan");
        $this->db->bind('plat_nomor', $data['plat_nomor']);
        $this->db->bind('jenis_kendaraan', $data['jenis_kendaraan']);
        $this->db->bind('warna', $data['warna']);
        $this->db->bind('pemilik', $data['pemilik']);
        $this->db->bind('id_kendaraan', $data['id_kendaraan']);
        return $this->db->execute();
    }

    public function deleteKendaraan($id) {
        $this->db->query("DELETE FROM tb_kendaraan WHERE id_kendaraan = :id_kendaraan");
        $this->db->bind('id_kendaraan', $id);
        return $this->db->execute();
    }
}
