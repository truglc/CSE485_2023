<?php
require("services/AuthorService.php");
require("services/CategoryService.php");
require("services/AdminService.php");
require("services/ArticleService.php");
    class AdminController{
        public function index(){
            $categoryService = new CategoryService();
            $categorys = $categoryService->getAllCategorys();
            
            
            $authorService = new AuthorService();
            $authors = $authorService->getAllAuthor();

            $adminService = new AdminService();
            $admins = $adminService->getAllAdmin();

            $articleService = new ArticleService();
            $articles = $articleService->getAllArticlesHome();

            include("view/admin/index.php");
        }
    }
?>