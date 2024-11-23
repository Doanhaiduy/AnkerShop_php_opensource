<?php

function processVnpayPayment($conn, $cartId, $userId, $date, $full_name, $phone_number, $user_address, $payment_method_id, $order_note)
{
    $cartService = new CartController($conn);

    $totalPrice = $cartService->getTotalPrice($cartId);

    // VNPAY configuration
    $vnp_TmnCode = "MHGV26YG";
    $vnp_HashSecret = "YNZ25C7DP14IF8QR5EBEVC5GIAWU033G";
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    // Thay đổi liên kết thành https:domain.com/paymentv2/vpcpay.html khi chạy trên production (ví dụ ở đây là domain: doanhaiduy.id.vn)
    // Đối với localhost: thay đổi port 8080 thành port đang chạy (thường là 80) và thêm tên thư mục nếu đó là thư mục gốc (ở đây là ankershop)
    $vnp_Returnurl = "http://localhost:8080/ankershop/php/pages/returnvnpay.php";

    $vnp_Returnurl .= "?userId=" . urlencode($userId) . "&date=" . urlencode($date) . "&full_name=" . urlencode($full_name) . "&phone_number=" . urlencode($phone_number) . "&user_address=" . urlencode($user_address) . "&payment_method_id=" . urlencode($payment_method_id) . "&order_note=" . urlencode($order_note);

    $vnp_Params = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $totalPrice * 100,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => '127.0.0.1',
        "vnp_Locale" => "vn",
        "vnp_OrderInfo" => "Thanh toán hóa đơn",
        "vnp_OrderType" => "billpayment",
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => time(),
        "vnp_ExpireDate" => date('YmdHis', strtotime('+1 day')),
        "vnp_Bill_Mobile" => $phone_number,
        "vnp_Bill_Email" => $_SESSION['user']['email_address'],
        "vnp_Bill_FirstName" => $full_name,
        "vnp_Bill_Address" => $user_address,
        "vnp_Bill_City" => "Nha Trang",
        "vnp_Bill_Country" => "VN",
        "vnp_Inv_Phone" => $phone_number,
        "vnp_Inv_Email" => $_SESSION['user']['email_address'],
        "vnp_Inv_Customer" => $full_name,
        "vnp_Inv_Address" => $user_address,
        "vnp_Inv_Company" => "AnkerShop",
        "vnp_Inv_Taxcode" => "0101234567",
        "vnp_Inv_Type" => "I",
    );

    ksort($vnp_Params);
    $query = "";
    $i = 0;
    $hashData = "";

    foreach ($vnp_Params as $key => $value) {
        if ($i == 1) {
            $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    header('Location: ' . $vnp_Url);
    exit();
}
