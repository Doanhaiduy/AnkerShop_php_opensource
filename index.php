<?php

require 'php/config/db.php';
require 'php/controllers/Product.php';
require 'php/models/Product.php';
require 'php/utils/component.php';


// create instance of CreateDb class
$productService = new ProductController($conn);
$products = $productService->getAllProducts();

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
    <?php include_once("php/layout/header.php"); ?>

    <!-- Test dev -->

    <!-- /index -->

    <!-- Slide Show -->
    <div
        class="mt-[115px] relative flex items-center justify-center group overflow-x-hidden">
        <div class="banner">
            <img src="./assets/imgs/index/image_slider1.webp"
                class="h-full object-cover" alt="">
        </div>
        <div
            class="absolute  items-center justify-between mx-6 w-[110vw] text-white translate-y-[-50%] top-[50%] transition-all flex group-hover:w-[90vw]">
            <div class=" bg-primary cursor-pointer px-3 py-2">
                <i class=" fa-solid fa-angle-left"></i>
            </div>
            <div class=" bg-primary cursor-pointer px-3 py-2">
                <i class="fa-solid fa-angle-right"></i>
            </div>
        </div>
    </div>

    <!-- Slide Product 1-->
    <div class=" overflow-x-hidden">
        <h2 class="p-4 text-[28px] font-bold text-center">Chương trình SALE GIỚI
            HẠN!!!</h2>
        <div class="slide-product-1">
            <!-- Product -->
            <?php
            foreach ($products as $product) {
                component($product->getId(), $product->getName(), $product->getPrice(), $product->getImage());
            }
            ?>
        </div>
    </div>

    <!-- Slide Product 2-->
    <div class="py-2 overflow-x-hidden hidden">
        <h2 class="text-[28px] font-bold text-center my-5">Sản Phẩm MỚI VỀ</h2>
        <div class="slide-product-2">
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_2.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_2.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span class="line-through">1,300,000₫</span>
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_2.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span class="line-through">1,300,000₫</span>
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_2.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span class="line-through">1,300,000₫</span>
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_2.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span class="line-through">1,300,000₫</span>
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_2.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span class="line-through">1,300,000₫</span>
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_1.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span class="line-through">1,300,000₫</span>
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_2.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span class="line-through">1,300,000₫</span>
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_1.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span class="line-through">1,300,000₫</span>
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>
            <!-- Product -->
            <div
                class=" bg-white mx-2 border border-gray-200 rounded-lg shadow ">
                <a href="./detail.html" class="relative group">
                    <img class="p-4 rounded-t-lg"
                        src="./assets/imgs/index/Product/pro_2.webp"
                        alt="product image" />
                    <span
                        class="absolute top-[10px] left-[10px] px-4 text-[12px] py-1 bg-red-400 rounded-[3px] font-bold text-white">-40%</span>
                    <span
                        class="absolute top-[50%] translate-y-[-50%] left-[50%] translate-x-[-50%] px-4 py-1 text-center bg-red-400 text-[16px] font-bold text-white hidden group-hover:block">MUA
                        NHANH</span>
                </a>
                <div class="px-5 pb-5">
                    <a href="#">
                        <h5 class=" tracking-tight text-gray-900 text-center">
                            Sạc 3 Cổng Anker 735 Nano II 65W - A2667 (Series 7)
                        </h5>
                    </a>
                    <p
                        class="flex items-center mt-2.5 gap-1 justify-center font-medium">
                        <span class="line-through">1,300,000₫</span>
                        <span>780,000₫</span>

                    </p>
                </div>
                <p class="text-center px-3">Kết thúc sau: <strong
                        class="text-red-600">2 ngày 4 : 30 : 34</strong></p>
            </div>


        </div>
    </div>

    <!-- Youtube info-->
    <div class="px-[10vw] py-5">
        <h2 class="p-4 py-6 text-[28px] font-bold text-center">Tìm Hiểu ANKER
            trên Youtube</h2>
        <div class="grid grid-cols-3 gap-6">
            <div
                class="rounded-[25px] overflow-hidden cursor-pointer hover:shadow-2xl">
                <div class="">
                    <img src="./assets/imgs/index/home_youtube_1.webp" alt="">
                </div>
                <p class="pb-6 pt-2 bg-slate-100 px-2 text-[18px] text-center">
                    Đánh giá Sạc 4 Cổng Anker 747 GaNPrime 150W - A2340</p>
            </div>
            <div
                class="rounded-[25px] overflow-hidden cursor-pointer hover:shadow-2xl">
                <div class="">
                    <img src="./assets/imgs/index/home_youtube_2.webp" alt="">
                </div>
                <p class="pb-6 pt-2 bg-slate-100 px-2 text-[18px] text-center">
                    Đánh giá Sạc 4 Cổng Anker 747 GaNPrime 150W - A2340</p>
            </div>
            <div
                class="rounded-[25px] overflow-hidden cursor-pointer hover:shadow-2xl">
                <div class="">
                    <img src="./assets/imgs/index/home_youtube_3.webp" alt="">
                </div>
                <p class="pb-6 pt-2 bg-slate-100 px-2 text-[18px] text-center">
                    Đánh giá Sạc 4 Cổng Anker 747 GaNPrime 150W - A2340</p>
            </div>
        </div>

        <div class="text-center">
            <p
                class="cursor-pointer px-3 py-1 text-white bg-red-700 font-bold inline-flex items-center justify-center mx-auto mt-5 text-[18px] rounded-[4px]">
                Xem thêm</p>
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
    <?php include_once("php/layout/footer.php"); ?>
</body>

</html>