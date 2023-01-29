<?php

namespace controller;

use layout\NoUserLayout;
use model\SignModel;
use view\SignInView;
use view\SignUpView;

include_once 'shared\IBasicController.php';
include_once 'shared\BasicController.php';
include_once 'model\SignModel.php';
include_once 'view\SignInView.php';
include_once 'view\SignUpView.php';
include_once 'view\shared\NoUserLayout.php';

class SignController extends \shared\BasicController
{
    public function __construct()
    {
        $this->model=new SignModel();
        $this->layout=new NoUserLayout();
    }
    public function SignIn()
    {
        $this->layout->Begin("Sign in");
        $this->view=new SignInView();
        $this->view->Show();
        $this->layout->End();
    }
    public function SignInProc(){
        if(!preg_match("/^(?=.{6,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/",$_POST["login"]))
            $this->redirect("/signIn","Bad login");
        if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,20}$/",$_POST["password"]))
            $this->redirect("/signIn","Bad password");

        $this->model->Connect("twitter");
        $this->model->SignIn($_POST["login"],$_POST["password"]);
        $this->model->CloseConnection();
        if(isset($_SESSION["user"]))
            $this->redirect("/main");
        else
            $this->redirect("/signIn", "Wrong login or password");
    }

    public function SignUp(){
        $this->layout->Begin("Sign up");
        $this->view=new SignUpView();
        $this->view->Show();
        $this->layout->End();
    }
    public function SignUpProc(){

        if(!preg_match("/^(?=.{6,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/",$_POST["login"]))
            $this->redirect("/signUp","Bad login");
        if(!preg_match("/^[a-zA-z].[a-zA-z0-9]{3,20}$/",$_POST["name"]))
            $this->redirect("/signUp","Bad name");
        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,20}$/",$_POST["password"]))
            $this->redirect("/signUp","Bad password");

        $this->model->Connect("twitter");
        $result=$this->model->SignUp($_POST["name"],$_POST["login"],$_POST["password"]);
        $this->model->CloseConnection();
        if($result){
            $this->redirect("/signIn");
        }
        else{
            $this->redirect("/signUp","Something wrong");
        }
    }
    public function SignOut()
    {
        $this->model->SignOut();
        $this->redirect("/main");
    }
}