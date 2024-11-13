<?php
include_once '../controllers/Auth.php';
include_once '../config/db.php';

$auth = new AuthController($conn);
$errs = [];
$pathHome = explode('/php', $_SERVER['PHP_SELF'])[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['email'])) {
        $errs[] = 'Email không được để trống';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }

    if (empty($_POST['password'])) {
        $errs[] = 'Mật khẩu không được để trống';
    } else {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    }

    if (empty($errs)) {
        $result = $auth->login($email, $password);
        if ($result) {
            header("Location: $pathHome/index.php");
        } else {
            $errs[] = 'Đăng nhập thất bại';
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
    <form method="post" class="my-10 flex flex-col items-center gap-3">
        <h2 class="text-center font-bold text-[24px]">Đăng Nhập</h2>
        <input type="text"
            class="p-2 py-3 bg-gray-100 w-[350px] outline-none border"
            placeholder="Email" name="email"
            value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <input type="password"
            class="p-2 py-3 bg-gray-100 w-[350px] outline-none border"
            placeholder="Mật khẩu" name="password"
            value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
        <button class="bg-red-500 font-semibold text-white py-1 w-[350px]">Đăng
            nhập</button>
        <?php foreach ($errs as $err) : ?>
            <p class="text-red-500"><?php echo $err; ?></p>
        <?php endforeach; ?>
        <a href="/">Quay trở lại cửa hàng</a>
        <a href="./register.php">Đăng ký</a>
    </form>



    <!-- Footer -->
    <?php include_once '../layout/footer.php'; ?>
</body>

</html>