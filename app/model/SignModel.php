<?php

namespace model;

include_once "././shared/BasicModel.php";

class SignModel extends \shared\BasicModel
{
    public function SignUp($name, $login, $password){
        $password=password_hash($password, PASSWORD_DEFAULT);
        return $this->RunQuery("INSERT INTO `user`(`name`, `login`, `password`) VALUES (:name,:login,:password)", ["name"=>$name, "login"=>$login, "password"=>$password]);
    }
    public function LoginExist($login){
        return count($this->RunQuery("SELECT * FROM `user` WHERE `login` =:login", ["login"=>$login]))>0;
    }
    public function NameExist($name){
        return count($this->RunQuery("SELECT * FROM `user` WHERE `name` =:name", ["name"=>$name]))>0;
    }
    public function SignIn($login, $password){
        $l=$this->RunQuery("SELECT `id`, `name`, `password` FROM `user` WHERE `login`=:login", ["login"=>$login]);
        if(count($l)>0){
            if(password_verify($password, $l[0][2])){
                $_SESSION["user"]=$l[0][0];
                $_SESSION["username"]=$l[0][1];
            }
        }
    }
    public function SignOut(){
        unset($_SESSION["user"]);
        unset($_SESSION["username"]);
    }
}