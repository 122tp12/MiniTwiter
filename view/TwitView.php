<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;
class TwitView extends BasicView
{

    public function Show(Bool $signed=null, $title=null, Array $twits=null)
    {
        if($signed) {
            $childView = "www/html/Twit.html";
            include_once "www/html/layout/DefaultLayout.html";
        }
        else {
            $childView = "www/html/support/PleaseSignIn.html";
            include_once "www/html/layout/DefaultLayout.html";
        }
    }
}