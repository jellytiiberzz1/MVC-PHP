<?php

class connectDB
{
    public $conn;
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "foodfast";

    function connect()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->conn, $this->dbname);
        mysqli_query($this->conn, "SET NAMES 'utf8'");
        if (!$this->conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->conn;
    }
}

?>