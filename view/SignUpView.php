<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;

class SignUpView extends BasicView
{
    public function Show($title=null){
        $childView="src/html/SignUp.html";
        include "src/html/layout/NoUserLayout.html";
    }
}