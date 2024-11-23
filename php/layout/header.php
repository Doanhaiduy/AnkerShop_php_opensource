<?php
if (session_id()) {
} else {
    session_start();
}



if (isset($_SESSION['expire'])) {
    if (time() > $_SESSION['expire']) {
        session_unset();
        session_destroy();
    }
}

// define('BASE_URL', '/xampp/htdocs/AnkerShop/');
// Thay đổi BASE_URL tại đây: ví dụ chạy bằng xamp với thư mục ankershop là thư mục gốc của dự án nằm ở htdocs: 
define('BASE_URL', '/ankershop/');
// Trường hợp đẩy lên hosting thì thay đổi BASE_URL thành thư mục chứa dự án trên hosting hoặc '/' nếu dự án nằm ở thư mục gốc

$pathHome = explode('/php', $_SERVER['PHP_SELF'])[0];

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: $pathHome/index.php");
}
?>
<!-- Header -->
<header class="fixed top-0 left-0 right-0 bg-white z-[10]">
    <div class="px-[10vw] flex justify-between items-center py-4">
        <div class="flex items-center gap-3 ">
            <div
                class="w-[40px] h-[40px] bg-primary flex items-center justify-center ">
                <i class="fa-solid fa-bars"></i>
            </div>
            <a href="
            <?php echo BASE_URL; ?> 
            "><img src="./assets//imgs/logo.webp" alt=""></a>
        </div>
        <form class="w-[40%]"
            action="<?php echo BASE_URL . 'php/pages/search.php' ?>" method="get">
            <input type="text"
                class="bg-slate-200 h-[40px] w-[60%] px-2 outline-none placeholder:text-black"
                placeholder="Tìm kiếm" name="search">
            <button type="submit"
                class="bg-red-700 w-[40px] cursor-pointer ml-[-5px] h-[40px] text-[#fff]"><i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="flex items-center gap-3">
            <div
                class="w-8 h-8 border-[1px] border-slate-300 text-slate-300  rounded-full flex items-center justify-center">
                <i class="fa-solid fa-phone"></i>
            </div>
            <p>HOTLINE: <strong>03 9999 8943</strong></p>
        </div>
        <div class="flex items-center gap-3">
            <div class="text-primary text-[18px] relative group cursor-pointer w-[120px]">
                <?php if (isset($_SESSION['user'])) {
                    echo $_SESSION['user']['full_name'];
                    echo ' <form method="post" class="absolute bg-white p-2 group-hover:block hidden rounded-[8px]">
                    <input type="submit" name="logout" value="Đăng Xuất">
                </form>';
                } else {
                    echo '<div class="w-full"><i class="fa-solid fa-user "></i></div>';
                    echo '<div class="absolute bg-white p-2 group-hover:block hidden w-full rounded-[8px]">';
                    echo '<a class="w-full" href="' . BASE_URL . 'php/pages/login.php">Đăng Nhập</a> <br>';
                    echo '<a class="w-full" href="' . BASE_URL . 'php/pages/register.php">Đăng Ký</a>';
                    echo '</div>';
                }
                ?>

            </div>
            <div class="text-primary text-[26px] cursor-pointer">
                <a href="
                <?php
                if (isset($_SESSION['user'])) {
                    echo BASE_URL . 'php/pages/cart.php';
                } else {
                    echo BASE_URL . 'php/pages/login.php';
                }
                ?>
                "><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
    </div>
    <!-- Menu -->
    <div
        class="px-[10vw] flex gap-x-[30px] items-center flex-wrap py-2 bg-primary text-white font-bold ">
        <a href=""><i class="fa-solid fa-house"></i></a>
        <a href="
        <?php echo BASE_URL; ?>">Trang Chủ</i></a>
        <a href="">Pin Dự Phòng</i></a>
        <a href="">Sạc</i> <i class="fa-solid fa-angle-down"></i></a>
        <a href="">Cáp</i></a>
        <a href="">Loa</i></a>
        <a href="">Tai Nghe</i></a>
        <a href="">Powerhouse</i></a>
        <a href="">AnkerWork</i></a>
        <a href="">Nebula</i></a>
        <a href="">Eufy</i></a>
        <a href="">Sản Phẩn Khác</i> <i
                class="fa-solid fa-angle-down"></i></a>
        <a href="">Tin Tức</i></a>

    </div>
</header>