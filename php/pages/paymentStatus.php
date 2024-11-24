<?php
require '../config/module.php';

if (isset($_GET['status'])) {
    $status = $_GET['status'];

    if ($status === 'success') {
        if (isset($_GET['vnp_amount'])) {
            $vnp_Amount = $_GET['vnp_amount'];
            $vnp_Amount = number_format($vnp_Amount, 0, ',', '.');
        }
        if (isset($_GET['vnp_TxnRef'])) {
            $vnp_TxnRef = $_GET['vnp_TxnRef'];
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

    <!-- paymentSuccess -->


    <div
        class="mt-[120px] py-[120px] flex flex-col items-center justify-center gap-3">
        <?php if ($status === 'success') { ?><h2 class="font-semibold text-[30px]"> Đặt
                hàng thành công <i
                    class="fa-regular fa-circle-check text-green-400"></i> </h2>
            <p class="text-[20px]">Cảm ơn bạn đã mua hàng tại AnkerShop</p>
            <p class="text-[20px]">Đơn hàng của bạn đã được đặt thành công</p>
            <p class="text-[20px]">Kiểm tra Email để xem thông tin chi tiết</p>
            <?php if (isset($vnp_Amount)) { ?>
                <p class="text-[20px]">Số tiền: <?php echo $vnp_Amount; ?> VND</p>
            <?php } ?>
        <?php } else { ?><h2 class="font-semibold text-[30px]"> Đặt
                hàng thất bại <i
                    class="fa-regular fa-circle-times text-red-400"></i> </h2>
            <p class="text-[20px]">Có lỗi xảy ra trong quá trình đặt hàng</p>
            <a href="<?php echo  $pathHome . "/php/pages/checkout.php" ?>" class="text-blue-600">Thanh toán lại</a>
        <?php } ?>
        <a href="/" class="text-blue-600">Tiếp tục mua sắm</a>
    </div>
    <!-- Info -->

    <!-- Footer -->
    <?php include '../layout/footer.php'; ?>

</body>

</html>