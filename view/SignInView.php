<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;

class SignInView extends BasicView
{
    public function Show($title=null){
        include_once "www/html/SignIn.html";
    }
}
