$(document).ready(function(){
    $("#buttom").click(function(){
        $("#popur_top").css("display", "block");
        $("#popur").css("display", "block");
        $("#hover").css("display", "block");
    });

    $(".submit").click(function(event){

        event.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        var password_2 = $("#password_2").val();
        $.ajax({
            type:"post",
            url:"/action_register",
            data:{
                email: email,
                password: password,
                password_2: password_2
            },
            success:function(data){
                $("#inform").html(data);
            }
        });
    });

    $(".submit_2").click(function(event){

        event.preventDefault();
        var email_2 = $("#email_2").val();
        var password_3 = $("#password_3").val();

        $.ajax({
            type:"post",
            url:"/action_login",
            data:{
                email_2: email_2,
                password_3: password_3,
            },
            success:function(data){
                $("#inform_2").html(data);
            }
        });
    });
});