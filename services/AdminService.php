<?php
require_once("config/DBConnection.php");
include("models/Admin.php");
class AdminService{
    public function getAllAdmin(){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM user";
        $stmt = $conn->query($sql);

        $admins = [];
        while($row = $stmt->fetch()){
            $admin = new Admin( $row['id'], $row['username'],$row['password']);
            array_push($admins,$admin);
        }


        return $admins;
    }
}
?>