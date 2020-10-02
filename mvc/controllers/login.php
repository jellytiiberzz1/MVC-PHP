<?php

class login extends Controller
{

    public $loginModel;
    public $registerModel;


    public function __construct()
    {

        $this->loginModel = $this->model("loginModel");
        $this->registerModel = $this->model("registerModel");

    }

    public function index()
    {
        if (isset($_SESSION['user'])) {
            $this->view('index');
        } else
            $this->view("login");

    }

    public function login_admin()
    {
        
        if (!empty($_POST)) {
            $emailRequest = $_POST['email'];
            $passwordRequest = $_POST['password'];
            $login = $this->loginModel->login_admin($emailRequest);
            if (!empty($emailRequest || $passwordRequest)) {
                if ($emailRequest === $login['email']) {
                    if (password_verify($passwordRequest, $login['password'])) {
                        $_SESSION['user'] = $login;
                    }
                }
            }

        }
        if (isset($_SESSION['user'])) {
            header("location:/project_mvc/index");
        } else {
            echo "Mật Khẩu hoặc tài khoản không hợp lệ.<br/>";
        }
    }


}


?>
