<?php

namespace view;

class ErrorView extends \shared\BasicView
{

    public function Show($title=null, $message=null)
    {
        $childView="dist/html/support/Error.html";
        include "dist/html/layout/NoUserLayout.html";
    }
}