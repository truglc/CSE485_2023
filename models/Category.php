<?php
class Category{
    // Thuộc tính

    private $SLBaiViet;
    private $ma_tloai;
    private $ten_tloai;


    public function __construct($ma_tloai = null,
                                $ten_tloai = null,
                                $SLBaiViet = null){
        $this->SLBaiViet = $SLBaiViet;
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
    }

    // Setter và Getter
    public function getMaBviet() {
        return $this->SLBaiViet;
    }

    public function setMaBviet($SLBaiViet) {
        $this->SLBaiViet = $SLBaiViet;
    }

    public function getMa_tloai() {
        return $this->ma_tloai;
    }

    public function setMa_tloai($ma_tloai) {
        $this->ma_tloai = $ma_tloai;
    }

    public function getTen_tloai() {
        return $this->ten_tloai;
    }

    public function setTen_tloai($ten_tloai) {
        $this->ten_tloai = $ten_tloai;
    }
}
?>