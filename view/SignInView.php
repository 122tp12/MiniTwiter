<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;

class SignInView extends BasicView
{
    public function Show($title=null){
        $childView="www/html/SignIn.html";
        include "www/html/layout/NoUserLayout.html";
    }
}
