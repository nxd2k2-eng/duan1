<?php

$role = isset($_GET['role']) ? $_GET['role'] : '';

if ($role === "admin") {

    $module = isset($_GET['module']) ? $_GET['module'] : '';


    switch ($module) {
        case 'products':
            $action = isset($_GET['action']) ? $_GET['action'] : 'index';
            require_once "Controllers/Admin/ProductController.php";
            $productController = new ProductController($connection);

            switch ($action) {
                case 'index':
                    $productController->index();
                    break;
                case 'create':
                    $productController->create();
                    break;
                case 'store':
                    $productController->store();
                    break;
                case 'edit':
                    $productController->edit();
                    break;
                case 'update':
                    $productController->update();
                    break;
                case 'delete':
                    $productController->delete();
                    break;
                case 'update-active':
                    $productController->updateActive();
                    break;
                default:
                    $productController->index();
            }
            break;
        case 'categories':
            $action = isset($_GET['action']) ? $_GET['action'] : 'index';
            require_once "Controllers/Admin/CategoryController.php";
            $categoryController = new CategoryController($connection);
            switch ($action) {
                case 'index':
                    $categoryController->index();
                    break;
                case 'create':
                    $categoryController->create();
                    break;
                case 'store':
                    $categoryController->store();
                    break;
                case 'edit':
                    $categoryController->edit();
                    break;
                case 'update':
                    $categoryController->update();
                    break;
                case 'delete':
                    $categoryController->delete();
                    break;
                default:
                    $categoryController->index();
            }
            break;
        default:
            require_once "Controllers/Admin/DashboardController.php";
            $dashboardController = new DashboardController();
            $dashboardController->index();
    }
} else {
    $view = isset($_GET['view']) ? $_GET['view'] : '';

    switch ($view) {
        case 'single-product':
            require_once "Controllers/Client/ShopController.php";
            $productController = new ShopController($connection);
            $productController->show();
            break;
        case 'shop':
            require_once "Controllers/Client/ShopController.php";
            $shopController = new ShopController($connection);
            $shopController->index();
            break;
        case 'cart':
            require_once "Controllers/Client/CartController.php";
            $cartController = new CartController($connection);
            $cartController->index();
            break;
        // case 'bestseller':
        //     require_once "Controllers/Client/BestSellerController.php";
        //     $bestSellerController = new BestSellerController($connection);
        //     $bestSellerController->index();
        //     break;
        // case 'checkout':
        //     require_once "Controllers/Client/CheckoutController.php";
        //     $checkoutController = new CheckoutController($connection);
        //     $checkoutController->index();
        //     break;
        // case '404':
        //     require_once "Controllers/Client/NotFoundController.php";
        //     $notFoundController = new NotFoundController($connection);
        //     $notFoundController->index();
        //     break;
        // case 'contact':
        //     require_once "Controllers/Client/ContactController.php";
        //     $contactController = new ContactController($connection);
        //     $contactController->index();
        //     break;
        // case 'home':
        //     require_once "Controllers/Client/HomeController.php";
        //     $homeController = new HomeController($connection);
        //     $homeController->index();
        //     break;
        // case 'single':
        //     require_once "Controllers/Client/SingleProductController.php";
        //     $singleProductController = new SingleProductController($connection);
        //     $singleProductController->index();
        //     break;
        case 'login':
            require_once "Controllers/Client/AuthController.php";
            $authController = new AuthController($connection);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $authController->handleLogin();
            } else {
                $authController->login();
            }
            break;
        case 'register':
            require_once "Controllers/Client/AuthController.php";
            $authController = new AuthController($connection);
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $authController->handleRegister();
            } else {
                $authController->register();
            }
            break;
        case 'logout':
            unset($_SESSION['user']);
            header("Location: /");
            break;


        default:
            require_once "Controllers/Client/HomeController.php";
            $homeController = new HomeController($connection);
            $homeController->index();
            break;
    }
}

// require_once 'Models/Product.php';
// $productModels = new Product($connection);
// // $productList = $productModels->getAllProducts(1, 10, '', 1, 'desc');
// // var_dump($productList);
// // $product = $productModels->getOneProduct(2);
// // echo "<pre>";
// // var_dump($product);
// // echo "</pre>";

// // $product = $productModels->getOneProduct(1, 1);
// // echo "<pre>";
// // var_dump($product);
// // echo "</pre>";

// require_once 'Models/Cart.php';
// $cartModels = new Cart($connection);
// // $cartList = $cartModels->getAllCarts(15, 15, 1);
// // echo "<pre>";
// // var_dump($cartList);
// // echo "</pre>";

// require_once 'Models/User.php';
// $userModels = new User($connection);
// // $userList = $userModels->getAllUsers(1, 15, '', 1, 'desc');
// // var_dump($userList);
// // $user = $userModels->getOneUsers(2);
// // echo "<pre>";
// // var_dump($user);
// // echo "</pre>";


// require_once 'Models/Category.php';
// $categoryModels = new Category($connection);
// // $categoryList = $categoryModels->getAllCategories(1, 15, '', 1, 'desc');
// // $category = $categoryModels->getOneCategory(2);
// // echo "<pre>";
// // var_dump($category);
// // echo "</pre>";

// require_once 'Models/Order.php';
// $orderModels = new Order($connection);
// $orderList = $orderModels->getAllOrders(1, 15, '', 1, 'desc');
// var_dump($orderList);
// $order = $orderModels->getOneOrder(2);
// echo "<pre>";
// var_dump($order);
// echo "</pre>";