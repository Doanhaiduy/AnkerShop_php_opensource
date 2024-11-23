<?php
$pathHome = explode('/php', $_SERVER['PHP_SELF'])[0];

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
    if (isset($_SESSION['user'])) {
        header("Location: $pathHome/index.php");
    }
    ?>

    <!-- Test dev -->

    <!-- paymentSuccess -->

    <main
        class="py-12 flex-grow flex flex-col items-center justify-center mt-32 text-center px-6 mt-[116px] min-h-[70vh]">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Vui lòng kiểm tra
            email của bạn</h1>
        <p class="text-gray-600 mb-6">Chúng tôi đã gửi một email xác minh tới
            địa chỉ bạn đã đăng ký. Hãy kiểm tra email và nhấp vào liên kết xác
            minh để kích hoạt tài khoản của bạn.</p>
        <i class="fa-solid fa-envelope text-primary text-5xl mb-6"></i>
        <a href="/" class="text-primary underline hover:text-primary-dark">Quay
            lại trang chủ</a>
    </main>

    <!-- Footer -->
    <?php include '../layout/footer.php'; ?>

</body>

</html>