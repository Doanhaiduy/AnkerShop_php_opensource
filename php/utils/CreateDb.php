<?php
class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $con;

    // class constructor
    public function __construct(
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
        $this->con = mysqli_connect($servername, $username, $password);

        // check connection
        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // create database
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        if (mysqli_query($this->con, $sql)) {
            $this->con = mysqli_connect($servername, $username, $password, $dbname);

            return $this->con;
        } else {
            return false;
        }
    }
}
