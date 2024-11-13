<?php
include_once '../controllers/Auth.php';
include_once '../config/db.php';
$auth = new AuthController($conn);
$errs = [];
$pathHome = explode('/php', $_SERVER['PHP_SELF'])[0];



if (isset($_POST['register'])) {
    if (empty($_POST['fullName'])) {
        $errs[] = 'Họ và tên không được để trống';
    } else {
        $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    }

    if (empty($_POST['email'])) {
        $errs[] = 'Email không được để trống';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errs[] = 'Email không hợp lệ';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }

    if (empty($_POST['password'])) {
        $errs[] = 'Mật khẩu không được để trống';
    } else {
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password = mysqli_real_escape_string($conn, $hashed_password);
    }

    if (empty($_POST['phoneNumber'])) {
        $errs[] = 'Số điện thoại không được để trống';
    } else {
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    }

    if (empty($_POST['address'])) {
        $errs[] = 'Địa chỉ không được để trống';
    } else {
        $address = mysqli_real_escape_string($conn, $_POST['address']);
    }


    if (empty($errs)) {
        if ($auth->checkEmailAlreadyExists($email)) {
            $errs[] = 'Email đã tồn tại';
        } else {
            $result = $auth->register($fullName, $email, $password, $phoneNumber, $gender = 1, $address);
            if ($result) {
                header("Location: $pathHome/index.php");
            } else {
                $errs[] = 'Đăng ký thất bại';
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
    <?php include '../layout/header.php';
    if (isset($_SESSION['user'])) {
        header("Location: $pathHome/index.php");
    }
    ?>

    <!-- Test dev -->

    <!-- /account/register -->
    <!-- Path -->
    <div class="py-12 bg-slate-300 text-center mt-[116px]">
        <a class="text-slate-500 mx-2" href="/">Trang chủ</a> / <span
            class="mx-2">Tạo tài khoản</span>
    </div>
    <!-- register -->
    <form class="my-10 flex flex-col items-center gap-3" method="post">
        <h2 class="text-center font-bold text-[24px]">Tạo tài khoản</h2>
        <input type="text"
            class="p-2 py-3 bg-gray-100 w-[350px] outline-none border" <?php if (isset($_POST['fullName'])) echo 'value="' . $_POST['fullName'] . '"' ?>
            placeholder="Họ và tên" name="fullName">
        <input type="text"
            class="p-2 py-3 bg-gray-100 w-[350px] outline-none border" <?php if (isset($_POST['email'])) echo 'value="' . $_POST['email'] . '"' ?>
            placeholder="Email" name="email">
        <input type="password"
            class="p-2 py-3 bg-gray-100 w-[350px] outline-none border"
            placeholder="Mật khẩu" name="password">
        <input type="text"
            class="p-2 py-3 bg-gray-100 w-[350px] outline-none border" <?php if (isset($_POST['phoneNumber'])) echo 'value="' . $_POST['phoneNumber'] . '"' ?>
            placeholder="Số điện thoại" name="phoneNumber">
        <input type="text"
            class="p-2 py-3 bg-gray-100 w-[350px] outline-none border" <?php if (isset($_POST['address'])) echo 'value="' . $_POST['address'] . '"' ?>
            placeholder="Địa chỉ" name="address">
        <button class="bg-red-500 font-semibold text-white py-1 w-[350px]" type="submit" name="register" value="ok">Đăng ký</button>
        <?php foreach ($errs as $err) : ?>
            <p class="text-red-500"><?php echo $err ?></p>
        <?php endforeach; ?>

        <a href="./login.php">Đăng nhập</a>
        <a href="../../index.php">Quay trở lại cửa hàng</a>
    </form>



    <!-- Footer -->
    <?php include '../layout/footer.php'; ?>
</body>

</html>