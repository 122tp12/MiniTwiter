<?php

namespace view;

include_once "././shared/BasicView.php";

use shared\BasicView;

class SignInView extends BasicView
{
    public function Show($title=null){
        $childView="dist/html/SignIn.html";
        include "dist/html/layout/NoUserLayout.html";
    }
}
