<?php
include("services/ArticleService.php");
class HomeController{
    public function index(){
        $articelService = new ArticleService();
        $articles = $articelService->getAllArticlesHome();
        include("views/home/index.php");
    }
}
?>