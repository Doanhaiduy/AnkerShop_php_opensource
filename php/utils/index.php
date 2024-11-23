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

function sendMailOrder($to, $customerName, $orderNumber, $totalAmount)
{
    // thay đổi dòng 143 thành domain hoặc localhost có cổng đang chạy (ví dụ: localhost:8080/ankershop hoặc doanhaiduy.id.vn hoặc localhost/ankershop)
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
                <a href="http://localhost:8080/php/pages/order.php"
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

function sendMailVerify($to, $customerName, $urlVerify)
{
    $body = '
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Xác minh tài khoản Anker Shop</title>
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
            .verify-btn {
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
            .verify-btn:hover {
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
        <table class="content" width="600" cellpadding="0" cellspacing="0" align="center">
            <tr>
                <td class="header">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKlFBglCdwGEGaL74Nujdg8C8qN4Lm1qJ8Hw&s" alt="Anker Shop" class="logo">
                    Xác minh tài khoản
                </td>
            </tr>
            <tr>
                <td class="body">
                    <h2>Chào mừng, ' . htmlspecialchars($customerName) . '!</h2>
                    <p>Cảm ơn bạn đã đăng ký tài khoản tại Anker Shop.</p>
                    <p>Vui lòng xác minh tài khoản của bạn bằng cách nhấn vào nút dưới đây:</p>
                    <a href="' . htmlspecialchars($urlVerify) . '" class="verify-btn" target="_blank">Xác minh tài khoản</a>
                    <p>Nếu bạn không yêu cầu tạo tài khoản, vui lòng bỏ qua email này.</p>
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
    $mail->Subject = "Xác nhận tài khoản của bạn! 🎉";
    $mail->MsgHTML($body);
    if (!$mail->Send()) {
        echo "Lỗi gửi mail: " . $mail->ErrorInfo;
        return false;
    } else {
        return true;
    }
}


function generateToken($email)
{
    $secretKey = "395e7995b1360b7df3e56f3e19ddc364"; // secret key duy nhất (không được tiết lộ)
    return hash_hmac('sha256', $email, $secretKey);
}


function verifyToken($email, $token)
{
    return $token === generateToken($email);
}
