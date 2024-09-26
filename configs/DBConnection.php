<?php

class DBConnection {
    private $conn = null;

    public function __construct() {
        // B1. Kết nối DB Server
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=btth01_cse485;port=3306', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Kích hoạt chế độ báo lỗi
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Thiết lập chế độ lấy dữ liệu mặc định
                PDO::ATTR_EMULATE_PREPARES => false, // Tắt giả lập chuẩn bị
            ]);
        } catch (PDOException $e) {
            // Ghi nhận lỗi thay vì in ra
            error_log($e->getMessage());
            die("Connection failed: please try again later.");
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function checkConnection() {
        if ($this->conn) {
            return true;
        }
        return false;
    }
}
?>
