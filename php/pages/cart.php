<?php
require '../config/module.php';

$cartProduct = $cartService->getCartProducts($cartId);

if (isset($_POST['delete_item'])) {
    $productCartId = $_POST['product_cart_id'];
    if ($productCartId) {
        $result = $cartService->removeProductFromCart($productCartId);
        if ($result) {
            header("Location: $pathHome/php/pages/cart.php");
        };
    };
}

if (isset($_POST['update_quantity'])) {
    $productCartId = $_POST['product_cart_id'];
    $currentStock = $_POST['current_stock'];
    $quantity = $_POST['quantity'];

    if ($quantity < 1 || !is_numeric($quantity)) {
        $quantity = 1;
    }

    if ($quantity > $currentStock) {
        $quantity = $currentStock;
    }


    if ($productCartId && $quantity) {
        $result = $cartService->updateProductQuantity($productCartId, $quantity);
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
                    $productDetails = $productService->getProductById($product->getProduct());
                    cartItem($product->getId(), $productDetails->getName(), $productDetails->getPrice(), $productDetails->getImage(), $product->getQuantity(), $productDetails->getStock());
                }
                if (count($cartProduct) == 0) {
                    echo "<tr><td colspan='4' class='text-center'>Không có sản phẩm nào trong giỏ hàng</td></tr>";
                    echo "<tr><td colspan='4' class='text-center'><a href='$pathHome/index.php' class='text-primary'>Tiếp tục mua sắm</a></td></tr>";
                }
                ?>

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
                <p class="">Tổng <strong class="text-[24px]"><?php echo
                                                                number_format($cartService->getTotalPrice($cartId), 0, ',', '.') . ' ₫';
                                                                ?></strong></p>
                <p class="my-2 italic text-[14px]">Giao hàng & tính thuế khi bán hàng
                </p>
                <div class="text-[14px]">
                    <a href="
                    <?php if (count($cartProduct) > 0) {
                        echo $pathHome . "/php/pages/checkout.php";
                    } else {
                        echo "#";
                    }
                    ?>" class="px-2 py-1 bg-red-400 text-white font-semibold cursor-pointer">Thanh
                        toán</a>
                </div>
            </div>
        </form>
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