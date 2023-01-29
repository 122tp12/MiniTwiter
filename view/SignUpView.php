<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;

class SignUpView extends BasicView
{
    public function Show(){
        echo "
            <div class='form-signin w-100 m-auto'>
    
                <form method='post' action='/signUp/proc'>
           
                <h1 class='h3 mb-3 fw-normal'>Please sign up</h1>
        
                <div class='form-floating'>
                    <input type='text' class='form-control' id='floatingInput' placeholder='Login' name='login' minlength='6' maxlength='20'>
                    <label for='floatingInput'>Login</label>
                </div>
                
                <div class='form-floating'>
                    <input type='text' class='form-control' id='floatingName' placeholder='Name' name='name' minlength='3' maxlength='20'>
                    <label for='floatingName'>Name</label>
                </div>
                
                <div class='form-floating'>
                    <input type='password' class='form-control' id='floatingPassword' placeholder='Password' name='password' minlength='6' maxlength='20'>
                    <label for='floatingPassword'>Password</label>
                </div>
                 <div class='w-100 row m-0'>
                    <button class='col btn btn-lg btn-warning btn-left' type='submit'>Sign up</button>
                    <a href='/signIn' class='col-5 btn btn-lg btn-dark px-0 btn-right'>Sign in</a>
                </div>
                
                </form>";
        $this->showCookieMessage();
        echo "</div>
        </div>";
    }
}