<?php
require_once("config/DBConnection.php");
include("models/Author.php");
class AuthorService
{
    public function getAllAuthor()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM tacgia";
        $stmt = $conn->query($sql);

        $authors = [];
        while ($row = $stmt->fetch()) {
            $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
            array_push($authors, $author);
        }


        return $authors;
    }
    public function getAuthorByID($ma_tgia)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "SELECT * FROM tacgia WHERE ma_tgia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $ma_tgia);
        $stmt->execute();
        $row = $stmt->fetch();
        $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
        return $author;
    }
    public function create($name, $image_path)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "INSERT INTO tacgia (ten_tgia, hinh_tgia) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $image_path);
        $stmt->execute();
    
    }
    public function edit($ma_tgia, $ten_tgia, $hinh_tgia){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "UPDATE tacgia SET ten_tgia = ?, hinh_tgia = ? WHERE ma_tgia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $ten_tgia);
        $stmt->bindParam(2, $hinh_tgia);
        $stmt->bindParam(3, $ma_tgia);
        $stmt->execute();

    }
    public function delete($ma_tgia){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $sql = "DELETE FROM tacgia WHERE ma_tgia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $ma_tgia);
        $stmt->execute();
    }
}
?>
