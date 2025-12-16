<?php

class HomeController
{
    private $productModel;
    private $categoryModel;
    public function __construct($connection)
    {
        $this->productModel = new Product($connection);
        $this->categoryModel = new Category($connection);
    }
    public function index(){
        $productsAll = $this->productModel->getAllProducts(1, 8, '', 'desc', null, 1);
        $result = $this->categoryModel->getAllCategories(1, 100, '', 1);
        $categoriesAll = $result['data'];

        require_once "Views/index.php";
    }
}
?>