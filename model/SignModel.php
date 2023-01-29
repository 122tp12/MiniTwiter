<?php

namespace model;

include_once "shared\BasicModel.php";

class SignModel extends \shared\BasicModel
{
    public function SignUp($name, $login, $password){
        return $this->RunQuery("INSERT INTO `user`(`name`, `login`, `password`) VALUES (\"".$name."\",\"".$login."\",\"".$password."\")");
    }
    public function SignIn($login, $password){
        $l=$this->RunQuery("SELECT `id`, `name` FROM `user` WHERE `login`=\"".$login."\" AND `password`=\"".$password."\";");
        if($l->num_rows==1){
            $user= $l->fetch_array();
            $_SESSION["user"]=$user[0];
            $_SESSION["username"]=$user[1];
        }
    }
    public function SignOut(){
        unset($_SESSION["user"]);
        unset($_SESSION["username"]);
    }
}