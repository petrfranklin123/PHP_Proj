//$(document).ready(function(){
    

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
   /*  document.getElementById('plzun').oninput = gener;
     function gener(){
        // var out = document.getElementById('r1');
        // out.innerHTML = this.value;
         var val = this.value;
         console.log(this.value);
         $.ajax({
            url: 'index.php',
            data: 'val='+val,
            type: 'get',
            success: function(html){
                $("#r1").html(html).hide().fadeIn(500);


            }
        });
     }*/
 
 
    $(".btn_class").click(function(){
         var idd = $(this).attr('id');
         //alert(id);
         $.ajax({
             url: 'index.php',
             data: 'num1='+idd,
             type: 'get',
             success: function(html){
                 $("#r1").html(html).hide().fadeIn(500);
 
 
             }
         });
         $.ajax({
            url: 'index.php',
            data: 'num2='+idd,
            type: 'get',
            success: function(html){
                $("#r2").html(html).hide().fadeIn(500);


            }
        });
     });

 
 //});