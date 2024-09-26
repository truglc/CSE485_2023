<?php
    require("services/ArticleService.php");
    class DetailController{
        public function index($id){
            $articelService = new ArticleService();
            $articles = $articelService->getDetailArticle($id);
            include("view/home/detail.php");
        }
    }
?>