<?php

class logout extends Controller
{
    public function __construct()
    {
        session_destroy();
        header("location:/project_mvc/login");
    }
}


?>
