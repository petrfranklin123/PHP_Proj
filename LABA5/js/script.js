//$(document).ready(function(){
    

 
     $(".input").click(function(){
         var idd = $(this).attr('id');
         //alert(id);
         $.ajax({
             url: 'index.php',
             data: 'idd='+idd,
             type: 'get',
             success: function(html){
                 $("#wrapper").html(html).hide().fadeIn(500);
 
 
             }
         });
     });

        function getell(){
            var idd = document.getElementById("selectt").value;
            $.ajax({
              url: 'index.php',
              data: 'idd='+idd,
              type: 'get',
              success: function(html){
                  $("#wrapper").html(html).hide().fadeIn(500);
  
  
              }
          });
          }

          function f2(){
            var window = $(this).attr('id');
            $.ajax({
                url: 'index.php',
                data: 'window='+window,
                type: 'get',
                success: function(html){
                    $("#wrapper").html(html).hide().fadeIn(500);
                   // alert(window);
    
                }
            });

          }
          function f3(func){
            func.preventDefault();
            var back = $(this).attr('id');
            //alert(back);
            $.ajax({
                url: 'index.php',
                data: 'back='+back,
                type: 'get',
                success: function(html){
                    $("#wrapper").html(html).hide().fadeIn(500);
                 //   alert(back);
                }
            });

          }
          function f4(func){
            func.preventDefault();
            var select_list = $(this).attr('id');
            //alert(back);
            $.ajax({
                url: 'index.php',
                data: 'select_list='+select_list,
                type: 'get',
                success: function(html){
                    $("#wrapper").html(html).hide().fadeIn(500);
                  //  alert(select_list);
                }
            });

          }

          
          $(document).ready(function(){
//выбор товара
             $(document).on('click', '.select_obj', f2);
//возвращение на предидущее меню (кнопка "назад" (не работает!))
             $(document).on('click', '.back_id', f3);

             $(document).on('click', '.select_list', f4);

//функционал правого меню
             $('.block_title').click(function(event){

             // if($('.block').hasClass('one')){
             //     $('.block_title').not($(this)).removeClass('active');
             //     $('.block_text').not($(this).next()).slideUp(300);
             // }
      
      
              $(this).toggleClass('active').next().slideToggle(300);
//функционал правого меню
          });
        //});


     // });

 
 });