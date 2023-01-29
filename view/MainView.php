<?php

namespace view;

include_once "shared\BasicView.php";

use shared\BasicView;

class MainView extends BasicView
{
    public function Show(Array $twits=null, $title=null, $allTwitsCount=null){

            echo "
            <h4 class='p-3 mx-5 px-5'>".$title."</h4>
            <div class='row d-flex justify-content-center'>
              <div class='col-md-12 col-lg-10'>
                <div class='card text-dark'>";
                  foreach ($twits as $twit){
                      echo "
                  <div class='card-body p-4'>
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
            echo "<span id='last'/></div>
                <button class='btn btn-outline-warning load-more m-2'>Load more</button>
              </div>
            </div>";
            if(isset($_GET["id"])){
                echo "<input type='hidden' id='id' value='".$_GET["id"]."'/>";
            }
            echo "
            <input type='hidden' id='row' value='0'/>
            <input type='hidden' id='all' value='".$allTwitsCount."'/>
<script type=\"text/javascript\">
$(document).ready(function(){
    $('.load-more').click(function(){
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 5;
        row = row + rowperpage;
            $(\"#row\").val(row);";
        if(isset($_GET["id"]))
            echo "var id = Number($('#id').val());";
        echo "var data={
            'row':row,";
        if(isset($_GET["id"]))
            echo "'id':id,";
        echo "};
        if(row <= allcount){

            $.ajax({
                url: 'main/load',
                type: 'post',
                data: data,
                beforeSend:function(){
            $(\".load-more\").text(\"Loading...\");
        },
                success: function(response){
                $(\"#last\").before(response).show().fadeIn(\"slow\");

                var rowno = row + rowperpage;
                if(rowno > allcount){
                    $('.load-more').remove();
                }else{
                    $(\".load-more\").text(\"Load more\");
                }

        }
            });
        }else{
                    $('.load-more').remove();
}

});

});
</script>";
        }
}