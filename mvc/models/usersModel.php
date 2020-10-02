<?php


class usersModel extends Model
{


    const TABLE = "users";

    public function addUser($data = array()){
        return $this->store(self::TABLE,$data);
    }
    public function getListUsers()
    {
        return $this->getAll(self::TABLE);
    }

    public function updateUsers($data = array())
    {

        return $this->save(self::TABLE, $data);
    }

    public function getUser($id)
    {
        return $this->get_record(self::TABLE, $id);
    }

    public function delUser($id)
    {
        return $this->delete(self::TABLE, $id);
    }

}

?>
