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
    <p>&copy; 2022 - Bản quyền của Công ty cổ phẩn Mocato Việt Nam - Trụ sở:
        248 Phú Viên, Bồ Đề, Long Biên, Hà Nội. GPĐKKD: 0109787586 do Sở Kế
        Hoạch và Đầu Tư Hà Nội cấp ngày 22/10/2021.</p>
</div>

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

<!-- ✅ load Slick ✅ -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.slide-product-1').slick({
            slidesToShow: 6,
            slidesToScroll: 3,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });

    $('.slide-product-2').slick({
        slidesToShow: 6,
        slidesToScroll: 3,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 1500,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.banner').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
</script>