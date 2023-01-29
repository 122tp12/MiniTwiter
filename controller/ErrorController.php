<?php

namespace controller;

use layout\NoUserLayout;

include_once "shared\BasicController.php";
include_once "view\shared\NoUserLayout.php";

class ErrorController extends \shared\BasicController
{
    public function __construct()
    {
        $this->layout=new NoUserLayout();
    }
    public function PageNotFound(){
        $this->layout->Begin("Not found");
        echo "Page not found";
        $this->layout->End();
    }
    public function ErrorPage($errorMessege){
        $this->layout->Begin("Error");
        echo $errorMessege;
        $this->layout->End();
    }
}