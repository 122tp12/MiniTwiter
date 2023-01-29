<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;

class SignInView extends BasicView
{
    public function Show(){
        echo "
            <div class='form-signin w-100 m-auto'>
    
                <form method='post' action='/signIn/proc'>
           
                <h1 class='h3 mb-3 fw-normal'>Please sign in</h1>
        
                <div class='form-floating'>
                    <input type='text' class='form-control' id='floatingInput' placeholder='Login' name='login' minlength='6' maxlength='20'>
                    <label for='floatingInput'>Login</label>
                </div>
                <div class='form-floating'>
                    <input type='password' class='form-control' id='floatingPassword' placeholder='Password' name='password' minlength='6' maxlength='20'>
                    <label for='floatingPassword'>Password</label>
                </div>
                <div class='w-100 row m-0'>
                    <button class='col btn btn-lg btn-dark btn-left' type='submit'>Sign in</button>
                    <a href='/signUp' class='col-5 btn btn-lg btn-warning btn-right'>Sign up</a>
                </div>
                </form>";
        $this->showCookieMessage();
            echo "</div>
        </div>";
    }
}
