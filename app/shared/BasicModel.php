<?php

namespace shared;

include_once "IBasicModel.php";

use PDO;

abstract class BasicModel implements IBasicModel
{
    protected $conn;
    function Connect(){
        $this->conn = new PDO("mysql:host=db;dbname=twitter;port=3306", "root", "");
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        //PDO::ATTR_EMULATE_PREPARES, FALSE);

        //if($this->conn->connect_error) {
        //    throw $this->conn->connect_error;
        //}
    }
    function RunQuery($sql, $param=null){
        $sth=$this->conn->prepare($sql);
        if($param!=null)
            $sth->execute($param);
        else
            $sth->execute();
        return $sth->fetchAll();
    }
    function getUser($id){
        return $this->RunQuery("SELECT * FROM `user` WHERE `id`= :id ",['id'=>$id]);
    }
}