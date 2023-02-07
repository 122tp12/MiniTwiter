<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;
class TwitView extends BasicView
{

    public function Show(Bool $signed=null, $title=null, Array $twits=null)
    {
        if($signed)
            include "www/html/Twit.html";
        else
            include "www/html/support/PleaseSignIn.html";
    }
}