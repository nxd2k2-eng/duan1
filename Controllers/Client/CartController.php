<?php
require_once "Models/Cart.php";
class CartController {
    private $cartModel;

    public function __construct($connection) {
        $this->cartModel = new Cart($connection);
    }

    public function index() {
    
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?view=login');
            return;
        }
        $cartItems = $this->cartModel->getAllCarts($_SESSION['user']['id']);
        dump($cartItems);
        require_once "Views/cart.php";
        
    }
}