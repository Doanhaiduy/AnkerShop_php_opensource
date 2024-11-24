<?php
require "../config/module.php";

$errs = [];

if (isset($_GET['product_id'])) {
    if (empty($_GET['product_id'])) {
        $err[] = "Không tìm thấy sản phẩm";
        header("Location: $pathHome/index.php");
        exit();
    } else {
        $product_id = mysqli_real_escape_string($conn, $_GET['product_id']);
    }
    $product = $productService->getProductById($product_id);
    if (!$product) {
        header("Location: $pathHome/index.php");
        exit();
    }
    $product_name = $product->getName();
    $product_price = $product->getPrice();
    $product_image = $product->getImage();
    $product_description = $product->getDescription();
    $product_category = $product->getCategory($conn);
    $product_stock = $product->getStock();
    $productSameCategory = $productService->getProductsByCategory($product->getCategoryId());
} else {
    header("Location: $pathHome/index.php");
    exit();
}

if (isset($_POST['quantity'])) {

    if (empty($_SESSION['user'])) {
        header("Location: $pathHome/php/pages/login.php");
    }

    if (empty($_POST['product_id'])) {
        $errs[] = "Không tìm thấy sản phẩm";
    }

    if (empty($_POST['quantity'])) {
        $errs[] = "Số lượng không được để trống";
    } else if (!is_numeric($_POST['quantity'])) {
        $errs[] = "Số lượng phải là số";
    } else if ($_POST['quantity'] > $product_stock) {
        $errs[] = "Số lượng sản phẩm không đủ";
    }


    if (empty($errs)) {
        $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        $cartId = mysqli_real_escape_string($conn, $_SESSION['user']['cart_id']);

        $result = $cartService->addProductToCart($cartId, $product_id, $quantity);

        if ($result) {
            header("Location: $pathHome/php/pages/cart.php");
        } else {
            $errs[] = "Thêm sản phẩm vào giỏ hàng thất bại";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANKER - Thương Hiệu Số 1 Tại Mỹ – ANKER Việt Nam</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ✅ Load slick theme CSS ✅ -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
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
    <?php include_once("../layout/header.php"); ?>

    <!-- Test dev -->

    <!-- /product/:id -->
    <!-- Path -->
    <div class="py-12 bg-slate-300 text-center mt-[116px]">
        <a class="text-slate-500 mx-2" href="/">Trang chủ</a> / <a
            class="text-slate-500 mx-2" href="#">
            <?php echo $product_category; ?>
        </a> / <span
            class="mx-2">
            <?php echo $product_name; ?>
        </span>
    </div>
    <!-- Detail -->

    <form class="flex px-[10vw] py-6 gap-12" method="post">
        <div class="">
            <img class="w-full object-cover"
                src="
                <?php echo $product_image; ?>
                " alt="">
        </div>
        <div class="">
            <h3 class="text-[18px] font-bold my-3">
                <?php echo $product_name; ?>
            </h3>
            <span class="text-[32px] text-red-500 my-2">
                <?php echo $priceFormatted = number_format($product_price, 0, ',', '.') . ' ₫';; ?>
            </span> <br>
            <strong class="line-through my-2 block"></strong> <br>
            <span class="border-b block mb-4">Kết thúc sau: <strong
                    class="text-red-500 text-[18px]">1 ngày
                    23:56:42</strong></span>

            <div class="my-4">
                <strong>BẢO HÀNH</strong>
                <div class="flex items-center gap-2">
                    <div class="flex items-center px-2 py-2  border">
                        <span>18 THÁNG</span>
                    </div>
                </div>
            </div>
            <div class="my-4">
                <strong>Còn lại: </strong>
                <div class="flex items-center gap-2">
                    <div class="flex items-center px-2 py-2  border">
                        <span><?php echo $product_stock ?> sản phẩm</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-2 border-b pb-4">
                <strong>Số lượng: </strong>
                <input type="number" value="1" min="1" name="quantity"
                    class="w-[60px] border px-2 py-1">
                <input type="hidden"
                    name="product_id" value="<?php echo $product_id; ?>">
                <button type="submit"
                    class="cursor-pointer hover:bg-red-600 px-3 py-1 text-white bg-red-400 font-semibold inline-flex items-center justify-center text-[18px]">
                    + Mua ngay</button>
            </div>

            <div class="my-12 flex items-center justify-between">
                <p class="cursor-pointer"><i class="fa-solid fa-arrow-left"></i>
                    Sản phẩm trước</p>
                <p class="cursor-pointer">Sản phẩm tiếp theo <i
                        class="fa-solid fa-arrow-right"></i></p>
            </div>
            <?php foreach ($errs as $err) : ?>
                <div class="text-red-500"><?php echo $err; ?></div>
            <?php endforeach; ?>
        </div>
        <div class="">
            <div class="mt-3 p-2 bg-gray-100">
                <h3 class="font-bold text-orange-400 text-[18px]">SẼ CÓ TẠI NHÀ
                    BẠN</h3>
                <span class="text-[12px]">Từ 1 - 3 ngày làm việc</span>
            </div>
            <div class="flex flex-col gap-5 mt-3">
                <div class="flex items-center gap-4 border-b pb-2">
                    <i class="fa-solid text-[22px] fa-truck-fast"></i>
                    <div class="">
                        <h4 class="font-semibold text-[14px]">GIAO HÀNG TOÀN
                            QUỐC</h4>
                        <span class="text-[12px]">Miễn phí đơn hàng từ trên
                            1tr</span>
                    </div>
                </div>
                <div class="flex items-center gap-4 border-b pb-2">
                    <i class="fa-solid text-[22px] fa-layer-group"></i>
                    <div class="">
                        <h4 class="font-semibold text-[14px]">BẢO HÀNH CHÍNH
                            HÃNG</h4>
                    </div>
                </div>
                <div class="flex items-center gap-4 border-b pb-2">
                    <i class="fa-solid text-[22px] fa-hand-holding-dollar"></i>
                    <div class="">
                        <h4 class="font-semibold text-[14px]">THANH TOÁN</h4>
                        <span class="text-[12px]">Thanh toán khi nhận
                            hàng</span>

                    </div>
                </div>
                <div class="flex items-center gap-4 border-b pb-2">
                    <i class="fa-solid text-[22px] fa-phone-volume"></i>
                    <div class="flex flex-col">
                        <h4 class="font-semibold text-[14px] ">GỌI NGAY HOTLINE
                        </h4>
                        <strong class="text-red-500 text-[22px]">03 9999
                            8943</strong>
                        <span class="text-[12px]">8:00 - 21:00 hàng ngày</span>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Description -->
    <div class="flex items-center px-[10vw] gap-3">
        <div class="w-4/5 border border-t-[6px] border-t-red-500">
            <div class="border-b">
                <ul class="flex gap-8 px-4 py-1 font-medium text-[12px]">
                    <li class="cursor-pointer">Mô tả sản phẩm</li>
                    <li class="cursor-pointer text-gray-400">Chính sách vận
                        chuyển</li>
                    <li class="cursor-pointer text-gray-400">Bình luận</li>
                </ul>
            </div>
            <div class="p-4 ">
                <h2 class="text-[24px] font-bold my-2">Sạc mọi thứ ở tốc độ cao
                    với GAN II</h2>
                <p class="border-b pb-3">Bộ sạc treo tường có thể gập lại nhanh
                    gọn 3 cổng PPS cho MacBook Pro / Air, iPad Pro, Galaxy S20 /
                    S10, Dell XPS 13, Note 20/10 +, iPhone 13 / Pro , Pixel và
                    hơn thế nữa.</p>
            </div>
            <div class="py-4 mx-4  flex gap-4 border-b">
                <img class="object-cover w-1/2"
                    src="./assets/imgs/detail/des_1.webp" alt="">
                <div class="flex-1">
                    <h2 class="text-[24px] font-bold mb-4">Bộ sạc duy nhất bạn
                        cần </h2>
                    <p>Nói lời tạm biệt với bộ sạc cũ của bạn. Bộ sạc Anker 735
                        (Nano II 65W) có đủ năng lượng bạn cần để sạc nhanh điện
                        thoại, máy tính bảng và máy tính xách tay (USB-C) của
                        mình từ một bộ sạc duy nhất.</p>
                </div>
            </div>

            <div class="py-4 mx-4 flex gap-4 border-b flex-row-reverse ">
                <img class="object-cover w-1/2"
                    src="./assets/imgs/detail/des_2.webp" alt="">
                <div class="flex-1">
                    <h2 class="text-[24px] font-bold mb-4">Sạc tốc độ cao </h2>
                    <p>Kết nối một thiết bị duy nhất để có mức sạc tối đa 65W —
                        đủ để cung cấp năng lượng cho MacBook Pro 13 ″ 2020 ở
                        tốc độ tối đa. Và khi bạn kết nối ba thiết bị, điện năng
                        sẽ được phân phối hiệu quả giữa các cổng để đảm bảo bạn
                        nhận được mức sạc tốt nhất.</p>
                </div>
            </div>

            <div class="py-4 mx-4  flex gap-4 border-b">
                <img class="object-cover w-1/2"
                    src="./assets/imgs/detail/des_3.webp" alt="">
                <div class="flex-1">
                    <h2 class="text-[24px] font-bold mb-4">Thiết kế nhỏ gọn</h2>
                    <p>Cấp nguồn cho 3 thiết bị bằng bộ sạc có kích thước gần
                        bằng hộp đựng AirPods Pro.</p>
                </div>
            </div>
            <div class="py-4 mx-4  flex gap-4 border-b flex-row-reverse">
                <img class="object-cover w-1/2"
                    src="./assets/imgs/detail/des_4.webp" alt="">
                <div class="flex-1">
                    <h2 class="text-[24px] font-bold mb-4 text-left">
                        Thiết kế
                        nhỏ gọn</h2>
                    <p>Cấp nguồn cho 3 thiết bị bằng bộ sạc có kích thước gần
                        bằng hộp đựng AirPods Pro.</p>
                </div>
            </div>

            <!-- Info product -->
            <div class="py-4 mx-4 border-b">
                <h2 class="text-[24px] font-bold mb-4">Thông tin sản phẩm: </h2>
                <ul class="list-disc ml-8 flex flex-col gap-2">
                    <li>Kích thước: 38.26 mm × 29.12 mm × 66.10 mm</li>
                    <li>Trọng lượng: 105g</li>
                    <li>Input: 100-240V~ 1.8A 50-60Hz </li>
                    <li>Single Port Output: USB-C 1 (65W Max) / USB-C 2 (65W
                        Max) / USB-A (22.5W Max) </li>
                    <li>Dual Port Output USB-C 1 + USB-C 2 (45W Max + 20W Max) /
                        USB-C 1 + USB-A (40W Max + 22.5W) / USB-C 2 + USB-A (12W
                        Max + 12W Max) </li>
                    <li>Triple Port Output USB-C 1 (40W Max), USB-C 2 (12W Max),
                        USB-A (12W Max)</li>
                </ul>

                <h2 class="text-[24px] font-bold my-4">Khả năng tương thích:
                </h2>
                <ul class=" ml-4 flex flex-col gap-2">
                    <li>1. Notebook và Máy tính bảng: <br> MacBook Air 2020,
                        MacBook Pro 13'', Dell XPS 13 9360/9380, ThinkPad E490,
                        HP Spectre Folio, ThinkPad X390, Google Pixelbook,
                        Microsoft Surface Book 2,và iPad 2018 hoặc cho đời mới
                        hơn. </li>
                    <li>2. Điện thoại, máy chơi game, đồng hồ..:
                        <ul class="list-disc ml-8 flex flex-col gap-2">
                            <li>iPhone 12 / Pro / mini / Pro Max / SE 2020 / 11
                                / 11 Pro / 11 Pro Max / XS / XS Max / XR / X / 8
                                Plus / 8 / 7 Plus / 7 / 6 Plus, iPad mini 5 / 4,
                                iPad Pro </li>
                            <li>Galaxy S21 / S21+ / S21 Ultra / Galaxy S10 /
                                S10+ / S10e / S9 / S9+ / S8 / S8+, Note 20 / 20
                                Ultra / 10 / 9 / 8, Pixel 3a / 3XL / 3 / 2 XL /
                                2, và các dòng điện thoại khác. </li>
                            <li>Google Pixel 3 và dòng điện thoại về sau, Sony
                                XZ3, Sony Xperia 1, Nintendo Switch, Apple
                                Watch, AirPods, hay sạc Anker không dây dùng cáp
                                USB-C. </li>
                        </ul>
                    </li>
                </ul>
                <p class="mt-4"><strong class="text-[28px]">LƯU Ý: </strong>Sử
                    dụng cáp USB-C to Lightning để sạc cho các thiết bị của
                    Apple và cáp C to C để sạc cho các thiết bị dùng cổng sạc
                    USB-C.</p>
            </div>
        </div>
        <div class=""></div>
    </div>

    <!-- Same -->
    <div class="py-6 pb-12 px-[10vw]">
        <h2 class="p-4 text-[28px] font-bold text-center">Có thể bạn quan tâm
        </h2>
        <div class="slide-product slide-product-1">

            <?php
            foreach ($productSameCategory as $row) {
                productItem($row->getId(), $row->getName(), $row->getPrice(), $row->getImage());
            }

            ?>
        </div>
    </div>


    <!-- Footer -->
    <?php include_once("../layout/footer.php"); ?>
</body>

</html>