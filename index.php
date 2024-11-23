<?php

require 'php/config/db.php';
require 'php/controllers/Product.php';
require 'php/utils/component.php';

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
                productItem($product->getId(), $product->getName(), $product->getPrice(), $product->getImage());
            }
            ?>
        </div>
    </div>

    <!-- Slide Product 2-->


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

    <!-- Footer -->
    <?php include_once("php/layout/footer.php"); ?>
</body>

</html>