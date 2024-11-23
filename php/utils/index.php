<?php
include '../../PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "smtp.gmail.com";
$mail->CharSet = "UTF-8";
$mail->SMTPAuth = true;
$mail->Username = "facebook.backvia99@gmail.com";
$mail->Password = "clsk cmiq bujt tzav";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;

function sendMail($to, $customerName, $orderNumber, $totalAmount)
{
    $body = '
    <!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng từ Anker Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .content {
            width: 600px;
            max-width: 100%;
            margin: 20px auto;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #00a4e1;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 24px;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            width: 100px;
            margin-bottom: 10px;
            border-radius: 12px;
        }

        .body {
            padding: 30px;
            font-size: 16px;
            line-height: 1.6;
            color: #333333;
        }

        .body h2 {
            color: #00a4e1;
            font-size: 22px;
        }

        .order-details {
            margin: 20px 0;
            border-top: 1px solid #e0e0e0;
            padding-top: 10px;
        }

        .order-details p {
            margin: 5px 0;
        }

        .track-order-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #00a4e1;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .track-order-btn:hover {
            background-color: #008bb3;
        }

        .footer {
            background-color: #333333;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 14px;
        }

        @media screen and (max-width: 600px) {
            .content {
                width: 100% !important;
                padding: 10px !important;
            }
        }
    </style>
</head>

<body>
    <table class="content" width="600" cellpadding="0" cellspacing="0"
        align="center">
        <tr>
            <td class="header">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKlFBglCdwGEGaL74Nujdg8C8qN4Lm1qJ8Hw&s"
                    alt="Anker Shop" class="logo">
                Cảm ơn bạn đã đặt hàng!
            </td>
        </tr>
        <tr>
            <td class="body">
                <h2>Xác nhận đơn hàng</h2>
                <p>Xin chào <strong>' . htmlspecialchars($customerName) .
        '</strong>,</p>
                <p>Cảm ơn bạn đã mua sắm tại Anker Shop! Đơn hàng của bạn đã
                    được xác nhận và đang trong quá trình xử lý.</p>
                <div class="order-details">
                    <p><strong>Mã đơn hàng:</strong> ' .
        htmlspecialchars($orderNumber) . '</p>
                    <p><strong>Tổng tiền:</strong> ' .
        htmlspecialchars($totalAmount) . ' VND</p>
                </div>
                <p>Bạn có thể theo dõi tình trạng đơn hàng của mình tại liên kết
                    dưới đây:</p>
                <a href="https://yourwebsite.com/track-order?order=' . urlencode($orderNumber) . '"
                    class="track-order-btn">Theo dõi đơn hàng</a>
                <p>Nếu bạn có bất kỳ câu hỏi hoặc cần hỗ trợ, vui lòng liên hệ
                    với chúng tôi qua email <a
                        href="mailto:haiduytbt2k3@gmail.com">
                        ankershop@gmail.com </a> hoặc số điện thoại <a
                        href="tel:0399998943">0399998943</a>.
                </p>
                <!-- vui lòng không trả lời email này -->

                <p>
                    <strong>Lưu ý:</strong> Đây là email tự động, vui lòng không
                    trả lời email này.
                </p>

                <p>Xin cảm ơn!</p>
            </td>
        </tr>
        <tr>
            <td class="footer">
                &copy; 2024 Anker Shop. Bảo lưu mọi quyền.
            </td>
        </tr>
    </table>
</body>

</html>
    ';

    global $mail;
    $mail->SetFrom("no-reply@noreply.ankershop.com", "Anker Shop");
    $mail->AddAddress($to);
    $mail->Subject = "Xác nhận đơn hàng của bạn! 🎉";
    $mail->MsgHTML($body);
    if (!$mail->Send()) {
        echo "Lỗi gửi mail: " . $mail->ErrorInfo;
        return false;
    } else {
        return true;
    }
}
