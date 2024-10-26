<?php
require_once './User.php';

class AuthController
{

    protected $conn;

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

    public function login($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = new User($row['id'], $row['full_name'], $row['email_address'], $row['password'], $row['phone_number'], $row['gender'], $row['user_address']);
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
    }

    public function register($fullName, $email, $password, $phoneNumber, $gender, $address)
    {
        $sql = "INSERT INTO users (full_name, email_address, password, phone_number, gender, email_address) VALUES ($fullName, $email, $password, $phoneNumber, $gender, $address)";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = new User($row['id'], $row['full_name'], $row['email_address'], $row['password'], $row['phone_number'],  $row['gender'], $row['user_address']);
            $_SESSION['user'] = $user;
            // add cart for user
            $sql = "INSERT INTO carts (user_id) VALUES ('{$user->getId()}')";

            $result = $this->conn->query($sql);

            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
