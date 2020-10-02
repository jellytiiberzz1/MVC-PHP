<?php


class registerModel extends connectDB
{
    public function __construct()
    {
        $this->connect = $this->connect();
    }

    public function register($fullname,$email,$password,$phone){
        $query = "INSERT INTO users(fullname,email,password,phone,roles) VALUE ('$fullname','$email','$password','$phone','0')";
        $result = mysqli_query($this->conn, $query) or die(mysqli_errno());

        if ($result) {
            $_SESSION['user'] = $fullname;
            return true;
        }

        return json_encode($result);
    }
}