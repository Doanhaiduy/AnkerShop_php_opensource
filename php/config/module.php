<?php
require '../config/db.php';
require '../utils/component.php';
require '../controllers/Cart.php';
require '../controllers/Product.php';
require '../controllers/Auth.php';
require '../controllers/Order.php';
require '../models/Order.php';
require '../utils/index.php';
require '../utils/validate.php';
require '../config/vnpay.php';

$productService = new ProductController($conn);
$cartService = new CartController($conn);
$orderService = new OrderController($conn);
$authService = new AuthController($conn);


$pathHome = explode('/php', $_SERVER['PHP_SELF'])[0];
if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']['id'];
    $cartId = $_SESSION['user']['cart_id'];
}
