<?php
class TarifModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllTarif() {
        $this->db->query("SELECT * FROM tb_tarif");
        return $this->db->resultSet();
    }

    public function getTarifById($id) {
        $this->db->query("SELECT * FROM tb_tarif WHERE id_tarif = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function insertTarif($data) {
        $this->db->query("INSERT INTO tb_tarif (jenis_kendaraan, tarif_per_jam) VALUES (:jenis_kendaraan, :tarif_per_jam)");
        $this->db->bind('jenis_kendaraan', $data['jenis_kendaraan']);
        $this->db->bind('tarif_per_jam', $data['tarif_per_jam']);
        return $this->db->execute();
    }

    public function updateTarif($data) {
        $this->db->query("UPDATE tb_tarif SET jenis_kendaraan = :jenis_kendaraan, tarif_per_jam = :tarif_per_jam WHERE id_tarif = :id_tarif");
        $this->db->bind('jenis_kendaraan', $data['jenis_kendaraan']);
        $this->db->bind('tarif_per_jam', $data['tarif_per_jam']);
        $this->db->bind('id_tarif', $data['id_tarif']);
        return $this->db->execute();
    }

    public function deleteTarif($id) {
        $this->db->query("DELETE FROM tb_tarif WHERE id_tarif = :id_tarif");
        $this->db->bind('id_tarif', $id);
        return $this->db->execute();
    }
}
