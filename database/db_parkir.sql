CREATE DATABASE IF NOT EXISTS db_parkir;
USE db_parkir;

CREATE TABLE IF NOT EXISTS tb_user (
    id_user INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama_lengkap VARCHAR(50),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(100),
    role ENUM('admin', 'petugas', 'owner'),
    status_aktif TINYINT(1) DEFAULT 1
);

INSERT INTO tb_user (id_user, nama_lengkap, username, password, role, status_aktif) VALUES 
(1, 'Administrator', 'admin', 'admin', 'admin', 1),
(2, 'Petugas Parkir', 'petugas', 'petugas', 'petugas', 1),
(3, 'Owner Parkir', 'owner', 'owner', 'owner', 1);

CREATE TABLE IF NOT EXISTS tb_tarif (
    id_tarif INT(11) PRIMARY KEY AUTO_INCREMENT,
    jenis_kendaraan ENUM('motor', 'mobil', 'lainnya'),
    tarif_per_jam DECIMAL(10,0)
);

INSERT INTO tb_tarif (id_tarif, jenis_kendaraan, tarif_per_jam) VALUES 
(1, 'motor', 2000),
(2, 'mobil', 5000),
(3, 'lainnya', 10000);

CREATE TABLE IF NOT EXISTS tb_area_parkir (
    id_area INT(11) PRIMARY KEY AUTO_INCREMENT,
    nama_area VARCHAR(50),
    kapasitas INT(5),
    terisi INT(5) DEFAULT 0
);

INSERT INTO tb_area_parkir (id_area, nama_area, kapasitas, terisi) VALUES 
(1, 'Area Motor A', 100, 0),
(2, 'Area Mobil B', 50, 0);

CREATE TABLE IF NOT EXISTS tb_kendaraan (
    id_kendaraan INT(11) PRIMARY KEY AUTO_INCREMENT,
    plat_nomor VARCHAR(15),
    jenis_kendaraan VARCHAR(20),
    warna VARCHAR(20),
    pemilik VARCHAR(100),
    id_user INT(11),
    FOREIGN KEY (id_user) REFERENCES tb_user(id_user) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS tb_transaksi (
    id_parkir INT(11) PRIMARY KEY AUTO_INCREMENT,
    id_kendaraan INT(11),
    waktu_masuk DATETIME,
    waktu_keluar DATETIME NULL,
    id_tarif INT(11),
    durasi_jam INT(5) NULL,
    biaya_total DECIMAL(10,0) NULL,
    status ENUM('masuk', 'keluar'),
    id_user INT(11),
    id_area INT(11),
    FOREIGN KEY (id_kendaraan) REFERENCES tb_kendaraan(id_kendaraan),
    FOREIGN KEY (id_tarif) REFERENCES tb_tarif(id_tarif),
    FOREIGN KEY (id_user) REFERENCES tb_user(id_user),
    FOREIGN KEY (id_area) REFERENCES tb_area_parkir(id_area)
);

CREATE TABLE IF NOT EXISTS tb_log_aktivitas (
    id_log INT(11) PRIMARY KEY AUTO_INCREMENT,
    id_user INT(11),
    aktivitas VARCHAR(100),
    waktu_aktivitas DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_user) REFERENCES tb_user(id_user) ON DELETE CASCADE
);
