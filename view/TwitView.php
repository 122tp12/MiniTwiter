<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;
class TwitView extends BasicView
{

    public function Show(Array $twits=null)
    {
        echo "<div class='container'>
  <form action='/main/my/add' method='post'>
  <div class='form-group'>
    <label for='exampleInputTitle1'>Title</label>
    <input type='text' class='form-control' id='exampleInputTitle1' placeholder='Enter title' name='title' minlength='4' maxlength='60'>
  </div>
  <div class='form-group'>
    <label for='inputDescription1'>Description</label>
    <textarea  type='text' class='form-control' id='inputDescription1' placeholder='Description' name='description' row='3' minlength='6' maxlength='200'></textarea>
  </div>
  <button type='submit' class='btn btn-primary m-1'>Add</button>
</form>
</div>
        <hr/>";

        $this->showCookieMessage();

        echo "
            <h4 class='mx-5 px-5'>Your twits</h4>
            <p class='mx-5 px-5'>Double click to edit</p>
            
            <div class='row d-flex justify-content-center'>
              <div class='col-md-12 col-lg-10'>
                <div class='card text-dark'>";
        foreach ($twits as $twit){
            echo "<span class='on-db'>
                     <div class='card-body p-4'>
                        <div class='d-flex flex-start'>
                          <div>
                            <span>
                                <h6 class='fw-bold mb-1'>".$twit->title."</h6>
                            </span>
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
                      
                      <form action='/main/my/edit' method='post' hidden>
                      <input type='hidden' name='id' value='".$twit->twitId."' />
                      <div class='card-body p-4'>
                        <div class='d-flex flex-start'>
                          <div>
                             <input type='text' name='title' class='fw-bold mb-1 form-control' value='".$twit->title."' minlength='4' maxlength='60'/>
                            <div class='d-flex align-items-center mb-3'>
                                <p class='mb-0'>
                                <a href='/main?id=".$twit->userId."'>@".$twit->userName."</a> &#8226; ".$twit->date."
                                </p>  
                            </div>
                                <textarea type='text' class='mb-0 form-control' name='description' row='3' minlength='6' maxlength='200'>".$twit->text."</textarea>
                                <br/>
                          <input type='submit' name='edit' class='btn btn-primary m-1'/>
                            
                          </div>
                        </div>
                      </div>
                </form>
                </span>
                  <hr class='my-0'>
                  ";
        }
        echo "</div>
              </div>
            </div>
            
            <script type=\"text/javascript\">
                $(document).ready(function(){
                    $('.on-db').dblclick(function() {
                        var domElement = $( this ).get( 0 );
                        if(domElement.firstElementChild.hidden==''){
                            domElement.firstElementChild.setAttribute('hidden', true);
                            domElement.lastElementChild.removeAttribute('hidden');
                        }
                        else{
                            domElement.lastElementChild.setAttribute('hidden', true);
                            domElement.firstElementChild.removeAttribute('hidden');
                        }
                        
                    });
                });
            </script>";
    }
}