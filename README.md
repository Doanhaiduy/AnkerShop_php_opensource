# Hướng dẫn cấu hình dự án AnkerShop

Sau khi pull code về, cần chỉnh sửa một số file để cấu hình dự án chạy đúng cách. Dưới đây là các lưu ý cần phải chỉnh sửa đối với từng file:

## 1. `php/config/db.php` (dòng 4-8)

```php
// Thay đổi thông tin kết nối tại đây
$dbname = "ankershop";
$servername = "localhost";
$username = "duydoan";
$password = "PASSWORD";
```

## 2. `php/layout/header.php` (dòng 18)

```php
// Thay đổi BASE_URL tại đây: ví dụ chạy bằng xamp với thư mục ankershop là thư mục gốc của dự án nằm ở htdocs:
define('BASE_URL', '/ankershop');
// Trường hợp đẩy lên hosting thì thay đổi BASE_URL thành thư mục chứa dự án trên hosting hoặc '/' nếu dự án nằm ở thư mục gốc
define('BASE_URL', '/');
```

## 3. `php/config/vnpay.php` (dòng 15)

```php
// Thay đổi liên kết thành https:domain.com/paymentv2/vpcpay.html khi chạy trên production
$vnp_Returnurl = "https://doanhaiduy.id.vn/php/pages/returnVnpay.php";
// Đối với localhost: thay đổi port 8080 thành port đang chạy (thường là 80) và thêm tên thư mục nếu đó là thư mục gốc (ở đây là ankershop)
$vnp_Returnurl = "http://localhost:8080/ankershop/php/pages/returnvnpay.php";
```

## 4. `php/utils/index.php` (dòng 143)

```php
// thay đổi dòng 143 thành domain hoặc localhost có cổng đang chạy (ví dụ: localhost:8080/ankershop hoặc doanhaiduy.id.vn hoặc localhost/ankershop)
<a href="https://doanhaiduy.id.vn/php/pages/order.php" class="track-order-btn">Theo dõi đơn hàng</a>
```

## 5. `php/pages/register.php` (dòng 58)

```php
// Thay đổi đường dẫn verify theo domain hoặc port đang chạy: ví dụ localhost:8080/ankershop/php/pages/verifyAccount.php
// Thay đổi domain thành domain thật khi chạy trên production: ví dụ domain.com/ankershop/php/pages/verifyAccount.php
$urlVerify = 'https://doanhaiduy.id.vn/php/pages/verifyAccount.php?token=' . $token . '&email=' . $email;
```

## 6. `php/pages/verifyAccount.php` (dòng 35)

```php
// Thay đổi đường dẫn verify theo domain hoặc port đang chạy: ví dụ localhost:8080/ankershop/php/pages/verifyAccount.php
// Thay đổi domain thành domain thật khi chạy trên production: ví dụ domain.com/ankershop/php/pages/verifyAccount.php
$urlVerify = 'https://doanhaiduy.id.vn/php/pages/verifyAccount.php?token=' . $token . '&email=' . $email;
```
