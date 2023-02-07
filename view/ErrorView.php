<?php

namespace view;

class ErrorView extends \shared\BasicView
{

    public function Show($title=null, $message=null)
    {
        include_once "www/html/support/Error.html";
    }
}