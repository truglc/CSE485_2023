<?php
require_once("./configs/DBConnection.php");
include("models/Article.php");
class ArticleService
{
    public function getAllArticlesHome()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch()) {
            $article = new Article($row['ma_bviet'],null, $row['ten_bhat'], $row['hinhanh']);
            array_push($articles, $article);
        }


        return $articles;
    }

    public function getDetailArticle($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat,baiviet.tomtat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet, baiviet.hinhanh FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE baiviet.ma_bviet = '" . $id . "'";
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch()) {

            $arr = [
                'tieude' => $row['tieude'],
                'ten_bhat' => $row['ten_bhat'],
                'tomtat' => $row['tomtat'],
                'ten_tgia' => $row['ten_tgia'],
                'ten_tloai' => $row['ten_tloai'],
                'ngayviet' => $row['ngayviet'],
                'hinhanh' => $row['hinhanh']
            ];
            array_push($articles, $arr);
        }


        return $articles;
    }
    public function getAllArticle()
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM baiviet";
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch()) {
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles, $article);
        }


        return $articles;
    }


    public function delete($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql_delete = "DELETE FROM `baiviet` WHERE `ma_bviet` = '" . $id . "'";
        $stmt_delete = $conn->query($sql_delete);
    }

    public function create($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidund, $ma_tgia, $hinhanh)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "INSERT INTO `baiviet`(`tieude`, `ten_bhat`, `ma_tloai`, `tomtat`, `noidung`, `ma_tgia`, `hinhanh`) VALUES ('" . $tieude . "','" . $ten_bhat . "','" . $ma_tloai . "','" . $tomtat . "','" . $noidund . "','" . $ma_tgia . "','" . $hinhanh . "')";
        $stmt_store = $conn->query($sql);
    }
    public function getArticleById($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();


        $sql = "SELECT baiviet.*, tacgia.ten_tgia, theloai.ten_tloai 
        FROM baiviet 
        INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
        INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
        WHERE baiviet.ma_bviet = '" . $id . "'";
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch()) {

            $arr = [
                'ma_bviet' => $row['ma_bviet'],
                'tieude' => $row['tieude'],
                'ten_bhat' => $row['ten_bhat'],
                'ma_tloai' => $row['ma_tloai'],
                'tomtat' => $row['tomtat'],
                'noidung' => $row['noidung'],
                'ma_tgia' => $row['ma_tgia'],
                'hinhanh' => $row['hinhanh'],
                'ten_tgia' => $row['ten_tgia'],
                'ten_tloai' => $row['ten_tloai']

            ];
            array_push($articles, $arr);
        }


        return $articles;
    }
    public function edit($maBaiViet, $tieuDe, $tenBaiHat, $maTheLoai, $tomTat, $noiDung, $maTacGia, $name_image)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        // B2. Truy vấn
        $sql = "UPDATE `baiviet` SET `tieude`='" . $tieuDe . "',`ten_bhat`='" . $tenBaiHat . "',`ma_tloai`='" . $maTheLoai . "',`tomtat`='" . $tomTat . "',`noidung`='" . $noiDung . "',`ma_tgia`='" . $maTacGia . "',`hinhanh`='" . $name_image . "' WHERE `ma_bviet` = '" . $maBaiViet . "'";
        $stmt = $conn->query($sql);
    }
}
?>
