<?php

namespace controller;

include_once "././model/TwitModel.php";
include_once "././view/TwitView.php";

use model\TwitModel;
use view\TwitView;

class TwitController extends \shared\BasicController
{
    public function __construct()
    {
        $this->model=new TwitModel();
        $this->view=new TwitView();
    }
    public function MyTwitsPage(){
        if(isset($_SESSION["user"])){
            $this->model->Connect();
            $twits=$this->model->GetMyTwits();
            $this->view->Show(true, "My twits", $twits);
        }
        else{
            $this->view->Show(false, "Please sign in");
        }
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
        $this->model->EditMyTwit($_POST["id"] ,$_SESSION["user"], $_POST["title"],$_POST["description"]);
        $this->redirect("/main/my","Twit edited", "alert alert-success");
    }
}