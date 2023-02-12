<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;

class SignInView extends BasicView
{
    public function Show($title=null){
        $childView="src/html/SignIn.html";
        include "src/html/layout/NoUserLayout.html";
    }
}
