<?php

namespace controller;

use view\ErrorView;

include_once "shared\BasicController.php";
include_once "view\ErrorView.php";

class ErrorController extends \shared\BasicController
{
    public function __construct()
    {
        $this->view=new ErrorView();
    }
    public function PageNotFound(){
        $this->view->Show("Not found", "Page not found");
    }
    public function ErrorPage($errorMessege){
        $this->view->Show("Error", $errorMessege);
    }
}