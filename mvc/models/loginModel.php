<?php

class loginModel extends connectDB
{
    public $connect;
    public function __construct()
    {
        $this->connect = $this->connect();
    }

    public function login_admin($email)
    {
        $query = "SELECT * FROM users WHERE email = '$email'LIMIT 0,1";
        $result = mysqli_query($this->conn, $query) or die(mysqli_errno());
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
        return json_encode($result);
    }
}


?>