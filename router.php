<?php

require_once 'Models/Product.php';
$productModel = new Product($connection);
$productList = $productModel->getAllProducts(1, 10);
var_dump($productList);

// $product = $productModel->getOneProduct(1);
// var_dump($product);

// $product = $productModel->getOneProduct(2);
// var_dump($product);