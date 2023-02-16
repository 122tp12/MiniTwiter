<?php
include_once './shared/IRouter.php';
include_once './shared/Router.php';


session_start();
$router=new \shared\Router();
$router->AddRoute("/^(\/)$/", \controller\MainController::class, "Main");
$router->AddRoute("/^(\/main(?(?=\?).+|))$/", \controller\MainController::class, "Main");
$router->AddRoute("/^(\/main\/load)$/", \controller\MainController::class, "LoadMore");
$router->AddRoute("/^(\/signIn)$/", \controller\SignController::class, "SignIn");
$router->AddRoute("/^(\/signIn\/proc)/", \controller\SignController::class, "SignInProc");
$router->AddRoute("/^(\/signUp)$/", \controller\SignController::class, "SignUp");
$router->AddRoute("/^(\/signUp\/proc)/", \controller\SignController::class, "SignUpProc");
$router->AddRoute("/^(\/signOut)$/", \controller\SignController::class, "SignOut");
$router->AddRoute("/^(\/main\/my)$/", \controller\TwitController::class, "MyTwitsPage");
$router->AddRoute("/^(\/main\/my\/add)$/", \controller\TwitController::class, "MyTwitsPageProcAdd");
$router->AddRoute("/^(\/main\/my\/edit)$/", \controller\TwitController::class, "MyTwitsPageProcEdit");


$request=strval($_SERVER['REQUEST_URI']);
$router->Run($request);