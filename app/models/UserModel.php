<?php
class UserModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserByUsername($username) {
        $this->db->query("SELECT * FROM tb_user WHERE username = :username AND status_aktif = 1");
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function getAllUsers() {
        $this->db->query("SELECT * FROM tb_user");
        return $this->db->resultSet();
    }

    public function getUserById($id) {
        $this->db->query("SELECT * FROM tb_user WHERE id_user = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function insertUser($data) {
        $this->db->query("INSERT INTO tb_user (nama_lengkap, username, password, role, status_aktif) VALUES (:nama_lengkap, :username, :password, :role, :status_aktif)");
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('status_aktif', isset($data['status_aktif']) ? 1 : 0);
        return $this->db->execute();
    }

    public function updateUser($data) {
        $query = "UPDATE tb_user SET nama_lengkap = :nama_lengkap, username = :username, role = :role, status_aktif = :status_aktif";
        if (!empty($data['password'])) {
            $query .= ", password = :password";
        }
        $query .= " WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('status_aktif', isset($data['status_aktif']) ? 1 : 0);
        $this->db->bind('id_user', $data['id_user']);
        
        if (!empty($data['password'])) {
            $this->db->bind('password', $data['password']);
        }

        return $this->db->execute();
    }

    public function deleteUser($id) {
        $this->db->query("DELETE FROM tb_user WHERE id_user = :id_user");
        $this->db->bind('id_user', $id);
        return $this->db->execute();
    }
}
