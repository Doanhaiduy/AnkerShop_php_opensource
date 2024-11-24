<?php
include_once '../config/module.php';

$errs = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'])) {
        $errs['email'] = 'Email không được để trống';
    } else {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errs['email'] = 'Email không đúng định dạng';
        }
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }

    if (empty($_POST['password'])) {
        $errs['password'] = 'Mật khẩu không được để trống';
    } else {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }

    if (empty($errs)) {
        if (!handleLimit()) {
            $errs['common'] = 'Bạn đã đăng nhập sai quá nhiều lần, <br> vui lòng thử lại sau 5 phút';
        } else {
            $result = $authService->login($email, $password);
            if ($result === 'not_verified') {
                $errs['common'] = 'Tài khoản chưa được xác minh, <br> vui lòng kiểm tra email';
            } else if ($result) {
                unset($_SESSION['login']);
                header("Location: $pathHome/index.php");
            } else {
                $errs['common'] = 'Email hoặc mật khẩu không đúng';
            }
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

    <!-- /account/login -->
    <!-- Path -->
    <div class="py-12 bg-slate-300 text-center mt-[116px]">
        <a class="text-slate-500 mx-2" href="/">Trang chủ</a> / <span
            class="mx-2">Tài khoản</span>
    </div>
    <!-- Login -->
    <div class="w-full items-center flex flex-row">
        <form method="post" class="my-10 flex flex-col gap-3 mx-auto">
            <h2 class="text-center font-bold text-[24px]">Đăng Nhập</h2>
            <input type="text"
                class="p-2 py-3 bg-gray-100 w-[350px] outline-none border-[2px] <?php if (isset($errs['email'])) echo 'border-red-500' ?> "
                placeholder="Email" name="email"
                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            <p class="text-left text-red-500"><?php if (isset($errs['email'])) echo $errs['email'] ?></p>
            <input type="password"
                class="p-2 py-3 bg-gray-100 w-[350px] outline-none border-[2px] <?php if (isset($errs['password'])) echo 'border-red-500' ?> "
                placeholder="Mật khẩu" name="password"
                value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
            <p class="text-left text-red-500"><?php if (isset($errs['password'])) echo $errs['password'] ?></p>

            <button class="bg-red-500 font-semibold text-white py-1 w-[350px]">Đăng
                nhập</button>
            <p class="text-center text-red-500"><?php if (isset($errs['common'])) echo $errs['common'] ?></p>
            <div class="mx-auto flex flex-col items-center">
                <a href="./register.php">Đăng ký</a>
                <a href="/">Quay trở lại cửa hàng</a>
            </div>
        </form>
    </div>



    <!-- Footer -->
    <?php include_once '../layout/footer.php'; ?>
</body>

</html>