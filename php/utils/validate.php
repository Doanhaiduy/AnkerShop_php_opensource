<?php
function regexFullName($fullName)
{
    return preg_match('/[^a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u', $fullName);
}

function regexPhoneNumber($phoneNumber)
{
    return preg_match('/(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/', $phoneNumber);
}

function regexPassword($password)
{
    return preg_match('/.{6,}/', $password);
}

function handleLimit()
{
    if (isset($_SESSION['login'])) {
        if ($_SESSION['login']['blocked']) {
            if (time() - $_SESSION['login']['time'] < 300) {
                return false;
            } else {
                $_SESSION['login'] = [
                    'times' => 1,
                    'time' => time(),
                    'blocked' => false
                ];
                return true;
            }
        }

        if ($_SESSION['login']['times'] >= 5) {
            $_SESSION['login']['blocked'] = true;
            $_SESSION['login']['time'] = time();
            return false;
        } else {
            $_SESSION['login']['times'] = $_SESSION['login']['times'] + 1;
            return true;
        }
    } else {
        $_SESSION['login'] = [
            'times' => 1,
            'time' => time(),
            'blocked' => false
        ];
        return true;
    }
}
