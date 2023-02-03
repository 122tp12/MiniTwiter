<?php

namespace controller;

include_once "model\TwitModel.php";
include_once "view\TwitView.php";
include_once "view\shared\DefaultLayout.php";

use model\TwitModel;
use view\TwitView;
use layout\DefaultLayout;

class TwitController extends \shared\BasicController
{
    public function __construct()
    {
        $this->model=new TwitModel();
        $this->view=new TwitView();
        $this->layout=new DefaultLayout();
    }
    public function MyTwitsPage(){
        $this->layout->Begin("My twits");
        if(isset($_SESSION["user"])){
            $this->model->Connect();
            $twits=$this->model->GetMyTwits();
            $this->view->Show($twits);
        }
        else{
            echo "<h3>Please sign in</h3>";
        }
        $this->layout->End();
    }
    public function MyTwitsPageProcAdd(){
        $this->model->Connect();
        if(!preg_match("/^.{4,60}$/",$_POST["title"]))
            $this->redirect("/main/my","Bad title");
        if(!preg_match("/^.{6,200}$/",$_POST["description"]))
            $this->redirect("/main/my","Bad description");
        $this->model->AddMyTwit($_POST["title"],$_POST["description"]);
        $this->redirect("/main/my","Twit added", "alert alert-success");
    }
    public function MyTwitsPageProcEdit(){
        $this->model->Connect();
        if(!preg_match("/^.{4,60}$/",$_POST["title"]))
            $this->redirect("/main/my","Bad title");
        if(!preg_match("/^.{6,200}$/",$_POST["description"]))
            $this->redirect("/main/my","Bad description");
        echo $_POST["id"];
        echo $_SESSION["user"];
        $this->model->EditMyTwit($_POST["id"] ,$_SESSION["user"], $_POST["title"],$_POST["description"]);
        $this->redirect("/main/my","Twit edited", "alert alert-success");
    }
}