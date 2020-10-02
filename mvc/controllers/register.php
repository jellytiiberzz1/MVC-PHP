<?php

class register extends Controller
{
    public $registerModel;
    public $register;

    public function __construct()
    {
        $this->registerModel = $this->model("registerModel");
        $this->register = $this->register();

    }
    public function index(){
        $this->view("login");
    }
    public function register(){
        if (isset($_POST['register'])) {
            $fullname = ($_POST['fullname']);
            $email = ($_POST['email']);
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $password2 = password_verify($_POST['password2'],$password);
            $phone = $_POST['phone'];
            if ($password == $password2) {
                $this->registerModel->register($fullname, $email, $password, $phone);
            } else {
                echo "Mật khẩu không trùng khớp";
            }


        }
        if (isset($_SESSION['user'])) {
            header("location:/project_mvc/index");
        } else {
            echo "Đăng ký thất bại";
        }
    }

}

?>
