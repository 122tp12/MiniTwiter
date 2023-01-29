<?php

namespace layout;

include_once "shared\BasicLayout.php";

class DefaultLayout extends \shared\BasicLayout
{

    public function Begin($title)
    {
        echo " <html>
        <head>
            <title>".$title."</title>
            <meta charset='UTF-8'>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD' crossorigin='anonymous'>
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js' integrity='sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN' crossorigin='anonymous'></script>
            <script src='http://code.jquery.com/jquery-1.9.1.min.js'></script>
            <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js'></script>
            <link rel='stylesheet' href='view/shared/style/style.css'>
        </head>
        <body>
        <header class='p-3 text-bg-dark'>
    <div class='container'>
      <div class='d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start'>
        

        <ul class='nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0'>
          <li><a href='\main' class='nav-link px-2 text-white'>Home</a></li>
          <li><a href='\main\my' class='nav-link px-2 text-white'>My twits</a></li>
        </ul>";
        if(isset($_SESSION["username"])){
            echo "<h3 class='text-end'>".$_SESSION["username"]."</h3> <a href='\signOut'><button type='button' class='btn btn-outline-warning mx-2'>Sign out</button></a>";
        }
        else{
            echo "<div class='text-end'>
            <a href='\signIn'><button type='button' class='btn btn-outline-light me-2'>Sign in</button></a>
            <a href='\signUp'><button type='button' class='btn btn-warning'>Sign up</button></a>
            </div>";
        }
        echo "</div>
        </div>
        </header>";
    }
    public function End()
    {
        echo "</body></html>";
    }

}