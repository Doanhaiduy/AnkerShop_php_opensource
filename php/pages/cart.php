<?php
require '../config/db.php';
require '../utils/component.php';
require '../controllers/Cart.php';
require '../controllers/Product.php';
require '../controllers/Auth.php';

$pathHome = explode('/php', $_SERVER['PHP_SELF'])[0];

$cart = new CartController($conn);
$userId = $_SESSION['user']['id'];
$cartId = $_SESSION['user']['cart_id'];


$cartProduct = $cart->getCartProducts($userId);
$productController = new ProductController($conn);

if (isset($_POST['delete_item'])) {
    $productCartId = $_POST['product_cart_id'];
    if ($productCartId) {
        $result = $cart->removeProductFromCart($productCartId);
        if ($result) {
            header("Location: $pathHome/php/pages/cart.php");
        };
    };
}

if (isset($_POST['update_quantity'])) {
    $productCartId = $_POST['product_cart_id'];
    $quantity = $_POST['quantity'];
    if ($productCartId && $quantity) {
        $result = $cart->updateProductQuantity($productCartId, $quantity);
        if ($result) {
            header("Location: $pathHome/php/pages/cart.php");
        };
    };
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANKER - Thương Hiệu Số 1 Tại Mỹ – ANKER Việt Nam</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#00a4e0',
                    }
                }
            }
        }
    </script>
</head>

<body>
    <!-- Layout -->
    <!-- Header -->
    <?php
    include_once '../layout/header.php';
    if (!isset($_SESSION['user'])) {
        header("Location: $pathHome/index.php");
    }
    ?>
    <!-- Test dev -->
    <div
        class="fixed bottom-0 z-[200] bg-primary w-full px-6 text-white text-[24px]">
        <ul class="flex gap-3 justify-between">
            <li><a class="font-semibold" href="/">Home</a></li>
            <li><a class="font-semibold" href="/detail.html">Detail</a></li>
            <li><a class="font-semibold" href="/cart.html">Cart</a></li>
            <li><a class="font-semibold" href="/account.html">Account</a></li>
            <li><a class="font-semibold" href="/collections.html">Collections</a></li>
            <li><a class="font-semibold" href="/search.html">Search</a></li>
            <li><a class="font-semibold" href="/login.html">Login</a></li>
            <li><a class="font-semibold" href="/register.html">Register</a></li>
        </ul>
    </div>
    <!-- /cart-->
    <!-- Path -->
    <div class="py-12 bg-slate-300 text-center mt-[116px]">
        <a class="text-slate-500 mx-2" href="/">Trang chủ</a> / <span
            class="mx-2">Giỏ hàng của bạn - ANKER Việt Nam</span>
    </div>
    <!-- Cart -->
    <div class="px-[10vw] pb-[120px] pt-[20px] ">
        <h2 class="font-bold text-[24px] pb-4">Giỏ hàng</h2>
        <table class="table w-full">
            <!-- head -->
            <thead class="border-y">
                <tr>
                    <th class="w-[70%] py-3">Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($cartProduct as $product) {
                    $productDetails = $productController->getProductById($product->getProduct());
                    cartItem($product->getId(), $productDetails->getName(), $productDetails->getPrice(), $productDetails->getImage(), $product->getQuantity());
                } ?>

            </tbody>
        </table>
        <form action="/checkouts-step1.html"
            class="mt-5 flex items-center justify-between">
            <div class="">
                <h4 class="font-semibold mb-2">Ghi chú đơn hàng</h4>
                <textarea name="" id="" cols="100" rows="4"
                    class="bg-gray-100 outline-none p-2"></textarea>
            </div>
            <div class="text-right">
                <p class="">Tổng <strong class="text-[24px]"><?php echo $cart->getTotalPrice($cartId) ?>₫</strong></p>
                <p class="my-2 italic text-[14px]">Giao hàng & tính thuế khi bán hàng
                </p>
                <div class="text-[14px]">
                    <button class="px-2 py-1 bg-black text-white font-semibold">Cập nhật
                        giỏ hàng</button>
                    <button class="px-2 py-1 bg-red-400 text-white font-semibold">Thanh
                        toán</button>
                </div>
            </div>
        </form>
    </div>


    <!-- Info -->
    <div class="bg-primary px-[10vw] text-white flex gap-8 py-10">
        <div class="w-2/3 flex flex-col gap-y-4 border-r">
            <h3 class="font-bold">Sự tin tưởng của bạn là vinh dự của chúng tôi</h3>
            <p>Bắt đầu thành lập từ năm 2015 với tư cách là đại diện phân phối các sản
                phẩm của Anker tại Việt Nam. Và chúng tôi tự hào thông báo rằng tất cả
                các sản phẩm đều được đảm bảo là hàng chính hãng, đảm bảo chất lượng tốt
                nhất cùng với chính sách bảo hành và chăm sóc chu đáo.</p>
            <div>
                <strong>Showroom:</strong>
                <br>
                <p>- 180D Thái Thịnh, Thịnh Quang, Đống Đa, Hà Nội.</p>
                <p>- Giờ làm việc: 8:30 - 21:00 (Cả thứ 7 & CN)</p>
            </div>
            <div>
                <p><i class="fa-solid fa-phone"></i> Hotline: 0932 565 565 - 0243 996
                    9997</p>
                <p>Liên Hệ Bảo Hành & Hỗ Trợ Kỹ Thuật:</p>
                <p>- 0243 2247823 (Phím 0)</p>
                <p>- 0961 856 866</p>
            </div>
            <p>Liên hệ hợp tác: lienhe@mocato.vn</p>
        </div>
        <div class="flex flex-col gap-y-4  border-r pr-4">
            <h3 class="font-bold">Thông tin</h3>
            <ul class="flex flex-col gap-y-2">
                <li>Giới thiệu</li>
                <li>Đăng ký đại lý Anker</li>
                <li>Khách hàng dự án</li>
                <li>Tuyển dụng</li>
            </ul>
        </div>

        <div class="flex flex-col gap-y-4  ">
            <h3 class="font-bold">Chính sách</h3>
            <ul class="flex flex-col gap-y-2">
                <li>Chính Sách Bảo Mật</li>
                <li>Điều Khoản Sử Dụng</li>
                <li>Qui Định Bảo Hành</li>
                <li>Chính Sách Đổi Trả</li>
                <li>Phương Thức Thanh Toán</li>
            </ul>
        </div>
    </div>
    <!-- Footer -->
    <?php include_once '../layout/footer.php'; ?>
    <script>
        const formUpdateQuantity = document.querySelectorAll('.update-quantity');

        // auto submit form when change quantity
        formUpdateQuantity.forEach(form => {
            const inputQuantity = form.querySelector('input[name="quantity"]');
            inputQuantity.addEventListener('change', () => {
                if (inputQuantity.value < 1) {
                    inputQuantity.value = 1;
                }
                form.submit();
            })
        })
    </script>
</body>

</html>