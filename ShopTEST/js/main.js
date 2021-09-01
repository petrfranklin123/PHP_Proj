//Объявляю глобальный массив для корзины 
var cart = {};

$('document').ready(function(){
    loadGoods();
    checkCart();
    showMiniCart();
});
function loadGoods(){
        //Загружаем товары на страницу

        $.getJSON('goods.json', function(data){

           // console.log(data);

           var out = '';

           for(var key in data){
               out += '<div class="single_goods">';
                out += '<h3>'+data[key]['name']+'</h3>';
                out += '<p> Цена: '+data[key]['cost']+'</p>';
                out += '<img src="'+data[key]['image']+'">';
                out += '<button data-art="'+key+'" class="button">Купить</button>';
                out += '</div>';
           }

        $('#goods').html(out);
        $('button.button').on('click', addToCart);

        });

}

function addToCart(){
    //добаление товара в корзину
    var articul = $(this).attr('data-art');
    
    if(cart[articul] !=undefined){
        cart[articul]++
    }else{
        cart[articul] = 1;
    }
    //Запоминание товара (проеобразовываем массив в значение)
    localStorage.setItem('cart', JSON.stringify(cart));
    //
    console.log(cart);
    showMiniCart();
}
//проверка наичие корзины localStorage
function checkCart(){
    
    if(localStorage.getItem('cart') != null){
        //преобразовываем ЗНАЧЕНИЕ обратно в массив
        cart = JSON.parse (localStorage.getItem('cart'));
    }
}

function showMiniCart(){
    //Показываю содержимое корзины
    var out = '';
    for (var i in cart){
       out += i + ' --- ' + cart[i]+'<br>';
    }
    $('#mini-cart').html(out);
}