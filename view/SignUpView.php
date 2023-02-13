<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;

class SignUpView extends BasicView
{
    public function Show($title=null){
        $childView="dist/html/SignUp.html";
        include "dist/html/layout/NoUserLayout.html";
    }
}