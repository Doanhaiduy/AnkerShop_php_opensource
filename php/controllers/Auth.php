<?php
include_once '../models/User.php';
session_start();

class AuthController

{

    protected $conn;
    protected $timeout = 1800; // 30 minutes

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }

    public function user()
    {
        return $_SESSION['user'];
    }

    public function getCartId($userId)
    {
        $sql = "SELECT id FROM shopping_cart WHERE user_id = $userId";
        $result = @mysqli_query($this->conn, $sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['id'];
        } else {
            return false;
        }
    }

    public function checkEmailAlreadyExists($email)
    {
        $sql = "SELECT * FROM user WHERE email_address = '$email'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        // lowercase email
        $email = strtolower($email);

        $sql = "SELECT * FROM user WHERE email_address = '$email'";

        $result = @mysqli_query($this->conn, $sql);

        if ($result) {
            $row = $result->fetch_assoc();
            if (!$row) {
                return false;
            }

            $user = new User($row['id'], $row['full_name'], $row['email_address'], $row['password'], $row['phone_number'], $row['gender'], $row['user_address'], $row['verified']);

            if ($user->getVerified() == 0) {
                return "not_verified";
            }

            if (password_verify($password, $user->getPassword()) && $user->getEmail() == $email) {
                $idCart = $this->getCartId($user->getId());

                $_SESSION['expire'] = time() + $this->timeout;
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'full_name' => $user->getFullName(),
                    'email_address' => $user->getEmail(),
                    'phone_number' => $user->getPhoneNumber(),
                    'user_address' => $user->getAddress(),
                    'cart_id' => $idCart
                ];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    // settimeout cho session: https://stackoverflow.com/questions/520237/how-do-i-expire-a-php-session-after-30-minutes

    public function register($fullName, $email, $password, $phoneNumber, $gender = 1, $address)
    {
        $email = strtolower($email);

        $sql = "INSERT INTO user (full_name, email_address, password, phone_number, gender, user_address) VALUES ('$fullName', '$email', '$password', '$phoneNumber', '$gender', '$address')";

        $result = @mysqli_query($this->conn, $sql);


        if ($result) {
            $sql = "SELECT * FROM user WHERE email_address = '$email' AND password = '$password'";
            $result = @mysqli_query($this->conn, $sql);

            $row = $result->fetch_assoc();

            $user = new User($row['id'], $row['full_name'], $row['email_address'], $row['password'], $row['phone_number'],  $row['gender'], $row['user_address']);

            $sql = "INSERT INTO shopping_cart (user_id) VALUES ('{$user->getId()}')";

            $result = @mysqli_query($this->conn, $sql);

            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function verifyEmail($email)
    {
        $sql = "UPDATE user SET verified = 1 WHERE email_address = '$email'";
        $result = @mysqli_query($this->conn, $sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checkVerify($email)
    {
        $sql = "SELECT verified FROM user WHERE email_address = '$email'";
        $result = @mysqli_query($this->conn, $sql);

        if ($result) {
            $row = $result->fetch_assoc();
            if ($row['verified'] == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
    }
}
