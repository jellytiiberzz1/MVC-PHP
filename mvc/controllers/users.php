<?php


class users extends Controller
{
    public $usersModel;

    public function __construct()
    {
        $this->model("usersModel");
        $this->usersModel = new usersModel();

    }


    public function index()
    {
        $list_users = $this->usersModel->getListUsers();
        $json = json_decode($list_users, true);
        $this->view("pages/user",
            $data = $json);
    }

    public function create()
    {
        $uploadDir = "public/library/upload/";
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $convert = date("Y-m-d-H-i-s", time());
        $fileUpload = $uploadDir . $convert . '-' . ($_FILES['image']['name']);
        if (isset($_FILES)) {
            if ($_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/gif') {
                if ($_FILES['image']['size'] <= 1048576) {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $fileUpload)) {
                        $create = $_POST;
                        $create['image'] = $convert. '-' .$_FILES['image']['name'];
                        $save = $this->usersModel->addUser($create);
                    } else {
                        echo "Upload không thành công";
                    }
                } else {
                    echo "FIle upload <= 1MB";
                }
            } else {
                echo "File upload không phải file hình ảnh";
            }
        } else {
            echo "Bạn chưa chọn file";
        }
    }

    public function edit($id)
    {
        $user = $this->usersModel->getUser($id);
        $json = json_encode(['user' => $user]);
        echo $json;
    }


    public function update($id)
    {

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $convert = date("Y-m-d-H-i-s", time());
        $update = $_POST;
        if (($_FILES['image']['name'])) {
            $uploadDir = "public/library/upload/";
            $fileUpload = $uploadDir . $convert . '-' . ($_FILES['image']['name']);
            if ($_FILES['image']['type'] == 'image/jpg' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/gif') {
                if ($_FILES['image']['size'] <= 1048576) {
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $fileUpload)) {
                        $update['image'] = $convert. '-' .$_FILES['image']['name'];
                        if (file_exists($uploadDir.$_FILES['image']['name'])){
                            unlink($uploadDir.$_FILES['image']['name']);
                        }

                    } else {
                        echo "Upload không thành công";
                    }
                } else {
                    echo "FIle upload <= 1MB";
                }
            } else {
                echo "File upload không phải file hình ảnh";
            }
        } else {
            $user = $this->usersModel->getUser($id);
            $update['image'] = $user['image'];

        }
        $json = json_encode($update);
        $save = $this->usersModel->updateUsers($update);
        echo $json;

    }

    public function delete($id)
    {
        $user = $this->usersModel->delUser($id);
        $user = json_encode(['user' => $user]);
        echo $user;
    }

}