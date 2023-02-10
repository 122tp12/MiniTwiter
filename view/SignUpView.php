<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;

class SignUpView extends BasicView
{
    public function Show($title=null){
        $childView="www/html/SignUp.html";
        include "www/html/layout/NoUserLayout.html";
    }
}