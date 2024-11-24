-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2024 lúc 04:54 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ankershop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_line`
--
CREATE DATABASE IF NOT EXISTS ankershop;
USE ankershop;

CREATE TABLE `order_line` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(18,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_line`
--


--
-- Cấu trúc bảng cho bảng `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`) VALUES
(1, 'Bank Transfer (VNPAY)'),
(2, 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(4000) DEFAULT NULL,
  `product_image` varchar(1000) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `product_image`, `stock`, `price`) VALUES
(1, 1, 'Pin dự phòng Anker 523 Powercore Slim 10K PD – A1245', 'Sạc dự phòng Anker 523 PowerCore Slim – A1245 (1A1C 22.5W 10000mah Đen, cho iPhone 14/13/12 Series, S10, Pixel 4 trở lên)', 'https://ankershop.vn/wp-content/uploads/2023/12/ANKER-A9521-8.png', 98, 60000),
(2, 1, 'Pin Dự Phòng Anker 737 PowerCore 24000 140W – A1289', 'Pin dự phòng Anker 737 dung lượng 24000mAh duy nhất hiện nay sạc được cho Laptop, Macbook ở tốc độ cao với công suất 140W Sạc 2 chiều cực mạnh', 'https://ankershop.vn/wp-content/uploads/2023/10/Pin-Du-Phong-Anker-737-PowerCore-24000-140W-A1289.png', 92, 359000),
(3, 1, 'Pin sạc dự phòng 20000mAh Type C PD QC 3.0 30W Anker A1384 kèm Cáp Type C', 'Pin sạc dự phòng Anker A1384 với dung lượng 20000mAh là lựa chọn hoàn hảo cho những ai cần một nguồn năng lượng dự phòng mạnh mẽ và tiện lợi. Sản phẩm này không chỉ nổi bật với dung lượng lớn mà còn được trang bị các công nghệ sạc nhanh tiên tiến như Power Delivery (PD) và Quick Charge 3.0 (QC 3.0), giúp bạn sạc thiết bị nhanh chóng và hiệu quả.', 'https://ankershop.vn/wp-content/uploads/2024/08/A1384.jpg', 76, 790000),
(4, 1, 'Pin dự phòng Anker PowerHouse 200 – 57600mAh – A1702', 'Pin Sạc Dự Phòng Anker Powerhouse 200Wh / 57600mAh – A1702 có thể cung cấp năng lượng cho chuyến đi của bạn, để cắm trại, bật đèn, điện thoại, máy tính xách tay, TV và thậm chí cả tủ lạnh mini.', 'https://cdn.tgdd.vn/Products/Images/57/309433/pin-sac-du-phong-polymer-10000mah-12w-ava-ds609a-thumb-1-600x600.jpg', 84, 400000),
(5, 1, 'Sạc dự phòng Anker 335 1C1A 22.5W 20000mah (Built-In USB-C Cable) A1647', 'Được biết đến với model A1647, Sạc dự phòng Anker 335 có lớp sơn mờ ở cả hai mặt với đường viền bóng, toát lên vẻ trẻ trung, sống động mang thiết kế giống mỹ phẩm hơn là các thiết bị điện tử. Nó có bốn màu: tím hoa cà, đen ảo, trắng cực quang và hồng kem. Hơn nữa, sạc dự phòng còn kết hợp màn hình hiển thị pin dựa trên tỷ lệ phần trăm và hỗ trợ đầu ra 22,5W và đầu vào 20W.', 'https://ankershop.vn/wp-content/uploads/2023/12/Anker-A1647-.png', 69, 500000),
(6, 4, 'Cáp 3 đầu Lightning Type C Micro 0.9m Anker A8436', 'Cáp 3 đầu Lightning Type C Micro 0.9m Anker A8436 Trắng là cáp sạc 3 trong 1 với thiết kế đơn giản cùng độ dài dây 90 cm, người dùng có thể tiện đem theo bất cứ đâu và sạc cho thiết bị của mình khi cần thiết.', 'https://ankershop.vn/wp-content/uploads/2021/07/cap-3-in-1-mfi-anker-powerline-ii-0-9m-a8436-10-.jpeg', 71, 300000),
(7, 4, 'Cáp Anker 322 USB-C to USB-L 0.9M Nylon A81B5H21', 'Cáp Anker 322 USB-C to USB-L 0.9m Nylon A81B5H21 được làm ra từ vật liệu nylon nên độ bền cao và đạt chứng nhận chất lượng an toàn. Phụ kiện cáp Anker còn hỗ trợ sạc nhanh cho hầu hết các dòng iPhone nên sẽ giúp bạn rút ngắn tối ưu thời gian sạc hiệu quả.', 'https://ankershop.vn/wp-content/uploads/2023/12/Ca%CC%81p-Anker-22.png', 99, 500000),
(8, 4, 'Củ sạc Anker 316 1C 67W Đen (Black) A2671', 'Củ sạc Anker 316 1C 67W A2671 là một giải pháp sạc nhanh phù hợp cho tất cả các dòng điện thoại và iPad trên thị trường hiện nay. Với khả năng đáng tin cậy và tiện lợi, sản phẩm củ sạc Anker này là một sự lựa chọn tốt cho người dùng đang tìm kiếm củ sạc chất lượng.', 'https://ankershop.vn/wp-content/uploads/2023/12/Anker-316.jpg', 100, 150000),
(9, 4, 'Củ sạc nhanh Anker 1C1A 20W Trắng A2348', 'Của sạc Anker 2 cổng 1C1A 20W A2348 sở hữu một thiết kế nhỏ gọn cùng 2 cổng ra tiện lợi. Cùng với đó sạc Anker nhiều cổng này còn được trang bị công suất sạc nhanh, hỗ trợ bổ sung năng lượng nhanh chóng.', 'https://ankershop.vn/wp-content/uploads/2023/12/Anker-A2348-1.jpg', 97, 25000),
(10, 4, 'Cáp sạc Anker PowerLine III C to C 0.9m A8852 FLOW', 'Đầu ra 20V – 3A, đáp ứng nhiều mức sạc khác nhau, cáp sạc Anker có thể sạc Samsung S10 lên 50% chỉ trong 30 phút khi kết hợp với adapter Power Delivery 18W.', 'https://ankershop.vn/wp-content/uploads/2023/10/Cap-Type-C-to-Type-C-Anker-PowerLine-II.jpg', 100, 350000),
(11, 3, 'Anker A3947 – Tai nghe không dây Bluetooth Anker Soundcore Liberty 4 NC', 'Nếu bạn đang tìm kiếm một chiếc tai nghe không dây với khả năng khử tiếng ồn hiệu quả và chất lượng âm thanh tốt, Anker Soundcore Liberty 4 NC có thể là một sự lựa chọn đáng cân nhắc.', 'https://ankershop.vn/wp-content/uploads/2024/08/tai-nghe-bluetooth-anker-soundcore-liberty-4-spa.webp', 100, 300000),
(12, 3, 'Loa bluetooth Anker PowerConf S3 A3302 (Màu đen)', 'Loa Bluetooth Anker PowerConf S3 A3302 với 6 Mic, Nhận giọng nói nâng cao, Thời gian gọi 24 giờ, Điều khiển ứng dụng, Bluetooth 5, USB C, Loa hội nghị tương thích với các nền tảng hàng đầu, Văn phòng tại nhà.', 'https://ankershop.vn/wp-content/uploads/2023/12/Anker-PowerConf-S3.jpg', 100, 200000),
(13, 3, 'Tai nghe Bluetooth chụp tai Anker Soundcore Q20i', 'Tai nghe Bluetooth chụp tai Anker Soundcore Q20i là một sản phẩm nổi bật trong dòng tai nghe của Anker, được thiết kế để cung cấp trải nghiệm âm thanh chất lượng cao cùng với nhiều tính năng tiện ích.', 'https://ankershop.vn/wp-content/uploads/2024/08/b5c11ce750e9bb9c43b1ea8447a90ae6_jpg_2200x2200q80_jpg.webp', 100, 180000),
(14, 3, 'Tai nghe Bluetooth chống ồn Soundcore P40i có mic Anker A3955', 'Tai nghe Bluetooth chống ồn Soundcore P40i với mic Anker A3955 là một sản phẩm đáng chú ý từ thương hiệu Anker, nổi bật với các tính năng chất lượng và thiết kế hiện đại.', 'https://cdn.tgdd.vn/Products/Images/57/309433/pin-sac-du-phong-polymer-10000mah-12w-ava-ds609a-thumb-1-600x600.jpg', 100, 120000),
(15, 3, 'Tai nghe Bluetooth True Wireless Anker Soundcore V20i – A3876', 'Tai nghe Bluetooth True Wireless Anker Soundcore V20i (A3876) là một sản phẩm nổi bật trong dòng tai nghe không dây của Anker, được thiết kế để mang lại trải nghiệm âm thanh chất lượng.', 'https://ankershop.vn/wp-content/uploads/2024/08/tai-nghe-khong-day-anker-soundcore-v20i-a3876_3_.webp', 100, 150000),
(16, 2, 'Sạc ô tô ANKER 2 cổng công suất 30w Power Delivery – A2720', 'Sạc Xe Hơi Ô Tô Anker 2 Cổng 30W PD – A2720 sạc nhanh vào thiết bị cao cấp với cổng USB-C Power Delivery, sạc điện thoại thông minh và máy tính bảng hàng đầu ở tốc độ cao nhất. Phát hiện các thiết bị USB tiêu chuẩn được kết nối để cung cấp mức sạc tối ưu với cổng PowerIQ độc quyền của Anker.', 'https://ankershop.vn/wp-content/uploads/2021/12/A2720-2.jpg', 100, 300000),
(17, 2, 'Sạc Ô Tô Anker 2 Cổng PD 24W A2727', 'Sạc ô tô Anker 2 cổng PD 24W A2727 tối đa hoá tốc độ và hiệu quả sạc.', 'https://ankershop.vn/wp-content/uploads/2021/12/A2727-3.jpg', 100, 150000),
(18, 2, 'Củ sạc Anker 316 1C 67W Đen (Black) A2671', 'Củ sạc Anker 316 1C 67W A2671 là một giải pháp sạc nhanh phù hợp cho tất cả các dòng điện thoại và iPad trên thị trường hiện nay. Với khả năng đáng tin cậy và tiện lợi, sản phẩm củ sạc Anker này là một sự lựa chọn tốt cho người dùng đang tìm kiếm củ sạc chất lượng.', 'https://ankershop.vn/wp-content/uploads/2023/12/Anker-316.jpg', 100, 800000),
(19, 2, 'Củ sạc Anker 317 1C 100W (With USB-C Cable) Đen B2672', 'ạc tốc độ cao: Củ sạc Anker 317 1C 100W (With USB-C Cable) B2672 cung cấp đủ năng lượng để sạc nhiều loại thiết bị trong thời gian kỷ lục. Sạc MacBook Pro 16″ (M1 Max, 2021) lên 100% trong 1 giờ 20 phút để bạn có thể làm việc hiệu quả cả ngày.', 'https://ankershop.vn/wp-content/uploads/2023/12/Anker-317.jpg', 100, 600000),
(20, 2, 'Cục sạc 4 cổng USB Type C PD 65W Anker PowerPort Atom III Slim A2045', 'Cục sạc 4 cổng USB Type C PD 65W Anker PowerPort Atom III Slim A2045 đen có hình khối sang trọng, chỉ 0.7 inch, dễ dàng cho vào túi áo, quần hoặc túi xách, balo để mang theo khi đi công tác, đến công sở, trường học,…', 'https://ankershop.vn/wp-content/uploads/2021/12/A2045-1.png', 100, 500000),
(21, 5, 'LOA BLUETOOTH ANKER SOUNDCORE MINI 3 PRO – A3127', 'Loa Bluetooth Anker Soundcore Mini 3 Pro đủ nhỏ và nhẹ để dễ dàng cất vào túi hoặc ba lô. Luôn sẵn sàng đồng hành cùng bạn trên những du lịch.', 'https://ankershop.vn/wp-content/uploads/2021/12/photo-2021-06-23-14-26-53.jpg', 100, 800000),
(22, 5, 'Loa Bluetooth Anker Soundcore Motion B A3109', 'Nếu bạn đang cần mua loa nghe nhạc, bạn hãy cân nhắc lựa chọn loa bluetooth Anker Soundcore Motion B A3109.', 'https://ankershop.vn/wp-content/uploads/2021/12/3190.jpeg', 100, 900000),
(23, 5, 'LOA BLUETOOTH ANKER SOUNDCORE MOTION BOOM 30W – A3118', 'Thương hiệu âm thanh Soundcore của hãng Anker luôn biết cách hài lòng các audiophile với những sản phẩm loa chất lượng cao cùng kiểu dáng thời thượng. Nếu bạn là một audiophile yêu thích khuấy động những bữa tiệc của riêng bạn, sản phẩm loa Anker Soundcore Motion Boom A3118 chính là chiếc loa dành cho bạn.', 'https://ankershop.vn/wp-content/uploads/2021/12/motion-boom-a3118.jpg', 100, 890000),
(24, 5, 'Loa Bluetooth Anker Soundcore 3 – A3117', 'oa Bluetooth Anker Soundcore 3 (mã A3117) là một sản phẩm đáng chú ý trong dòng loa không dây của Anker.', 'https://ankershop.vn/wp-content/uploads/2024/08/71jdtwe2s7l._ac_ss450__11296ff43bc044f880112a7cd3130b8a_grande.jpg', 100, 780000),
(25, 5, 'Loa Bluetooth Anker Soundcore Mini 3 A3119', 'Loa Anker Soundcore mini 3 6W A3119 đen chất âm mạnh mẽ cùng thời gian sử dụng dài', 'https://ankershop.vn/wp-content/uploads/2021/12/soundcore-mini-3-a3119.jpeg', 100, 98000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `category_name`) VALUES
(1, 'Pin sạc dự phòng'),
(2, 'Phụ kiện điện tử'),
(3, 'Âm thanh'),
(4, 'Cáp sạc'),
(5, 'Phụ kiện khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `user_id`) VALUES
(1, 1),
(2, 2),
(3, 3);
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopping_cart_item`
--

CREATE TABLE `shopping_cart_item` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shopping_cart_item`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop_order`
--

CREATE TABLE `shop_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `order_full_name` varchar(50) DEFAULT NULL,
  `order_phone` varchar(15) DEFAULT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `shipping_address` varchar(100) DEFAULT NULL,
  `order_note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `shop_order`
--


--
-- Cấu trúc bảng cho bảng `user`
--


CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email_address` varchar(350) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT '1',
  `user_address` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `verified` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `full_name`, `email_address`, `phone_number`, `gender`, `user_address`, `password`, `verified`) VALUES
(1, 'Nguyễn Thành Luân', 'luannth20032x@gmail.com', '0337750905', '1', 'Thị Xã Đông Hòa , Phú Yên', 'thanhluan03', '1'),
(2, 'Đoàn Hải Duy', 'haiduytbt2k33@gmail.com', '0399998943', '1', 'TP.Nha Trang , Khánh Hòa', 'doanhaiduy03', '1'),
(3, 'Đoàn Thanh Sang', 'sang.dt0331@gmail.com', '0735858276', '1', 'Huyện Tuy An , Phú Yên', 'doanthanhsang03', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `order_line`
--
ALTER TABLE `order_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Index` (`category_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Index` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `payment_method_id` (`payment_method_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `order_line`
--
ALTER TABLE `order_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_line_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `shop_order` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`id`);

--
-- Các ràng buộc cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `shopping_cart_item`
--
ALTER TABLE `shopping_cart_item`
  ADD CONSTRAINT `shopping_cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`id`),
  ADD CONSTRAINT `shopping_cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `shop_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `shop_order_ibfk_2` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

