<?php
class AreaModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllArea() {
        $this->db->query("SELECT * FROM tb_area_parkir");
        return $this->db->resultSet();
    }

    public function getAreaById($id) {
        $this->db->query("SELECT * FROM tb_area_parkir WHERE id_area = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function insertArea($data) {
        $this->db->query("INSERT INTO tb_area_parkir (nama_area, kapasitas, terisi) VALUES (:nama_area, :kapasitas, 0)");
        $this->db->bind('nama_area', $data['nama_area']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        return $this->db->execute();
    }

    public function updateArea($data) {
        $this->db->query("UPDATE tb_area_parkir SET nama_area = :nama_area, kapasitas = :kapasitas WHERE id_area = :id_area");
        $this->db->bind('nama_area', $data['nama_area']);
        $this->db->bind('kapasitas', $data['kapasitas']);
        $this->db->bind('id_area', $data['id_area']);
        return $this->db->execute();
    }

    public function deleteArea($id) {
        $this->db->query("DELETE FROM tb_area_parkir WHERE id_area = :id_area");
        $this->db->bind('id_area', $id);
        return $this->db->execute();
    }

    public function incrementTerisi($id) {
        $this->db->query("UPDATE tb_area_parkir SET terisi = terisi + 1 WHERE id_area = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }

    public function decrementTerisi($id) {
        $this->db->query("UPDATE tb_area_parkir SET terisi = CASE WHEN terisi > 0 THEN terisi - 1 ELSE 0 END WHERE id_area = :id");
        $this->db->bind('id', $id);
        return $this->db->execute();
    }
}
