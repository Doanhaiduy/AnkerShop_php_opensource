<?php
include_once '../controllers/Auth.php';
include_once '../config/db.php';

$auth = new AuthController($conn);
$err = '';
$pathHome = explode('/php', $_SERVER['PHP_SELF'])[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == '' || $password == '') {
        $err = 'Vui lòng nhập đầy đủ thông tin';
    } else {
        $result = $auth->login($email, $password);
        if ($result) {
            header("Location: $pathHome/index.php");
        } else {
            $err = 'Đăng nhập thất bại';
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
            placeholder="Email" name="email" \
            value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <input type="password"
            class="p-2 py-3 bg-gray-100 w-[350px] outline-none border"
            placeholder="Mật khẩu" name="password"
            value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>">
        <button class="bg-red-500 font-semibold text-white py-1 w-[350px]">Đăng
            nhập</button>
        <p class="text-red-500"><?php echo $err; ?></p>
        <a href="/">Quay trở lại cửa hàng</a>
        <a href="./register.php">Đăng ký</a>
    </form>


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
    <?php include_once '../layout/footer.php'; ?>
</body>

</html>