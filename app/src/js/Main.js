$(document).ready(function(){
    $('.load-more').click(function(){
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        var rowperpage = 5;
        row = row + rowperpage;
        $("#row").val(row);
        var id = Number($('#id').val());
        var data={
            'row':row,
            'id':id,
        };
        if(row < allcount){

            $.ajax({
                url: 'main/load',
                type: 'post',
                data: data,
                beforeSend:function(){
                    $(".load-more").text("Loading...");
                },
                success: function(response){
                    $("#last").before(response).show().fadeIn("slow");

                    var rowno = row + rowperpage;
                    if(rowno >= allcount){
                        $('.load-more').remove();
                    }else{
                        $(".load-more").text("Load more");
                    }

                },
                error: function () {
                    $('.load-more').remove();
                }
            });
        }else{
            $('.load-more').remove();
        }

    });

});