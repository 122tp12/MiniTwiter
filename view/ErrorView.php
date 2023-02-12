<?php

namespace view;

class ErrorView extends \shared\BasicView
{

    public function Show($title=null, $message=null)
    {
        $childView="src/html/support/Error.html";
        include "src/html/layout/NoUserLayout.html";
    }
}