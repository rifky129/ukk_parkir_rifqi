<?php
class LogModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insertLog($id_user, $aktivitas) {
        $this->db->query("INSERT INTO tb_log_aktivitas (id_user, aktivitas) VALUES (:id_user, :aktivitas)");
        $this->db->bind('id_user', $id_user);
        $this->db->bind('aktivitas', $aktivitas);
        return $this->db->execute();
    }

    public function getAllLogs() {
        $this->db->query("SELECT l.*, u.nama_lengkap, u.username FROM tb_log_aktivitas l LEFT JOIN tb_user u ON l.id_user = u.id_user ORDER BY l.waktu_aktivitas DESC");
        return $this->db->resultSet();
    }
}
