<?php

namespace controller;

use layout\DefaultLayout;
use layout\NoUserLayout;
use model\MainModel;
use view\MainView;

include_once 'shared\IBasicController.php';
include_once 'shared\BasicController.php';
include_once 'view\shared\DefaultLayout.php';
include_once 'view\MainView.php';
include_once 'model\MainModel.php';

class MainController extends \shared\BasicController
{

    public function __construct()
    {
        $this->view=new MainView();
        $this->layout=new DefaultLayout();
        $this->model=new MainModel();
    }

    public function Main()
    {

        $this->layout->Begin("Twitter");
        $this->model->Connect();
        if(isset($_GET["page"]))
            $page=$_GET["page"];
        else
            $page=0;

        if(isset($_GET["id"])) {
            $twits = $this->model->GetTwitsOfUser($page, $_GET["id"]);
            $this->view->Show($twits, "Twits of " . $this->model->getUser($_GET["id"])[0]["name"], $this->model->GetAllTwitsCount($_GET["id"])[0]);
        }
        else {
            $twits = $this->model->GetTwits($page);
            $this->view->Show($twits, "Recent Twits", $this->model->GetAllTwitsCount()[0]);
        }
        $this->layout->End();
    }
    public function LoadMore()
    {
        $this->model->Connect();
        if(isset($_POST["id"])){
            $twits = $this->model->GetTwitsOfUser($_POST["row"], $_POST["id"]);
        }
        else{
            $twits = $this->model->GetTwits($_POST["row"]);
        }
        foreach ($twits as $twit){
            echo "<div class='card-body p-4'>
                    <div class='d-flex flex-start'>
                      <div>
                        <h6 class='fw-bold mb-1'>".$twit->title."</h6>
                        <div class='d-flex align-items-center mb-3'>
                            <p class='mb-0'>
                            <a href='/main?id=".$twit->userId."'>@".$twit->userName."</a> &#8226; ".$twit->date."
                            </p>  
                        </div>
                        <p class='mb-0'>
                            ".$twit->text."
                        </p>
                      </div>
                    </div>
                  </div>
                  <hr class='my-0'>";
        }
    }
}