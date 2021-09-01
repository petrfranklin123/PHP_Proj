"use strict";

var jsonObj;
var table = document.querySelector(".body_table"),
    header_table = document.querySelector(".header_table"),
    header_input = document.querySelector(".header_input"),
    checkbox = document.querySelector(".checkbox"); // функция вывода таблицы игроков 

function render(mass) {
  mass.forEach(function (item) {
    var level = +item['level'],
        result_level = '',
        online = item['online'],
        result_online = '',
        name = item['name'],
        name_result = ''; // опрееделения сколько звездочек выводить 

    if (level != 0) {
      for (var i = 0; i < level; i++) {
        result_level += "<img class=\"level_img\" src=\"img/star.png\" alt=\"\">";
      }
    } else {
      result_level = "";
    } // определение значения онлайна


    if (online == true) {
      result_online = "<div class=\"rad rad_onl\"></div>";
    } else if (online == false) {
      result_online = "<div class=\"rad\"></div>";
    } //обрезание имени 


    if (name.length > 18) {
      var reg_str;
      reg_str = name.match(/\w{18}/i);
      reg_str += "...";
    } else {
      var reg_str;
      reg_str = item['name'];
    } // формирования блока 


    var item_teg = "\n        <div data-name-id=\"".concat(item['id'], "\" class=\"item_player\">\n            <div class=\"id_player\">").concat(item['id'], "</div>\n            <div class=\"name_player\">").concat(reg_str, "</div>\n            <div class=\"lavel_player\">").concat(result_level, "</div>\n            <div class=\"online_player\">").concat(result_online, "</div>\n        </div>"); //вывод на страницу

    table.insertAdjacentHTML('beforeend', item_teg);
  });
} //получение асинхронно данных из json сервера


fetch("players.json").then(function (data) {
  return data.json();
}).then(function (data) {
  console.log(data);
  jsonObj = data;
  render(jsonObj);
  return data;
});
var item = document.createElement("div"); //сортировка по нажатию кнопки "показать все" с учетом галочки на онлайн

document.querySelector("#selAll").addEventListener("click", function () {
  var accMass = jsonObj;
  var arrZap = accMass.sort(function (a, b) {
    return a.id > b.id ? 1 : -1;
  });

  if (checkbox.checked) {
    arrZap = arrZap.filter(function (item) {
      return item.online == true;
    });
  }

  table.innerHTML = "";
  render(arrZap);
}); //сортировка в треугольниках

header_table.addEventListener("click", function (el) {
  var accMass = jsonObj;
  el.preventDefault(); //сортировка по треугольникам

  if (el.target.className == "top") {
    if (el.target.getAttribute("data-index") == "id") {
      var arrZap = accMass.sort(function (a, b) {
        return a.id > b.id ? 1 : -1;
      });
      table.innerHTML = "";
      render(arrZap);
    } else if (el.target.getAttribute("data-index") == "name") {
      var arrZap = accMass.sort(function (a, b) {
        return a.name > b.name ? 1 : -1;
      });
      table.innerHTML = "";
      render(arrZap);
    } else if (el.target.getAttribute("data-index") == "level") {
      var arrZap = accMass.sort(function (a, b) {
        return a.level > b.level ? 1 : -1;
      });
      table.innerHTML = "";
      render(arrZap);
    } else if (el.target.getAttribute("data-index") == "online") {
      var arrZap = accMass.sort(function (a, b) {
        return a.online > b.online ? 1 : -1;
      });
      table.innerHTML = "";
      render(arrZap);
    }
  } else if (el.target.className == "bot") {
    if (el.target.getAttribute("data-index") == "rid") {
      var arrZap = accMass.sort(function (a, b) {
        return a.id < b.id ? 1 : -1;
      });
      table.innerHTML = "";
      render(arrZap);
    } else if (el.target.getAttribute("data-index") == "rname") {
      var arrZap = accMass.sort(function (a, b) {
        return a.name < b.name ? 1 : -1;
      });
      table.innerHTML = "";
      render(arrZap);
    } else if (el.target.getAttribute("data-index") == "rlevel") {
      var arrZap = accMass.sort(function (a, b) {
        return a.level < b.level ? 1 : -1;
      });
      table.innerHTML = "";
      render(arrZap);
    } else if (el.target.getAttribute("data-index") == "ronline") {
      var arrZap = accMass.sort(function (a, b) {
        return a.online < b.online ? 1 : -1;
      });
      table.innerHTML = "";
      render(arrZap);
    }
  }
}); //поиск по имени 

header_input.addEventListener('input', function () {
  console.log(header_input.value + " Значение");
  var accMass = jsonObj;
  var result = accMass.filter(function (item) {
    //формирование динамического регулярного выражения, другого метода я не нашел 
    var reg = new RegExp("" + header_input.value + "", "i"); //возвращаем значение функции регулярного выражения 

    return item.name.match(reg);
  }); //выводим на страницу

  table.innerHTML = "";
  render(result);
  console.log(result);
});
table.addEventListener("click", function (item) {
  if (item.target.className == "item_player") {
    console.log(item.target.getAttribute("data-name-id"));
    console.log(item.offsetX);
    console.log(item.offsetY);
    var menu_select = "\n        <div class=\"select_menu_player\">\n            <a href=\"\" class=\"show_player\">\u041F\u043E\u043A\u0430\u0437\u0430\u0442\u044C \u0438\u0433\u0440\u043E\u043A\u0430</a>\n            <a href=\"\" class=\"fade_player\">\u0421\u043A\u0440\u044B\u0442\u044C \u0438\u0433\u0440\u043E\u043A\u0430</a>\n        </div>\n        ";
    menu_select.textCss = "\n            bottom: -".concat(item.offsetX, "px;\n            left: ").concat(item.offsetY, "px;\n        ");
    item.target.insertAdjacentHTML('beforeend', menu_select);
  }
}); //console.log(jsonObj);
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