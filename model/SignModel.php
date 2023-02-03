<?php

namespace model;

include_once "shared\BasicModel.php";

class SignModel extends \shared\BasicModel
{
    public function SignUp($name, $login, $password){
        return $this->RunQuery("INSERT INTO `user`(`name`, `login`, `password`) VALUES (:name,:login,:password)", ["name"=>$name, "login"=>$login, "password"=>$password]);
    }
    public function SignIn($login, $password){
        $l=$this->RunQuery("SELECT `id`, `name` FROM `user` WHERE `login`=:login AND `password`=:password;", ["login"=>$login,"password"=>$password]);
        $_SESSION["user"]=$l[0][0];
        $_SESSION["username"]=$l[0][1];
    }
    public function SignOut(){
        unset($_SESSION["user"]);
        unset($_SESSION["username"]);
    }
}