$(document).ready(function(){
    

   /* if(get_cookie("id_cookie")){
        //var idd = get_cookie("id_cookie");
        //alert(id);
        var idd = 1;
        $.ajax({
            url: 'index.php',
            data: 'idd='+idd,
            type: 'get',
            success: function(html){
                $("#content").html(html).hide().fadeIn(500);


            }
        });
    }*/


    $(".input").click(function(){
        var idd = $(this).attr('id');
        //alert(id);
        $.ajax({
            url: 'index.php',
            data: 'idd='+idd,
            type: 'get',
            success: function(html){
                $("#content").html(html).hide().fadeIn(500);


            }
        });
    });

});