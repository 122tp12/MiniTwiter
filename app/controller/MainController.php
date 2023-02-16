<?php

namespace controller;

use model\MainModel;
use view\MainView;

include_once '././shared/IBasicController.php';
include_once '././shared/BasicController.php';
include_once '././view/MainView.php';
include_once '././model/MainModel.php';

class MainController extends \shared\BasicController
{

    public function __construct()
    {
        $this->view=new MainView();
        $this->model=new MainModel();
    }

    public function Main()
    {
        $this->model->Connect();

        if(isset($_GET["id"])) {
            $twits = $this->model->GetTwitsOfUser(0, $_GET["id"]);
            $this->view->Show($twits, "Twits of " . $this->model->getUser($_GET["id"])[0]["name"], $this->model->GetAllTwitsCount($_GET["id"]));
        }
        else {
            $twits = $this->model->GetTwits(0);
            $this->view->Show($twits, "Recent Twits", $this->model->GetAllTwitsCount());
        }
    }
    public function LoadMore()
    {
        $this->model->Connect();
        if($_POST["id"]=="NaN"||!isset($_POST["id"])){
            $twits = $this->model->GetTwits($_POST["row"]);
        }
        else{
            $twits = $this->model->GetTwitsOfUser($_POST["row"], $_POST["id"]);
        }
        foreach ($twits as $twit){
            include "dist/html/support/MainLoadMoreElement.html";
        }
    }
}