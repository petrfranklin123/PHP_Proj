var jsonObj;
var table = document.querySelector(".body_table"),
    header_table = document.querySelector(".header_table"),
    header_input = document.querySelector(".header_input"),
    checkbox = document.querySelector(".checkbox");

// функция вывода таблицы игроков 
function render(mass){

    mass.forEach((item)=>{
        var level = +item['level'],
            result_level = '',
            online = item['online'],
            result_online = '',
            name = item['name'],
            name_result = '';

        // опрееделения сколько звездочек выводить 
        if(level != 0){
            for(var i = 0; i < level; i++){
                result_level += `<img class="level_img" src="img/star.png" alt="">`;
            }
        }else{
            result_level = ``;
        }

        // определение значения онлайна
        if(online == true){
            result_online = `<div class="rad rad_onl"></div>`;
        }else if(online == false){
            result_online = `<div class="rad"></div>`;
        }

        //обрезание имени 
        if(name.length > 18){
            var reg_str;
            reg_str = name.match(/\w{18}/i);
            reg_str += "...";
        }else{
            var reg_str;
            reg_str = item['name'];
        }
        // формирования блока 
        var item_teg = `
        <div data-name-id="${item['id']}" class="item_player">
            <div class="id_player">${item['id']}</div>
            <div class="name_player">${reg_str}</div>
            <div class="lavel_player">${result_level}</div>
            <div class="online_player">${result_online}</div>
        </div>`;
        //вывод на страницу
        table.insertAdjacentHTML('beforeend', item_teg);
    });
}

//получение асинхронно данных из json сервера
fetch("players.json")
.then(data =>{
    return data.json();
}).then(data =>{
    console.log(data);
    jsonObj = data;
    render(jsonObj);
    return data;
});


var item = document.createElement("div");

//сортировка по нажатию кнопки "показать все" с учетом галочки на онлайн
document.querySelector("#selAll").addEventListener("click", ()=>{

    var accMass = jsonObj;
    var arrZap = accMass.sort((a, b) => a.id > b.id ? 1 : -1);
    if(checkbox.checked){
         arrZap = arrZap.filter((item)=>{
            return item.online == true;
        });
    }
    table.innerHTML = ``;
    render(arrZap);
});

//сортировка в треугольниках
header_table.addEventListener("click", (el)=>{
    var accMass = jsonObj;
    el.preventDefault();
    //сортировка по треугольникам
    if(el.target.className == "top"){
        if(el.target.getAttribute("data-index") == "id"){
            var arrZap = accMass.sort((a, b) => a.id > b.id ? 1 : -1);
            table.innerHTML = ``
            render(arrZap);
        }else if(el.target.getAttribute("data-index") == "name"){
            var arrZap = accMass.sort((a, b) => a.name > b.name ? 1 : -1);
            table.innerHTML = ``
            render(arrZap);
        }else if(el.target.getAttribute("data-index") == "level"){
            var arrZap = accMass.sort((a, b) => a.level > b.level ? 1 : -1);
            table.innerHTML = ``
            render(arrZap);
        }else if(el.target.getAttribute("data-index") == "online"){
            var arrZap = accMass.sort((a, b) => a.online > b.online ? 1 : -1);
            table.innerHTML = ``
            render(arrZap);
        }
    }else if(el.target.className == "bot"){
        if(el.target.getAttribute("data-index") == "rid"){
            var arrZap = accMass.sort((a, b) => a.id < b.id ? 1 : -1);
            table.innerHTML = ``
            render(arrZap);
        }else if(el.target.getAttribute("data-index") == "rname"){
            var arrZap = accMass.sort((a, b) => a.name < b.name ? 1 : -1);
            table.innerHTML = ``
            render(arrZap);
        }else if(el.target.getAttribute("data-index") == "rlevel"){
            var arrZap = accMass.sort((a, b) => a.level < b.level ? 1 : -1);
            table.innerHTML = ``
            render(arrZap);
        }else if(el.target.getAttribute("data-index") == "ronline"){
            var arrZap = accMass.sort((a, b) => a.online < b.online ? 1 : -1);
            table.innerHTML = ``
            render(arrZap);
        }
    }
});

//поиск по имени 
header_input.addEventListener('input', ()=>{
    console.log(header_input.value + " Значение");
    var accMass = jsonObj;

    var result = accMass.filter((item)=>{
        //формирование динамического регулярного выражения, другого метода я не нашел 
        var reg = new RegExp(""+header_input.value+"", "i");
        //возвращаем значение функции регулярного выражения 
        return   item.name.match(reg);
    });

    //выводим на страницу
    table.innerHTML = ``
    render(result);
    console.log(result);
});

table.addEventListener("click", (item) =>{
    if(item.target.className == "item_player"){
        console.log(item.target.getAttribute("data-name-id"));
        console.log(item.offsetX);
        console.log(item.offsetY);

        

        var menu_select = `
        <div class="select_menu_player">
            <a href="" class="show_player">Показать игрока</a>
            <a href="" class="fade_player">Скрыть игрока</a>
        </div>
        `;

        menu_select.textCss = `
            bottom: -${item.offsetX}px;
            left: ${item.offsetY}px;
        `;
        item.target.insertAdjacentHTML('beforeend', menu_select);
    }
});


//console.log(jsonObj);
//18 символов а имени 

    //console.log(jsonObj);
    //console.log(typeof(jsonObj));

    //поиск и вывод по первому совпадению 
    //var result = jsonObj.find((item)=>{
    //    return item.name == "Billy";
    //});
    //console.log(result);

    //поиск всех сопадений с данным условием 
    //var result = jsonObj.filter((item)=>{
    //    return item.name == "Billy";
    //});
    //console.log(result);

    //алгоритм сортировки работает по такому принципу, если возвращется большее или меньшее 
    //алгоритм сортировки по имени в прямом порядке
    //console.log(jsonObj.sort((a, b) => a.name > b.name ? 1 : -1));
    //алгоритм сортировки по имени в обратном порядке
    //console.log(jsonObj.sort((a, b) => a.name < b.name ? 1 : -1));
    //алгоритм сортировки по id в прямом порядке
    //console.log(jsonObj.sort((a, b) => a.id > b.id ? 1 : -1));
    //алгоритм сортировки по id в обратном порядке
    //console.log(jsonObj.sort((a, b) => a.id < b.id ? 1 : -1));