<?php


class Model extends connectDB
{
    public $connect;

    public function __construct()
    {
        $this->connect = $this->connect();
    }

    public function getAll($table)
    {
        $query = "SELECT * FROM ${table}";

        $result = mysqli_query($this->conn, $query);
        $data = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            mysqli_free_result($result);
        }
        return json_encode($data);
    }

    public function save($table,$data = array())
    {
        $values = array();
        foreach ($data as $key => $value) {
            $value = mysqli_real_escape_string($this->conn, $value);
            $values[] = "`$key`='$value'";
        }
        $Id = intval($data['ID']);
        $sql = "UPDATE `$table` SET " . implode(',', $values) . " WHERE ID = $Id";
        $query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));

        $Id = ($Id > 0) ? $Id : mysqli_insert_id($this->conn);
        return $Id;
    }

    public function store($table ,$data = array()){
        $values = array();
        foreach ($data as $key => $value) {
            $value = mysqli_real_escape_string($this->conn, $value);
            $values[] = "`$key`='$value'";
        }
        $sql = "INSERT INTO `$table` SET " . implode(',', $values);
        $query = mysqli_query($this->conn, $sql) or die(mysqli_error($this->conn));
        return json_encode($query);
    }

    public function get_record($table, $id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM `$table` WHERE ID=${id}";
        $query = mysqli_query($this->conn, $sql) or die(mysqli_error());
        $data = NULL;
        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_assoc($query);
            mysqli_free_result($query);
        }
        return $data;
    }
    public function delete($table,$id){
        $id = intval($id);
        $sql = "DELETE FROM `$table` WHERE id=$id";
        $query = mysqli_query($this->conn,$sql) or die(mysqli_error());
        return json_encode($sql);
    }

}