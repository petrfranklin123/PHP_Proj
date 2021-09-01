

$(document).ready(function(){
    //Логика селекта
    let select = function(){
        let selectHeader = document.querySelectorAll('.select_header');
        let selectItem = document.querySelectorAll('.select_item');

        selectHeader.forEach(item =>{
            item.addEventListener('click', selectToggle);
        });
        selectItem.forEach(item =>{
            item.addEventListener('click', selectChoose)
        });
        function selectToggle(){
            this.parentElement.classList.toggle('is-active');
        }
        function selectChoose(){
            let text = this.innerText, 
            //выбираем значение из выбранного из списка
            value = this.getAttribute('value'),
            //ближайший родитель на который мы поднимаемся, поднимаемся до select
            select = this.closest('.select'),
            //находим select_current
            currentText = select.querySelector('.select_current');
            //меняем значение select_current на то, что нажато
            currentText.innerText = text;
            //устанавливаем нужное значение в селект
            currentText.setAttribute('value', value);
            //убераем меню
            select.classList.remove('is-active');
        }
    }
    select();
    
    $(".redirect_profile").click(function(redirect_profile){
        redirect_profile.preventDefault();
        location.replace("/profile");

    });
    $("#a_edit_profile").click(function(a_edit){
        a_edit.preventDefault();
        $(".input_edit_profile").css("display", "block");
        $("#a_save_profile").css("display", "block");
        $("#select_how_old").css("display", "block");
    });
    $("#a_save_profile").click(function(a_save){
        a_save.preventDefault();
        $(".input_edit_profile").css("display", "none");
        $("#a_save_profile").css("display", "none");
        $("#select_how_old").css("display", "none");
    });

    $('#close_pole_activation').click(function(){
        $('#pole_activation').css("display","none");
    });
    $("#register_submit").click(function(event){
        event.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        var password_2 = $("#password_2").val();
        $.ajax({
            type:"post",
            url:"/register",
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

    $("#login_submit").click(function(event){

        event.preventDefault();
        var email_2 = $("#email_2").val();
        var password_3 = $("#password_3").val();

        $.ajax({
            type:"post",
            url:"/login",
            data:{
                email_2: email_2,
                password_3: password_3,
            },
            success:function(data){
                $("#inform_2").html(data);
            }
        });
    });
    // Добавление информации о пользователе
    $("#a_save_profile").click(function(event){

        event.preventDefault();
        var input_name = $("#input_name").val();
        var input_famale = $("#input_famale").val();
        var select_how_old = document.getElementById("select_how_old").value;
        //var select_how_old = $("#select_how_old").val();
        alert(select_how_old);

        $.ajax({
            type:"post",
            url:"/edit",
            data:{
                input_name: input_name,
                input_famale: input_famale,
                select_how_old: select_how_old,
            },
            success:function(data){
                $("#test").html(data);
            }
        });
    });
});