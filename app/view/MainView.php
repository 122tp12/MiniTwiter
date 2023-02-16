<?php

namespace view;

include_once "././shared/BasicView.php";

use shared\BasicView;

class MainView extends BasicView
{
    public function Show(Array $twits=null, $title=null, $allTwitsCount=null){
        $childView="dist/html/Main.html";
        include "dist/html/layout/DefaultLayout.html";
    }
}