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
     document.getElementById('plzun').oninput = gener;
     function gener(){
         var value_polzun = document.getElementById('value_polzun');
         value_polzun.innerHTML = this.value;
         var val = this.value;
         console.log(this.value);
         $.ajax({
            url: 'index.php',
            data: 'val='+val,
            type: 'get',
            success: function(html){
                $("#wrapper").html(html).hide().slideToggle(200);


            }
        });
     }
 
 
     $(".input").click(function(){
         var idd = $(this).attr('id');
         //alert(id);
         $.ajax({
             url: 'index.php',
             data: 'idd='+idd,
             type: 'get',
             success: function(html){
                 $("#wrapper").html(html).hide().slideToggle(500);
 
 
             }
         });
     });
 
 });