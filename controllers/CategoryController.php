<?php
    require("services/CategoryService.php");
    class CategoryController{
        public function index(){
            $categoryService = new CategoryService();
            $categorys = $categoryService->getAllCategorys();

            include("view/category/category.php");
        }

        public function edit($id){
            $categoryService = new CategoryService();
            $category = $categoryService->editCategory($id);

            include("view/category/edit_category.php");
        }

        public function update(){
            $categoryService = new CategoryService();
            $categorys = $categoryService->updateCategory($_POST['txtCatId'],$_POST['txtCatName']);
            
            include("view/category/category.php");
        }

        public function create(){
            include("view/category/add_category.php");
        }

        public function store(){
            $categoryService = new CategoryService();
            $categorys = $categoryService->storeCategory($_POST['txtCatName']);

            include("view/category/category.php");
        }

        public function delete(){
            $categoryService = new CategoryService();
            $categorys = $categoryService->deleteCategory($_GET['id']);

            include("view/category/category.php");
        }
    }
?>