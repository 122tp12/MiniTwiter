<?php

namespace shared;

include_once "IBasicView.php";
abstract class BasicView implements IBasicView
{

    public abstract function Show();
    protected function showCookieMessage(){
        if(isset($_SESSION["message"])){
            if(isset($_SESSION["class"]))
                echo "<div class='".$_SESSION["class"]."' role='alert'>" . $_SESSION["message"] . "</div>";
            else
                echo "<div class='alert alert-danger' role='alert'>" . $_SESSION["message"] . "</div>";
            unset($_SESSION["message"]);
        }
    }
}