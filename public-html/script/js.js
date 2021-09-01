$(document).ready(function(){
   $("#button").click(function(){
   $("#popur").css("display","block"); 
      $("#hover").css("display","block");
   }); 
   $(".submit").click(function(event){
       event.preventDefault();
       var email=$("#email").val();
       var password=$("#password").val();
       var password_2=$("#password_2").val();
       $.ajax({
          type:"post",
          url:"/action_register",
          data:{
              email:email,
              password:password,
              password_2:password_2
          },
          success:function(data){
             $("#inform").html(data); 
          }
       });
   });
});