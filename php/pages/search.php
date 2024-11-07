<?php
require '../controllers/Product.php';
require '../config/db.php';
require '../utils/component.php';

$productService = new ProductController($conn);
$products = $productService->getAllProducts();


if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
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


    <!-- Footer -->
    <div class="px-[10vw] py-6 text-center">
        <p>&copy; 2022 - Bản quyền của Công ty cổ phẩn Mocato Việt Nam - Trụ sở:
            248 Phú Viên, Bồ Đề, Long Biên, Hà Nội. GPĐKKD: 0109787586 do Sở Kế
            Hoạch và Đầu Tư Hà Nội cấp ngày 22/10/2021.</p>
    </div>
</body>

</html>