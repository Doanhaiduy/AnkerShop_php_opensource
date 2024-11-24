<?php
require '../config/module.php';

$error = "";
$success = "";

$vnp_ResponseCode = $_GET['vnp_ResponseCode'];
$vnp_TxnRef = $_GET['vnp_TxnRef'];
$vnp_Amount = $_GET['vnp_Amount'] / 100;
$vnp_OrderInfo = $_GET['vnp_OrderInfo'];
$vnp_SecureHash = $_GET['vnp_SecureHash'];

$vnp_HashSecret = "YNZ25C7DP14IF8QR5EBEVC5GIAWU033G";

foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}


foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) != "vnp_") {
        $inputDataQuery[$key] = $value;
    }
}



unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$expectedSecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

if ($vnp_SecureHash === $expectedSecureHash) {
    if ($vnp_ResponseCode === '00') {
        $order = new Order(null, $inputDataQuery['userId'], date('Y-m-d H:i:s'), $inputDataQuery['full_name'], $inputDataQuery['phone_number'], $inputDataQuery['user_address'], $inputDataQuery['payment_method_id'], $inputDataQuery['order_note']);
        $result = $orderService->addOrder($order, $cartId);

        if ($result) {
            if (sendMailOrder($_SESSION['user']['email_address'], $_SESSION['user']['full_name'], $result, number_format($vnp_Amount, 0, ',', '.'))) {
                $success = "Đơn hàng của bạn đã được đặt. Mã đơn hàng: $result, Số tiền: $vnp_Amount VND.";
            }
            header("Location: $pathHome/php/pages/paymentStatus.php?status=success&vnp_amount=$vnp_Amount&vnp_TxnRef=$vnp_TxnRef");
        } else {
            $error = "Đã có lỗi xảy ra khi đặt hàng.";
            header("Location: $pathHome/php/pages/paymentStatus.php?status=failed");
        }
    } else {
        $error = "Đã có lỗi xảy ra khi thanh toán.";
        header("Location: $pathHome/php/pages/paymentStatus.php?status=failed");
    }
} else {
    header("Location: $pathHome/php/pages/paymentStatus.php?status=failed");
}
