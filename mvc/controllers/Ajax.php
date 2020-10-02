<?php
class Ajax extends Controller{
    public $userRequest;



    public function __construct()
    {
        $this->model("usersModel");
        $this->userRequest = new usersModel();
    }

//    public function addMen(){
//        $user_add = array(
//            'fullname' => $_POST['fullname'],
//            'email' => $_POST['email'],
//            'phone' => $_POST['phone'],
//        );
//        echo $this->userRequest->addMen($user_add);
//    }

}


?>