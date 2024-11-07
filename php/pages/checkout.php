<?php
require '../config/db.php';
require '../utils/component.php';
require '../controllers/Cart.php';
require '../controllers/Product.php';
require '../controllers/Auth.php';
require '../controllers/Order.php';
require '../models/Order.php';

$pathHome = explode('/php', $_SERVER['PHP_SELF'])[0];

$cartService = new CartController($conn);
$productService = new ProductController($conn);
$orderService = new OrderController($conn);

$userId = $_SESSION['user']['id'];
$cartId = $_SESSION['user']['cart_id'];

$cartProduct = $cartService->getCartProducts($userId);
$totalPrice = $cartService->getTotalPrice($cartId);
$paymentMethods = $orderService->getPaymentMethods();

$errs = [];


if (isset($_POST['checkout'])) {
    // $full_name = $_POST['full_name'];
    // $phone_number = $_POST['phone_number'];
    // $user_address = $_POST['user_address'];
    // $payment_method_id = $_POST['payment_method_id'];
    // $order_note = $_POST['order_note'];
    $date = date('Y-m-d H:i:s');

    if (empty($_POST['full_name'])) {
        $errs['full_name'] = 'Vui lòng nhập họ và tên';
    } else {
        $full_name = mysqli_real_escape_string($conn, trim($_POST['full_name']));
    }

    if (empty($_POST['phone_number'])) {
        $errs['phone_number'] = 'Vui lòng nhập số điện thoại';
    } else {
        $phone_number = mysqli_real_escape_string($conn, trim($_POST['phone_number']));
    }

    if (empty($_POST['user_address'])) {
        $errs['user_address'] = 'Vui lòng nhập địa chỉ';
    } else {
        $user_address = mysqli_real_escape_string($conn, trim($_POST['user_address']));
    }

    if (empty($_POST['payment_method_id'])) {
        $errs['payment_method_id'] = 'Vui lòng chọn phương thức thanh toán';
    } else {
        $payment_method_id = mysqli_real_escape_string($conn, trim($_POST['payment_method_id']));
    }

    if (empty($_POST['order_note'])) {
        $order_note = '';
    } else {
        $order_note = mysqli_real_escape_string($conn, trim($_POST['order_note']));
    }



    if (empty($errs)) {
        $order = new Order(null, $userId, $date, $full_name, $phone_number, $user_address, $payment_method_id, $order_note);
        $result = $orderService->addOrder($order, $cartId);
        if ($result) {
            header("Location: $pathHome/php/pages/order.php");
        } else {
            echo "Error";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <?php

    if (!isset($_SESSION['user'])) {
        header("Location: $pathHome/index.php");
    }
    ?>
    <!-- /checkout-step1 -->
    <div class="flex  gap-8 px-[10vw] items-center justify-center">
        <!-- Check info -->
        <div class="w-2/3  py-[60px]">
            <h2 class="text-[28px]">ANKER Việt Nam</h2>
            <!-- path -->
            <div class="text-[12px] my-3">
                <a href="/cart.html" class="text-blue-600">Giỏ hàng</a> <i
                    class="fa-solid fa-angle-right"></i>
                <a
                    class="text-gray-500" href="checkouts-step2.html">Thanh toán</a>
            </div>
            <h3 class="t">Thông tin giao hàng</h3>
            <div class="flex items-center gap-4 my-3">
                <img class="w-[50px] h-[50px] rounded-[12px]"
                    src="data:image/png;base64,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"
                    alt="">
                <div class="">
                    <p class="text-[14px] text-gray-500">
                        <?php echo $_SESSION['user']['full_name'] ?>
                        (<?php echo $_SESSION['user']['email_address'] ?>)
                    </p>
                    <a href="#" class="text-blue-600">Đăng xuất</a>
                </div>
            </div>
            <form class="flex flex-col gap-3" method="post">

                <input class="border p-2 rounded-[8px] outline-blue-600" placeholder="Họ và tên" name="full_name"
                    type="text" value="<?php echo $_SESSION['user']['full_name'] ?>">
                <input class="border p-2 rounded-[8px] outline-blue-600" placeholder="Địa thoại" name="phone_number"
                    type="text" placeholder="Điện thoại" value="<?php echo $_SESSION['user']['phone_number'] ?>">
                <input class="border p-2 rounded-[8px] outline-blue-600" placeholder="Địa chỉ" name="user_address"
                    type="text" placeholder="Địa chỉ" value="<?php echo $_SESSION['user']['user_address'] ?>">
                <select class="border p-2 rounded-[8px] outline-blue-600" name="payment_method_id" id="" aria-placeholder="Thêm địa chỉ mới...">
                    <?php
                    foreach ($paymentMethods as $method) {
                        $id = $method->getId();
                        $name = $method->getName();
                        echo "<option value='$id'>$name</option>";
                    }
                    ?>
                </select>
                <textarea class="border p-2 rounded-[8px] outline-blue-600 h-[80px]" name="order_note" id="" cols="12" rows="10"
                    placeholder="Ghi chú"></textarea>
                <div
                    class="flex items-center justify-between mt-[20px] border-b pb-[40px]">
                    <a class="text-blue-600" href="
                    <?php echo $pathHome ?>/php/pages/cart.php
                    ">Giỏ hàng</a>
                    <button
                        type="submit" name="checkout" value="ok"
                        class="p-3 text-white font-semibold bg-blue-600 rounded-[8px]">Thanh
                        toán</button>


                </div>
                <?php foreach ($errs as $err) {
                    echo "<p class='text-red-500'>$err</p>";
                } ?>
            </form>
            <p class="text-center mt-4 text-[12px]">Powered by DoanHaiDuy</p>
        </div>

        <!-- check before checkout -->
        <div class="p-8  border-l bg-gray-100 w-1/3 rounded-[12px]">
            <!-- List product -->
            <div class="flex flex-col gap-4 border-b pb-4">
                <!-- product -->
                <?php
                foreach ($cartProduct as $product) {
                    $productDetails = $productService->getProductById($product->getProduct());
                    orderItem($product->getId(), $productDetails->getName(), $productDetails->getPrice(), $productDetails->getImage(), $product->getQuantity());
                }
                ?>



            </div>
            <div class="py-4 flex  gap-4 border-b">
                <input
                    class="flex-1 border px-2 py-3 rounded-[4px] outline-blue-600"
                    type="text" placeholder="Mã giảm giá">
                <button
                    class="px-3 py-1 bg-gray-400 text-white rounded-[4px]">Áp
                    dụng</button>
            </div>
            <div class="py-4 flex flex-col gap-4 border-b">
                <p class="flex items-center justify-between">Tạm tính
                    <span class="font-medium">
                        <?php echo $totalPrice ?>₫
                    </span>
                </p>
                <p class="flex items-center justify-between">Phí giao hàng
                    <span class="font-medium">-</span>
                </p>
            </div>

            <p class="flex items-center justify-between">Tổng tiền
                <span class="text-gray-500 text-[12px]">VND <strong
                        class="text-[24px] text-black"><?php echo $totalPrice ?>₫
                    </strong></span>
            </p>
        </div>
    </div>
</body>

</html>