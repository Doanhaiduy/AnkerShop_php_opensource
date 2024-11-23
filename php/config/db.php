<?php
class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $conn;
    // class constructor
    public function __construct(
        // Thay đổi thông tin kết nối tại đây
        $dbname = "ankershop",
        $servername = "localhost",
        $username = "root",
        $password = ""
    ) {
        $this->dbname = $dbname;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // create connection
        $this->conn = mysqli_connect($servername, $username, $password);

        // check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // create database
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        if (mysqli_query($this->conn, $sql)) {
            $this->conn = mysqli_connect($servername, $username, $password, $dbname);

            return $this->conn;
        } else {
            return false;
        }
    }
}

$db = new CreateDb("ankershop");
$conn = $db->conn;
