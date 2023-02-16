<?php

namespace view;

include_once "././shared/BasicView.php";

use shared\BasicView;
class TwitView extends BasicView
{

    public function Show(Bool $signed=null, $title=null, Array $twits=null)
    {
        if($signed) {
            $childView = "dist/html/Twit.html";
            include_once "dist/html/layout/DefaultLayout.html";
        }
        else {
            $childView = "dist/html/support/PleaseSignIn.html";
            include_once "dist/html/layout/DefaultLayout.html";
        }
    }
}