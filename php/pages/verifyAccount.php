<?php
require '../config/module.php';

$err = "";

if (isset($_GET['token']) && !empty($_GET['token']) && isset($_GET['email']) && !empty($_GET['email'])) {
    $checkVerify = $authService->checkVerify($_GET['email']);

    if ($checkVerify) {
        $err = "Email đã được xác minh";
    } else if (verifyToken($_GET['email'], $_GET['token'])) {
        $email = $_GET['email'];
        $result = $authService->verifyEmail($email);

        if ($result) {
        } else {
            $err = "Xác minh email không thành công. Vui lòng thử lại.";
        }
    } else {
        $err = "Xác minh email không thành công. Vui lòng thử lại.";
    }
} else {
    header("Location: $pathHome/index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_GET['email']) && !empty($_GET['email'])) {
        $email = $_GET['email'];

        $token = generateToken($_GET['email']);
        // Thay đổi đường dẫn verify theo domain hoặc port đang chạy: ví dụ localhost:8080/ankershop/php/pages/verifyAccount.php
        // Thay đổi domain thành domain thật khi chạy trên production: ví dụ domain.com/ankershop/php/pages/verifyAccount.php
        $urlVerify = 'http://localhost:8080/ankershop/php/pages/verifyAccount.php?token=' . $token . '&email=' . $email;

        if ($authService->checkEmailAlreadyExists($email)) {
            $result = sendMailVerify($email, $email, $urlVerify);
            if ($result) {
                header("Location: $pathHome/php/pages/confirmEmail.php");
                exit();
            } else {
                $err = "Gửi email xác minh không thành công. Vui lòng thử lại.";
            }
        } else {
            $err = "Email không hợp lệ";
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
    if (isset($_SESSION['user'])) {
        header("Location: $pathHome/index.php");
    }
    ?>

    <!-- Test dev -->

    <!-- Verify Email success -->
    <main
        class="py-12 flex-grow flex flex-col items-center justify-center mt-32 text-center px-6 mt-[116px] min-h-[70vh]">
        <?php if ($err) : ?>
            <h1 class="text-2xl font-semibold text-red-500 mb-4"><?php echo $err; ?></h1>
            <form method="post">
                <button type="submit" class="btn btn-primary">Gửi lại email xác minh</button>
            </form>
        <?php else : ?>
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Xác minh email <?php echo $_GET['email']; ?> thành công</h1>
            <p class="text-gray-600 mb-6">Tài khoản của bạn đã được kích hoạt. Bạn có thể đăng nhập và sử dụng dịch vụ của chúng tôi.</p>
            <i class="fa-solid fa-envelope-open-text text-primary text-5xl mb-6"></i>
            <a href="<?php echo $pathHome; ?>/php/pages/login.php" class="text-primary underline hover:text-primary-dark">Quay lại trang đăng nhập</a>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <?php include '../layout/footer.php'; ?>

</body>

</html>