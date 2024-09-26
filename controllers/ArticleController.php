<?php
require("services/ArticleService.php");
require("services/AuthorService.php");
require("services/CategoryService.php");

class ArticleController
{
    public function index()
    {
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticle();
        include("view/article/article.php");
        
    }

    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $tieuDe = $_POST['txtArtTitle'];
            $tenBaiHat = $_POST['txtArtBh'];
            $maTheLoai = $_POST['txtArtTL'];
            $tomTat = $_POST['txtArtTt'];
            $noiDung = $_POST['txtArtContent'];
            $maTacGia = $_POST['txtAutId'];
            $image_path = $_POST['path'].$_FILES['img']['name'];
            $name_image = $_FILES['img']['name'];
            $articleService = new ArticleService();
            $articleService->create($tieuDe, $tenBaiHat, $maTheLoai, $tomTat, $noiDung, $maTacGia, $name_image);
            move_uploaded_file($_FILES['img']['tmp_name'], $image_path);
            header("Location: index.php?controller=article&action=index");
            
        }else{
            $authorService = new AuthorService();
            $authors = $authorService->getAllAuthor();
            $categoryService = new CategoryService();
            $categories = $categoryService->getAllCategorys();
            include "view/article/add_article.php";
        }
    }
    public function delete()
    {
        $articleService = new ArticleService();
        $articles = $articleService->delete($_GET['id']);

        header("Location: index.php?controller=article&action=index");
    }
    public function edit(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $maBaiViet = $_POST['txtId'];
            $tieuDe = $_POST['txtArtTitle'];
            $tenBaiHat = $_POST['txtArtBh'];
            $maTheLoai = $_POST['txtArtTL'];
            $tomTat = $_POST['txtArtTt'];
            $noiDung = $_POST['txtArtContent'];
            $maTacGia = $_POST['txtAutId'];
            $image_path = $_POST['path'].$_FILES['img']['name'];
            $name_image = $_FILES['img']['name'];
            $articleService = new ArticleService();
            $articleService->edit($maBaiViet, $tieuDe, $tenBaiHat, $maTheLoai, $tomTat, $noiDung, $maTacGia, $name_image);
            move_uploaded_file($_FILES['img']['tmp_name'], $image_path);
            header("Location: index.php?controller=article&action=index");
        }else{
            $maBaiViet = $_GET['id'];
            $articleService = new ArticleService();
            $article = $articleService->getArticleById($maBaiViet);
            $authorService = new AuthorService();
            $authors = $authorService->getAllAuthor();
            $categoryService = new CategoryService();
            $categories = $categoryService->getAllCategorys();
            include "view/article/edit_article.php";
        }
    }
}
?>