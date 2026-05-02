<?php
class Pesanan {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM pesanan ORDER BY id DESC");
    }

    public function getById($id) {
        return $this->conn->query("SELECT * FROM pesanan WHERE id=$id");
    }

    public function create($nama, $jenis, $deadline, $harga, $status) {
        return $this->conn->query("INSERT INTO pesanan (nama_klien, jenis_desain, deadline, harga, status) 
                                   VALUES ('$nama', '$jenis', '$deadline', '$harga', '$status')");
    }

    public function update($id, $nama, $jenis, $deadline, $harga, $status) {
        return $this->conn->query("UPDATE pesanan SET nama_klien='$nama', jenis_desain='$jenis', 
                                   deadline='$deadline', harga='$harga', status='$status' WHERE id=$id");
    }

    public function delete($id) {
        return $this->conn->query("DELETE FROM pesanan WHERE id=$id");
    }
}
?>