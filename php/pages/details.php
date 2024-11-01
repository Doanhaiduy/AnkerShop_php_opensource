<?php
include_once('../utils/component.php');
include_once('../utils/CreateDb.php');
include_once('../controllers/Product.php');
include_once('../models/Product.php');

// create instance of CreateDb class
$database = new CreateDb("ankershop");

if (isset($_GET['details'])) {
    $product_id = $_GET['product_id'];
    $productService = new ProductController($database->conn);

    $product = $productService->getProductById($product_id);

    $product_name = $product->getName();
    $product_price = $product->getPrice();
    $product_image = $product->getImage();
    $product_description = $product->getDescription();
    $product_category = $product->getCategory($database->conn);
    $product_stock = $product->getStock();
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

    <form action="/cart.html" class="flex px-[10vw] py-6 gap-12">
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
                <?php echo $product_price; ?>₫
            </span> <br>
            <strong class="line-through my-2 block">Giá gốc:
                1,3000,000₫</strong> <br>
            <span class="border-b block mb-4">Kết thúc sau: <strong
                    class="text-red-500 text-[18px]">1 ngày
                    23:56:42</strong></span>
            <div class="">
                <strong>MÀU SẮC</strong>
                <div class="flex items-center gap-2">
                    <div class="flex items-center px-2  border">
                        <img src="
                        <?php echo $product_image; ?>
                        "
                            class="w-[40px] h-[40px]" alt="">
                        <span>ĐEN</span>
                    </div>
                    <div class="flex items-center px-2 border">
                        <img src="
                        <?php echo $product_image; ?>
                        "
                            class="w-[40px] h-[40px]" alt="">
                        <span>TRẮNG</span>
                    </div>
                </div>
            </div>
            <div class="my-4">
                <strong>BẢO HÀNH</strong>
                <div class="flex items-center gap-2">
                    <div class="flex items-center px-2 py-2  border">
                        <span>18 THÁNG</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-2 border-b pb-4">
                <strong>Số lượng: </strong>
                <input type="number" value="1"
                    class="w-[60px] border px-2 py-1">
                <button
                    class="cursor-pointer hover:bg-red-600 px-3 py-1 text-white bg-red-400 font-semibold inline-flex items-center justify-center text-[18px]">
                    + Mua ngay</button>
            </div>

            <div class="my-12 flex items-center justify-between">
                <p class="cursor-pointer"><i class="fa-solid fa-arrow-left"></i>
                    Sản phẩm trước</p>
                <p class="cursor-pointer">Sản phẩm tiếp theo <i
                        class="fa-solid fa-arrow-right"></i></p>
            </div>
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
            $result = $productService->getAllProducts();
            foreach ($result as $row) {
                component($row->getId(), $row->getName(), $row->getPrice(), $row->getImage());
            }

            ?>
        </div>
    </div>

    <!-- Info -->
    <div class="bg-primary px-[10vw] text-white flex gap-8 py-10">
        <div class="w-2/3 flex flex-col gap-y-4 border-r">
            <h3 class="font-bold">Sự tin tưởng của bạn là vinh dự của chúng tôi
            </h3>
            <p>Bắt đầu thành lập từ năm 2015 với tư cách là đại diện phân phối
                các sản phẩm của Anker tại Việt Nam. Và chúng tôi tự hào thông
                báo rằng tất cả các sản phẩm đều được đảm bảo là hàng chính
                hãng, đảm bảo chất lượng tốt nhất cùng với chính sách bảo hành
                và chăm sóc chu đáo.</p>
            <div>
                <strong>Showroom:</strong>
                <br>
                <p>- 180D Thái Thịnh, Thịnh Quang, Đống Đa, Hà Nội.</p>
                <p>- Giờ làm việc: 8:30 - 21:00 (Cả thứ 7 & CN)</p>
            </div>
            <div>
                <p><i class="fa-solid fa-phone"></i> Hotline: 0932 565 565 -
                    0243 996 9997</p>
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
    <?php include_once("../layout/footer.php"); ?>
</body>

</html>