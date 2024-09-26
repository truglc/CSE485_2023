<?php
class Admin{
    // Thuộc tính

    private $password;
    private $id;
    private $username;


    public function __construct($id = null,
                                $username = null,
                                $password = null){
        $this->password = $password;
        $this->id = $id;
        $this->username = $username;
    }

    // Setter và Getter
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }
}
?>