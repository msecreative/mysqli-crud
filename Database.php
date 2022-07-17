<?php

include "config.php";


class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB(){
        $this->link = new mysqli($this->host,$this->user, $this->pass,$this->dbname);

        if (!$this->link) {
            $this->error = "Connection Fail.".$this->link->connect_error;
            return false;
        }
    }

    // Read Data

    public function select($sql){
        $result = $this->link->query($sql) or die ($this->link->error.__LINE__);
        if ($result->num_rows > 0) {
            return $result;
        }else{
            return false;
        }
    }

    // insert data

    public function insert($sql){
        $insert_row = $this->link->query($sql) or die ($this->link->error.__LINE__);
        if ($insert_row) {
            header("Location: index.php?msg=".urldecode('Data Inserted Successfully'));
            exit();
        }else{
            die("Error: ('.$this->link->errno.')".$this->link->error);
        }
    }
    // update data

    public function update($sql){
        $update_row = $this->link->query($sql) or die ($this->link->error.__LINE__);
        if ($update_row) {
            header("Location: index.php?msg=".urldecode('Data Updated Successfully'));
            exit();
        }else{
            die("Error: ('.$this->link->errno.')".$this->link->error);
        }
    }
    // delete data

    public function delete($sql){
        $delete_row = $this->link->query($sql) or die ($this->link->error.__LINE__);
        if ($delete_row) {
            header("Location: index.php?msg=".urldecode('Data Deleted Successfully'));
            exit();
        }else{
            die("Error: ('.$this->link->errno.')".$this->link->error);
        }
    }
}//Database class end