<?php   
class Author{
    private $ma_tgia;
    private $ten_tgia;
    private $hinh_tgia;

    public function __construct($ma_tgia = null, $ten_tgia = null, $hinh_tgia = null){
        $this->ma_tgia = $ma_tgia;
        $this->ten_tgia = $ten_tgia;
        $this->hinh_tgia = $hinh_tgia;
    }
    
    public function getMaTgia() {
        return $this->ma_tgia;
    }
    public function getTenTgia() {
        return $this->ten_tgia;
    }
    public function getHinhTgia() {
        return $this->hinh_tgia;
    }
    public function setMaTgia($ma_tgia) {
        $this->ma_tgia = $ma_tgia;
    }
    public function setTenTgia($ten_tgia) {
        $this->ten_tgia = $ten_tgia;
    }
    public function setHinhTgia($hinh_tgia) {
        $this->hinh_tgia = $hinh_tgia;
    }
}
?>