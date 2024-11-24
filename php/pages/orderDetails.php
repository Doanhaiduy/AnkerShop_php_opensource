<?php

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

    <!-- /account/login -->
    <!-- Path -->
    <div class="py-12 bg-slate-300 text-center mt-[116px]">
        <a class="text-slate-500 mx-2" href="/">Trang chủ</a> / <span
            class="mx-2 text-slate-500">Đơn mua</span> /
        <span>#DH053</span>
    </div>
    <!-- Ordered -->
    <div class="bg-white p-8 rounded-md w-full">
        <div class="flex items-center justify-between pb-6">
            <div>
                <h2 class="text-gray-600 font-semibold text-[30px]">
                    Chi tiết đơn mua #12345
                </h2>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4 p-4 border rounded-lg">
            <div>
                <p class="text-[18px] font-semibold">Mã đơn mua</p>
                <span>#12345</span>
            </div>
            <div>
                <p class="text-[18px] font-semibold">Ngày tạo đơn</p>
                <span>01/01/2023</span>
            </div>
            <div>
                <p class="text-[18px] font-semibold">Phương thức vận chuyển</p>
                <span>Giao hàng nhanh</span>
            </div>
            <div>
                <p class="text-[18px] font-semibold">Trạng thái</p>
                <span>Đang xử lý</span>
            </div>
        </div>
        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Ảnh
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Tên sản phẩm
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Giá
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Số lượng
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Tổng
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-[18px]">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-[120px] h-[150px]">
                                            <img class="w-full h-full object-cover" src="path/to/image.jpg" alt="" />
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-[18px]">
                                    <p class="text-gray-900 whitespace-no-wrap">Sản phẩm A</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-[18px]">
                                    <p class="text-gray-900 whitespace-no-wrap">200,000đ</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-[18px]">
                                    <p class="text-gray-900 whitespace-no-wrap">2</p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-[18px]">
                                    <p class="text-gray-900 whitespace-no-wrap">400,000đ</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex justify-center flex-col md:flex-row flex-col items-stretch w-full space-y-4 md:space-y-0 md:space-x-6 xl:space-x-8">
            <div class="flex flex-col px-4 py-6 md:p-6 xl:p-8 w-full space-y-6"></div>
            <div class="flex flex-col justify-center px-4 py-6 md:p-6 xl:p-8 w-full bg-gray-100 space-y-6 rounded-lg">
                <h3 class="text-xl font-semibold leading-5 text-gray-800">Hóa đơn</h3>
                <div class="flex justify-center items-center w-full space-y-4 flex-col border-gray-200 border-b pb-4">
                    <div class="flex justify-between w-full">
                        <p class="text-base leading-4 text-gray-800">Tổng tạm tính</p>
                        <p class="text-base leading-4 text-gray-600">380,000đ</p>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p class="text-base leading-4 text-gray-800">Giảm giá</p>
                        <p class="text-base leading-4 text-gray-600">0đ (0%)</p>
                    </div>
                    <div class="flex justify-between items-center w-full">
                        <p class="text-base leading-4 text-gray-800">Phí vận chuyển</p>
                        <p class="text-base leading-4 text-gray-600">20,000đ</p>
                    </div>
                </div>
                <div class="flex justify-between items-center w-full">
                    <p class="text-base font-semibold leading-4 text-gray-800">Tổng</p>
                    <p class="text-base font-semibold leading-4 text-gray-600">400,000đ</p>
                </div>
            </div>
        </div>
    </div>



    </div>

    <!-- Info -->
    <?php include_once '../layout/footer.php'; ?>

</body>

</html>