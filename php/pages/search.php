<?php
require '../controllers/Product.php';
require '../config/db.php';
require '../utils/component.php';

$productService = new ProductController($conn);
$products = $productService->getAllProducts();


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $products = $productService->getProductsBySearch($search);
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

    <?php include '../layout/header.php'; ?>

    <!-- /search -->
    <!-- Path -->
    <div class="py-12 bg-slate-300 text-center mt-[116px]">
        <a class="text-slate-500 mx-2" href="/">Trang chủ</a> / <span
            class="mx-2">Kết quả tìm kiếm
            <?php echo isset($search) ? 'cho từ khóa "' . $search . '"' : ''; ?>
            - ANKER Việt Nam</span>
    </div>

    <div class="px-[20vw] my-12">
        <h2 class="text-center font-bold text-[24px]">
            <?php
            if (isset($search) && $search != '') {
                echo count($products) . " kết quả tìm kiếm cho từ khóa \"" . $search . "\"";
            } else {
                echo "Tất cả sản phẩm";
            }
            ?>
        </h2>
        <form class="my-6 flex items-center justify-center" method="get">
            <input type="text"
                class="p-2 bg-gray-100 w-full h-[40px] outline-none border" name="search"
                value="<?php echo isset($search) ? $search : ''; ?>" />
            <button class="bg-red-500 font-semibold text-white h-[40px] px-5" type="submit"><i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="grid grid-cols-4 mt-3 gap-2">
            <?php
            foreach ($products as $product) {
                productItem($product->getId(), $product->getName(), $product->getPrice(), $product->getImage());
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
    <div class="px-[10vw] py-6 text-center">
        <p>&copy; 2022 - Bản quyền của Công ty cổ phẩn Mocato Việt Nam - Trụ sở:
            248 Phú Viên, Bồ Đề, Long Biên, Hà Nội. GPĐKKD: 0109787586 do Sở Kế
            Hoạch và Đầu Tư Hà Nội cấp ngày 22/10/2021.</p>
    </div>
</body>

</html>