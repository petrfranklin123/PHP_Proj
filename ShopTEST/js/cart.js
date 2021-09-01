
var cart ={}; //корзина

$.getJSON('goods.json' , function(data){

    var goods = data; //все товары в массиве
    checkCart();

    //console.log(cart);

    showCart();

    function showCart(){
        var out = '';
        for(var key in cart){
           // out += key + '---' + cart[key] + '<br>';
           out += '<button class="delete">X</button>';
           out += '<img src="'+goods[key]['image']+'" width="48">';
        }
        $('#my-cart').html(out);
    }

});

function checkCart(){
    
    if(localStorage.getItem('cart') != null){
        //преобразовываем ЗНАЧЕНИЕ обратно в массив
        cart = JSON.parse (localStorage.getItem('cart'));
    }
}