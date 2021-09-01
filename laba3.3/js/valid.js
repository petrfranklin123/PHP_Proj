function func(){

    var name, price, info, result;
    alert("Приветствую");
    name = document.getElementById('name').value;
    price = document.getElementById('price').value;
    info = document.getElementById('info').value;
    result = "";

    if(name == ''){
        result  = "Вы не ввели имя товара";
    }
    if(price == ''){
        result = result + "Вы не ввели цену";
    }
    if(info == ''){
        result = result + "Вы не ввели информацию о товаре";
    }


    if(result != ''){
        alert(result);
    }else{
        //document.location.href = "../index.php";
    }

}