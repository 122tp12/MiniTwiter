<?php

namespace shared;

include_once "IBasicModel.php";

use mysqli;

abstract class BasicModel implements IBasicModel
{
    protected $conn;
    function Connect($database){
        $this->conn = new mysqli("localhost", "root", "", $database);
        if($this->conn->connect_error) {
            return $this->conn->connect_error;
        }
    }
    function CloseConnection(){
        $this->conn->close();
    }
    function RunQuery($sql){
        if($result = $this->conn->query($sql)){
            return $result;
        } else{
            return $this->conn->connect_error;
        }
    }
    function getUser($id){
        $users = $this->RunQuery("SELECT * FROM `user` WHERE `id`=".$id);
        return $users->fetch_array();
    }
}