<?php

namespace shared;

abstract class BasicController implements IBasicController
{
    protected $view;
    protected $layout;
    protected $model;
    public function redirect($address ,$message = null, $styleOfMessage=null)
    {
        if($message!=null) {
            $_SESSION["message"]= $message;
            if($styleOfMessage!=null){
                $_SESSION["class"]= $styleOfMessage;
            }
        }
        header('Location: '.$address, true, 303);
        die();
    }
}