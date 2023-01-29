<?php

namespace shared;

use controller\ErrorController;

include_once "controller\MainController.php";
include_once "controller\SignController.php";
include_once "controller\ErrorController.php";
include_once "controller\TwitController.php";
class Router implements IRouter
{
    private $routes;
    function __construct() {

    }
    public function AddRoute(string $address, $controller, $action){
        $this->routes[$address]=["controller"=>$controller,"action"=>$action];
    }
    public function Run(string $request){
        $keys=array_keys($this->routes);
        $found=false;
        foreach ($keys as $key){
            if(preg_match($key, $request)){
                $controller=new $this->routes[$key]["controller"]();
                $action=$this->routes[$key]["action"];
                if (method_exists($controller, $action))
                {
                    try {
                        $controller->$action();
                    }
                    catch (Exception $e) {
                        $controller=new ErrorController();
                        $controller->ErrorPage($e->getMessage());
                    }
                    $found=true;
                }
            }
        }
        if(!$found){
            $controller=new ErrorController();
            $controller->PageNotFound();
        }
    }
}