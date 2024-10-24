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
    <div class="fixed top-0 left-0 right-0 bg-white z-10">
        <div class="px-[10vw] flex justify-between items-center py-4">
            <div class="flex items-center gap-3">
                <div
                    class="w-[40px] h-[40px] bg-primary flex items-center justify-center">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <a href="/"><img src="./assets//imgs/logo.webp" alt=""></a>
            </div>
            <div class="w-[40%]">
                <input type="text"
                    class="bg-slate-200 h-[40px] w-[60%] px-2 outline-none placeholder:text-black"
                    placeholder="Tìm kiếm">
                <button
                    class="bg-red-700 w-[40px] cursor-pointer ml-[-5px] h-[40px] text-[#fff]"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="flex items-center gap-3">
                <div
                    class="w-8 h-8 border-[1px] border-slate-300 text-slate-300  rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <p>HOTLINE: <strong>03 9999 8943</strong></p>
            </div>
            <div class="flex items-center gap-3">
                <div class="text-primary text-[26px]">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="text-primary text-[26px]">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
            </div>
        </div>
        <!-- Menu -->
        <div
            class="px-[10vw] flex gap-x-[30px] items-center flex-wrap py-2 bg-primary text-white font-bold ">
            <a href=""><i class="fa-solid fa-house"></i></a>
            <a href="">Trang Chủ</i></a>
            <a href="">Pin Dự Phòng</i></a>
            <a href="">Sạc</i> <i class="fa-solid fa-angle-down"></i></a>
            <a href="">Cáp</i></a>
            <a href="">Loa</i></a>
            <a href="">Tai Nghe</i></a>
            <a href="">Powerhouse</i></a>
            <a href="">AnkerWork</i></a>
            <a href="">Nebula</i></a>
            <a href="">Eufy</i></a>
            <a href="">Sản Phẩn Khác</i> <i class="fa-solid fa-angle-down"></i></a>
            <a href="">Tin Tức</i></a>
        </div>
    </div>
    <!-- Test dev -->
    <div
        class="fixed bottom-0 z-[200] bg-primary w-full px-6 text-white text-[24px]">
        <ul class="flex gap-3 justify-between">
            <li><a class="font-semibold" href="/">Home</a></li>
            <li><a class="font-semibold" href="/detail.html">Detail</a></li>
            <li><a class="font-semibold" href="/cart.html">Cart</a></li>
            <li><a class="font-semibold" href="/account.html">Account</a></li>
            <li><a class="font-semibold" href="/collections.html">Collections</a></li>
            <li><a class="font-semibold" href="/search.html">Search</a></li>
            <li><a class="font-semibold" href="/login.html">Login</a></li>
            <li><a class="font-semibold" href="/register.html">Register</a></li>
        </ul>
    </div>
    <!-- /cart-->
    <!-- Path -->
    <div class="py-12 bg-slate-300 text-center mt-[116px]">
        <a class="text-slate-500 mx-2" href="/">Trang chủ</a> / <span
            class="mx-2">Giỏ hàng của bạn - ANKER Việt Nam</span>
    </div>
    <!-- Cart -->
    <div class="px-[10vw] pb-[120px] pt-[20px] ">
        <h2 class="font-bold text-[24px] pb-4">Giỏ hàng</h2>
        <table class="table w-full">
            <!-- head -->
            <thead class="border-y">
                <tr>
                    <th class="w-[70%] py-3">Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr class="border-b">
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="h-[250px] w-[250px]">
                                    <img src="./assets/imgs/index/Product/pro_2.webp" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold text-[20px] mb-[20px]">
                                    Sạc Anker 511 Nano Pro PIQ 3.0 20W - A2637 (Nano Pro)
                                </div>
                                <div class="text-sm opacity-50">Trắng / 18 Tháng <br> Anker
                                </div>
                                <button class="mt-4">Xóa</button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong class="text-[24px]">270,000₫</strong>
                    </td>
                    <td><input type="number" class="border w-[40px] h-[40px] p-2"
                            value="1"></td>
                    <th>
                        <strong class="text-[24px]">540,000₫</strong>
                    </th>
                </tr>

                <!-- row 2 -->
                <tr class="border-b">
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="h-[250px] w-[250px]">
                                    <img src="./assets/imgs/index/Product/pro_2.webp" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold text-[20px] mb-[20px]">
                                    Sạc Anker 511 Nano Pro PIQ 3.0 20W - A2637 (Nano Pro)
                                </div>
                                <div class="text-sm opacity-50">Trắng / 18 Tháng <br> Anker
                                </div>
                                <button class="mt-4">Xóa</button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong class="text-[24px]">270,000₫</strong>
                    </td>
                    <td><input type="number" class="border w-[40px] h-[40px] p-2"
                            value="1"></td>
                    <th>
                        <strong class="text-[24px]">540,000₫</strong>
                    </th>
                </tr>

                <!-- row 3 -->
                <tr class="border-b">
                    <td>
                        <div class="flex items-center space-x-3">
                            <div class="avatar">
                                <div class="h-[250px] w-[250px]">
                                    <img src="./assets/imgs/index/Product/pro_2.webp" />
                                </div>
                            </div>
                            <div>
                                <div class="font-bold text-[20px] mb-[20px]">
                                    Sạc Anker 511 Nano Pro PIQ 3.0 20W - A2637 (Nano Pro)
                                </div>
                                <div class="text-sm opacity-50">Trắng / 18 Tháng <br> Anker
                                </div>
                                <button class="mt-4">Xóa</button>
                            </div>
                        </div>
                    </td>
                    <td>
                        <strong class="text-[24px]">270,000₫</strong>
                    </td>
                    <td><input type="number" class="border w-[40px] h-[40px] p-2"
                            value="1"></td>
                    <th>
                        <strong class="text-[24px]">540,000₫</strong>
                    </th>
                </tr>
            </tbody>
        </table>
        <form action="/checkouts-step1.html"
            class="mt-5 flex items-center justify-between">
            <div class="">
                <h4 class="font-semibold mb-2">Ghi chú đơn hàng</h4>
                <textarea name="" id="" cols="100" rows="4"
                    class="bg-gray-100 outline-none p-2"></textarea>
            </div>
            <div class="text-right">
                <p class="">Tổng <strong class="text-[24px]">1,065,000₫</strong></p>
                <p class="my-2 italic text-[14px]">Giao hàng & tính thuế khi bán hàng
                </p>
                <div class="text-[14px]">
                    <button class="px-2 py-1 bg-black text-white font-semibold">Cập nhật
                        giỏ hàng</button>
                    <button class="px-2 py-1 bg-red-400 text-white font-semibold">Thanh
                        toán</button>
                </div>
            </div>
        </form>
    </div>


    <!-- Info -->
    <div class="bg-primary px-[10vw] text-white flex gap-8 py-10">
        <div class="w-2/3 flex flex-col gap-y-4 border-r">
            <h3 class="font-bold">Sự tin tưởng của bạn là vinh dự của chúng tôi</h3>
            <p>Bắt đầu thành lập từ năm 2015 với tư cách là đại diện phân phối các sản
                phẩm của Anker tại Việt Nam. Và chúng tôi tự hào thông báo rằng tất cả
                các sản phẩm đều được đảm bảo là hàng chính hãng, đảm bảo chất lượng tốt
                nhất cùng với chính sách bảo hành và chăm sóc chu đáo.</p>
            <div>
                <strong>Showroom:</strong>
                <br>
                <p>- 180D Thái Thịnh, Thịnh Quang, Đống Đa, Hà Nội.</p>
                <p>- Giờ làm việc: 8:30 - 21:00 (Cả thứ 7 & CN)</p>
            </div>
            <div>
                <p><i class="fa-solid fa-phone"></i> Hotline: 0932 565 565 - 0243 996
                    9997</p>
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
    <div class="px-[10vw] py-6 text-center">
        <p>&copy; 2022 - Bản quyền của Công ty cổ phẩn Mocato Việt Nam - Trụ sở: 248
            Phú Viên, Bồ Đề, Long Biên, Hà Nội. GPĐKKD: 0109787586 do Sở Kế Hoạch và
            Đầu Tư Hà Nội cấp ngày 22/10/2021.</p>
    </div>
</body>

</html>