<?php
include_once '../controllers/Auth.php';
include_once '../config/db.php';
include_once '../utils/validate.php';
$auth = new AuthController($conn);
$errs = [];
$pathHome = explode('/php', $_SERVER['PHP_SELF'])[0];

if (isset($_POST['register'])) {
    if (empty($_POST['fullName'])) {
        $errs["fullName"] = 'Họ và tên không được để trống';
    } else {
        if (!regexFullName($_POST['fullName'])) {
            $errs["fullName"] = 'Họ và tên không hợp lệ (vd: Nguyễn Văn A)';
        }
        $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    }

    if (empty($_POST['email'])) {
        $errs["email"] = 'Email không được để trống';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errs["email"] = 'Email không hợp lệ (vd: example@gmail.com';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }

    if (empty($_POST['password'])) {
        $errs["password"] = 'Mật khẩu không được để trống';
    } else {
        if (!regexPassword($_POST['password'])) {
            $errs["password"] = 'Mật khẩu phải có ít nhất 6 ký tự';
        }
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password = mysqli_real_escape_string($conn, $hashed_password);
    }

    if (empty($_POST['phoneNumber'])) {
        $errs["phoneNumber"] = 'Số điện thoại không được để trống';
    } else {
        if (!regexPhoneNumber($_POST['phoneNumber'])) {
            $errs["phoneNumber"] = 'Số điện thoại không hợp lệ (vd: 0323456789)';
        }
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    }

    if (empty($_POST['address'])) {
        $errs["address"] = 'Địa chỉ không được để trống';
    } else {
        $address = mysqli_real_escape_string($conn, $_POST['address']);
    }

    if (empty($errs)) {
        if ($auth->checkEmailAlreadyExists($email)) {
            $errs["email"] = 'Email đã tồn tại';
        } else {
            $result = $auth->register($fullName, $email, $password, $phoneNumber, $gender = 1, $address);
            if ($result) {
                header("Location: $pathHome/index.php");
            } else {
                $errs["common"] = 'Đăng ký thất bại';
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
    <div class="w-full items-center flex flex-row">
        <form class="my-10 flex flex-col gap-3 mx-auto" method="post">
            <h2 class="text-center font-bold text-[24px]">Tạo tài khoản</h2>
            <input type="text"
                class="p-2 py-3 bg-gray-100 w-[350px] outline-none border-[2px] <?php if (isset($errs['fullName'])) echo 'border-red-500' ?>"
                placeholder="Họ và tên" name="fullName"
                value="<?php echo isset($_POST['fullName']) ? $_POST['fullName'] : ''; ?>">
            <p class="text-left text-red-500"><?php if (isset($errs['fullName'])) echo $errs['fullName'] ?></p>

            <input type="text"
                class="p-2 py-3 bg-gray-100 w-[350px] outline-none border-[2px] <?php if (isset($errs['email'])) echo 'border-red-500' ?>"
                placeholder="Email" name="email"
                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            <p class="text-left text-red-500"><?php if (isset($errs['email'])) echo $errs['email'] ?></p>

            <input type="password"
                class="p-2 py-3 bg-gray-100 w-[350px] outline-none border-[2px] <?php if (isset($errs['password'])) echo 'border-red-500' ?>"
                placeholder="Mật khẩu" name="password"
                value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
            <p class="text-left text-red-500"><?php if (isset($errs['password'])) echo $errs['password'] ?></p>

            <input type="text"
                class="p-2 py-3 bg-gray-100 w-[350px] outline-none border-[2px] <?php if (isset($errs['phoneNumber'])) echo 'border-red-500' ?>"
                placeholder="Số điện thoại" name="phoneNumber"
                value="<?php echo isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : ''; ?>">
            <p class="text-left text-red-500"><?php if (isset($errs['phoneNumber'])) echo $errs['phoneNumber'] ?></p>

            <input type="text"
                class="p-2 py-3 bg-gray-100 w-[350px] outline-none border-[2px] <?php if (isset($errs['address'])) echo 'border-red-500' ?>"
                placeholder="Địa chỉ" name="address"
                value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>">
            <p class="text-left text-red-500"><?php if (isset($errs['address'])) echo $errs['address'] ?></p>

            <button class="bg-red-500 font-semibold text-white py-1 w-[350px]" type="submit" name="register" value="ok">Đăng ký</button>
            <p class="text-center text-red-500"><?php if (isset($errs['common'])) echo $errs['common'] ?></p>
            <div class="mx-auto flex flex-col items-center">
                <a href="./login.php">Đăng nhập</a>
                <a href="../../index.php">Quay trở lại cửa hàng</a>
            </div>
        </form>

    </div>

    <!-- Footer -->
    <?php include '../layout/footer.php'; ?>
</body>

</html>