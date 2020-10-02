<?php

class index extends Controller
{
    public function index(){
        if(isset($_SESSION["user"])){
            $user = $_SESSION['user'];
        $this->view("index",$data = $user);
        }else header("location:login");
    }

}

?>