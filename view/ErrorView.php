<?php

namespace view;

class ErrorView extends \shared\BasicView
{

    public function Show($title=null, $message=null)
    {
        $childView="www/html/support/Error.html";
        include "www/html/layout/NoUserLayout.html";
    }
}