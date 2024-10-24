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