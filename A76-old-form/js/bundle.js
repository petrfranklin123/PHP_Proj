/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./js/modules/calc.js":
/*!****************************!*\
  !*** ./js/modules/calc.js ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
function calc() {
  //------------ калькулятор калорий 1 - 2
  var result = document.querySelector(".calculating__result span");
  var sex, height, weight, age, ratio; //проверка на наличие локального значения для пола    

  if (localStorage.getItem('sex')) {
    sex = localStorage.getItem('sex');
  } else {
    //если нет, то устанавливаем начальное значение
    sex = 'female'; //и сразу устанавливаем значение в локальное хранилище

    localStorage.setItem('sex', 'female');
  } //проверка на наличие локального значения для каллорий


  if (localStorage.getItem('ratio')) {
    ratio = localStorage.getItem('ratio');
  } else {
    //если нет, то устанавливаем начальное значение
    ratio = 1.375; //и сразу устанавливаем значение в локальное хранилище

    localStorage.setItem('ratio', 1.375);
  } //универсальная функция, как и функция ниже, она для двух схожип по структуре блоков 


  function initLocalSettings(selector, activeClass) {
    var elements = document.querySelectorAll(selector); //перебираем блоки для навешивания начального значения класса активности 

    elements.forEach(elem => {
      //удаляем для выбранного блока (пол или каллории) классы активности 
      elem.classList.remove(activeClass); //для события по атрибуту id для пола 

      if (elem.getAttribute('id') === localStorage.getItem('sex')) {
        elem.classList.add(activeClass);
      } //для рассчета калорий


      if (elem.getAttribute('data-ratio') === localStorage.getItem('ratio')) {
        elem.classList.add(activeClass);
      }
    });
  }

  initLocalSettings("#gender div", "calculating__choose-item_active");
  initLocalSettings(".calculating__choose_big div", "calculating__choose-item_active");

  function calcTotal() {
    if (!sex || !height || !weight || !age || !ratio) {
      result.textContent = "_____";
      return;
    }

    if (sex == "female") {
      result.textContent = Math.round((447.6 + 9.2 * weight + 3.1 * height - 4.3 * age) * ratio);
    } else {
      result.textContent = Math.round((88.36 + 13.4 * weight + 4.8 * height - 5.7 * age) * ratio);
    }
  }

  calcTotal();

  function getStaticInformation(parentSelector, activeClass) {
    //получаем все дивы из родителя parentSelector
    var elements = document.querySelectorAll(`${parentSelector} div`); //В данном случае делегирование событий не применимо

    elements.forEach(elem => {
      elem.addEventListener('click', e => {
        //проверяем, если у блоока есть этот атрибут 
        if (e.target.getAttribute("data-ratio")) {
          ratio = +e.target.getAttribute("data-ratio"); //запоминаем данныые в локальном хранилище

          localStorage.setItem("ratio", e.target.getAttribute("data-ratio"));
        } else {
          sex = e.target.getAttribute("id"); //запоминаем данныые в локальном хранилище

          localStorage.setItem("sex", e.target.getAttribute("id"));
        }

        console.log(ratio, sex);
        elements.forEach(elem => {
          elem.classList.remove(activeClass);
        });
        e.target.classList.add(activeClass);
        calcTotal();
      });
    });
  }

  getStaticInformation("#gender", "calculating__choose-item_active");
  getStaticInformation(".calculating__choose_big", "calculating__choose-item_active");

  function getDinamicInformation(selector) {
    var input = document.querySelector(selector);
    input.addEventListener("input", () => {
      if (input.value.match(/\D/g)) {
        input.style.border = "1px solid red";
      } else {
        input.style.border = "none";
      }

      switch (input.getAttribute("id")) {
        case 'height':
          height = +input.value;
          break;

        case 'weight':
          weight = +input.value;
          break;

        case 'age':
          age = +input.value;
          break;
      }

      calcTotal();
      console.log(height);
      console.log(weight);
      console.log(age);
    });
  }

  getDinamicInformation("#height");
  getDinamicInformation("#weight");
  getDinamicInformation("#age");
}

/* harmony default export */ __webpack_exports__["default"] = (calc);

/***/ }),

/***/ "./js/modules/cards.js":
/*!*****************************!*\
  !*** ./js/modules/cards.js ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _services_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../services/services */ "./js/services/services.js");


function cards() {
  //использование класса для карточек 
  class MenuCard {
    //rest оператор нужен для того, чтобы добавлять элементы в функцию в безграниченном режиме
    //синтаксис ...название переменной, к которой обращаешься 
    //переменная будет как массив
    constructor(src, alt, title, descr, price, parentSelector, ...classes) {
      this.src = src;
      this.alt = alt;
      this.title = title;
      this.descr = descr; //this.price = price;

      this.transfer = 27;
      this.price = price * this.transfer;
      this.classes = classes;
      this.parent = document.querySelector(parentSelector); //this.changeToUAH();
    }

    changeToUAH() {
      this.price = this.price * this.transfer;
    }

    render() {
      var element = document.createElement('div'); //в этом участке проверяется, существует ли записи в массив классов,
      //если их нет, то добавляется дефолтный класс 

      if (this.classes.length === 0) {
        this.element = 'menu__item';
        element.classList.add(this.element);
      } else {
        //то есть мы добавляем классы к новосозданному DIV 
        //соответственно, это будет оберткой для пораждаемых объектов 
        this.classes.forEach(classAdd => {
          element.classList.add(classAdd);
        });
      }

      element.innerHTML = `
            <img src="${this.src}" alt="${this.alt}">
            <h3 class="menu__item-subtitle">${this.title}</h3>
            <div class="menu__item-descr">${this.descr}</div>
            <div class="menu__item-divider"></div>
            <div class="menu__item-price">
             <div class="menu__item-cost">Цена:</div>
                    <div class="menu__item-total"><span>${this.price}</span> грн/день</div>
                </div>`;
      this.parent.append(element);
    }

  } //вывод на страницу карточек (обращаемся по адресу меню)


  (0,_services_services__WEBPACK_IMPORTED_MODULE_0__.getResource)("http://localhost:3000/menu").then(data => {
    // производим деструктуризацию приходящих объектов {}
    data.forEach(({
      img,
      altimg,
      title,
      descr,
      price
    }) => {
      //создание объекта карточки для вывода на страницу 
      new MenuCard(img, altimg, title, descr, price, '.menu .container').render();
    });
  }); //Анимация появления каточек

  var selectorCards = document.querySelectorAll(".menu__item");
  selectorCards.forEach(item => {
    item.classList.add('fade', 'show');
    item.classList.remove('hide');
  }); //Анимация появления каточек
}

/* harmony default export */ __webpack_exports__["default"] = (cards);

/***/ }),

/***/ "./js/modules/forms.js":
/*!*****************************!*\
  !*** ./js/modules/forms.js ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modal__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modal */ "./js/modules/modal.js");
/* harmony import */ var _services_services__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../services/services */ "./js/services/services.js");



function forms(formSelector, modalTimerId) {
  //отправка форм ------
  var forms = document.querySelectorAll(formSelector);
  var message = {
    loading: 'img/form/spinner.svg',
    success: 'Спасибо, мы скоро с вами свяжемся!',
    failure: 'Что-то пошло не так'
  };
  forms.forEach(item => {
    bindpostData(item);
  });

  function bindpostData(form) {
    form.addEventListener('submit', e => {
      //запрещаем странице перезагружаться 
      e.preventDefault(); //помещаем спиннер, добавляя тег img

      var statusMessage = document.createElement('img'); //берем путь 

      statusMessage.src = message.loading;
      statusMessage.setAttribute('data-spinner', ''); //центруем спиннер

      statusMessage.style.cssText = `
                display: block;
                margin: 0 auto;
            `; //добаляем его 

      form.append(statusMessage);
      form.insertAdjacentElement('afterend', statusMessage); //Собираем данные из формы 

      var formData = new FormData(form); //более совершенный способ формирования json формата
      //formData.entries() создает массив массивов (двумерный массив)
      //Object.fromEntries() создает объект из этого массива 
      //JSON.stringify() превращение в json формат объекта 

      var json = JSON.stringify(Object.fromEntries(formData.entries())); //заменяем вышестоящий метод одной строкой 

      (0,_services_services__WEBPACK_IMPORTED_MODULE_1__.postData)("http://localhost:3000/requests", json).then(data => {
        //data - это данные, которые вернулись из промиса 
        console.log(data); //модальное окно, что все прошло успешно 

        showThanksModal(message.success);
        statusMessage.remove();
      }).catch(() => {
        // при ошибке в запроса
        showThanksModal(message.failure); //в любом случае очищаем форму
      }).finally(() => {
        form.reset();
      });
    });
  } //отправка форм ------


  function showThanksModal(message) {
    //получаем модальное окно 
    var prevModalDialog = document.querySelector('.modal__dialog'); //добавляем скрытие этого окна

    prevModalDialog.classList.add('hide'); //затем открываем родительский элемент модального окна 
    //для того чтобы в него моместить сообщение 

    (0,_modal__WEBPACK_IMPORTED_MODULE_0__.openModal)('.modal', modalTimerId); //добавляем элемент с классом, чтобы стили распространились и на окно с сообщением 

    var thanksModal = document.createElement('div');
    thanksModal.classList.add('.modal__dialog');
    thanksModal.innerHTML = `
            <div class="modal__content">
                <div class="modal__close" data-close>
                    ×
                </div>
                <div class="modal__title">
                    ${message}
                </div>
            </div>
        `; //добавляем в родительский класс 

    document.querySelector('.modal').append(thanksModal); //через 4 секунды возобновится модальное окно 

    setTimeout(() => {
      thanksModal.remove();
      prevModalDialog.classList.add('show');
      prevModalDialog.classList.remove('hide');
      (0,_modal__WEBPACK_IMPORTED_MODULE_0__.closeModal)();
    }, 4000);
  } //чтобы проинициализировать наш проект надо прописать 
  //npm init 
  //появится файл package.json, в котором содержится информация о нашем проекте 
  //этот файл будет содержать всю информауию о нашем проекте, а так же какие пакеты npm подключены к нему
  // устанавливаем json сервер 
  // npm install json-server , далее нужно указать, является ли проект глобальным -g 
  // если нет, то можно просто пропустить 
  //следом в этой же команде прописываем флаг --save-dev (только для разработки) или --save
  //появится папка node_modules, в которой ничего менять не нужно 
  //и не стоит ее копировать в репозиторий на GIT, так как ее можно подтянуть в среде npm 
  //а так же появится файл packege-look.json
  //этот код работает до включения сервера, то есть мы обращаемся к самому файлу json 
  // и в итоге получаем объект 


  fetch('db.json').then(data => {
    return data.json();
  }).then(res => {
    return console.log(res);
  }); // чтобы включить json-server нужно прописать команду npx json-server db.json
  //после включения сервера, нам стали доступные ссылки
  //http://localhost:3000/menu
  //http://localhost:3000/requests
  //где первая, это наша база данных 
  //А вторая, это куда мы будем постить данные 

  fetch('http://localhost:3000/menu').then(data => {
    return data.json();
  }).then(res => {
    return console.log(res);
  }); // в дальнейшем необходимо запускать два сервера
}

/* harmony default export */ __webpack_exports__["default"] = (forms);

/***/ }),

/***/ "./js/modules/modal.js":
/*!*****************************!*\
  !*** ./js/modules/modal.js ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "closeModal": function() { return /* binding */ closeModal; },
/* harmony export */   "openModal": function() { return /* binding */ openModal; }
/* harmony export */ });
function openModal(modalSelector, modalTimerId) {
  modal = document.querySelector(modalSelector);
  modal.classList.add('fade', 'show');
  modal.classList.remove('hide'); //свойство, которое запрещает скроллинг по странице, пока активно модальное окно 

  document.body.style.overflow = 'hidden';
  console.log(modalTimerId);

  if (modalTimerId) {
    //если пользователь сам перешел в модальное окно 
    clearInterval(modalTimerId);
  }
}

function closeModal(modalSelector) {
  modal = document.querySelector(modalSelector);
  modal.classList.add('hide');
  modal.classList.remove('fade', 'show'); //стираем свойство, чтобы была возможность скролить сайт после закрытия кмодального окна 

  document.body.style.overflow = '';
}

function modal(triggerSelector, modalSelector, modalTimerId) {
  //Модальное окно -----------------
  var modalTrigger = document.querySelectorAll(triggerSelector),
      modal = document.querySelector(modalSelector);
  var prevModalDialogMAIN = document.querySelector('.modal__dialog'); //перебор кнопок, которые вызывают модальное окно 

  modalTrigger.forEach(item => {
    item.addEventListener('click', () => {
      openModal(modalSelector, modalTimerId);
    });
  }); // закрытие модального окна по нажатию по внешней области 

  modal.addEventListener('click', event => {
    //проверка условия, что пользовательно нажал на внешнюю облать 
    if (event.target == modal || event.target.getAttribute('data-close') == '') {
      closeModal(modalSelector);
    }
  }); //закрытие модального окна по Esc

  document.addEventListener('keydown', event => {
    if (event.code === "Escape" && modal.classList.contains('show')) {
      closeModal(modalSelector);
    }
  }); //Модификация модального окна-----

  function showModalByScroll() {
    //window.pageYOffset то, сколько проскролил пользователь
    //document.documentElement.clientHeight размер области видимости на экране у пользователя
    //document.documentElement.scrollHeight вся высота страницы 
    // если сумма экрана и и длины скролла совпадает с высотой страницы
    if (window.pageYOffset + document.documentElement.clientHeight >= document.documentElement.scrollHeight) {
      // открытие модального окна
      openModal(modalSelector, modalTimerId); //запрет на повторное событие скроллинга 

      window.removeEventListener('scroll', showModalByScroll);
    }
  } //вешаем событие скроллинга, при котором
  //при достижении конца страницы пользователем единажы выбрасывает модальное окно 


  window.addEventListener('scroll', showModalByScroll); //Модальное окно -----------------
}

/* harmony default export */ __webpack_exports__["default"] = (modal);



/***/ }),

/***/ "./js/modules/slider.js":
/*!******************************!*\
  !*** ./js/modules/slider.js ***!
  \******************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
//делаем универсальный слайдер, деструкетуризацию
function slider(container, slide, nextArrow, prevArrow, totalContainer, currentContainer, wrapper, field) {
  //---------------- слайдер 2 ----------------//
  var slides = document.querySelectorAll(slide),
      prev = document.querySelector(prevArrow),
      next = document.querySelector(nextArrow),
      current_slides = document.querySelector(currentContainer),
      total_slides = document.querySelector(totalContainer),
      slidesWrapper = document.querySelector(wrapper),
      slidesField = document.querySelector(field),
      // в данной конструкции мы получаем ширину блока со слайдами
  //таким образом мы можем обратиться к любым стилям на странице 
  width = window.getComputedStyle(slidesWrapper).width,
      slider = document.querySelector(container);
  var sliderIndex = 1;
  var offset = 0; //стилизация полосы прокрутки катринок

  slidesField.style.width = 100 * slides.length + "%";
  slidesField.style.display = "flex";
  slidesField.style.transition = "0.5s all"; //обрезка содержимого 

  slidesWrapper.style.overflow = "hidden"; //устанавливаем одинаковую ширину (ширину окна предка) для каждого слайда

  slides.forEach(slide => {
    slide.style.width = width;
  }); //начальное значение слайдера 

  setNachZnach();
  slider.style.position = "relative"; //создаем элемент 

  var indicators = document.createElement("ol"),
      dots = [];
  indicators.classList.add('carousel-indicators'); //добавляем элемент 

  slider.append(indicators); //добавляем навигацию

  for (var i = 0; i < slides.length; i++) {
    var dot = document.createElement("li"); //добавляем элементу атрибут с конкретным индексом 

    dot.setAttribute('data-slide-to', i + 1);
    dot.classList.add("dot");

    if (i == 0) {
      dot.style.opacity = 1;
    }

    indicators.append(dot);
    dots.push(dot);
  }

  next.addEventListener("click", () => {
    if (offset == +width.replace(/\D/g, "") * (slides.length - 1)) {
      offset = 0;
    } else {
      offset += +width.replace(/\D/g, "");
    }

    slidesField.style.transform = `translateX(-${offset}px)`;

    if (sliderIndex == slides.length) {
      sliderIndex = 1;
    } else {
      sliderIndex++;
    }

    if (slides.length < 10) {
      current_slides.textContent = `0${sliderIndex}`;
    } else {
      current_slides.textContent = sliderIndex;
    }

    dots.forEach(dot => dot.style.opacity = "0.5");
    dots[sliderIndex - 1].style.opacity = "1";
  });
  prev.addEventListener("click", () => {
    if (offset == 0) {
      offset = +width.replace(/\D/g, "") * (slides.length - 1);
    } else {
      offset -= +width.replace(/\D/g, "");
    }

    slidesField.style.transform = `translateX(-${offset}px)`;

    if (sliderIndex == 1) {
      sliderIndex = slides.length;
    } else {
      sliderIndex--;
    }

    if (slides.length < 10) {
      current_slides.textContent = `0${sliderIndex}`;
    } else {
      current_slides.textContent = sliderIndex;
    }

    dots.forEach(dot => dot.style.opacity = "0.5");
    dots[sliderIndex - 1].style.opacity = "1";
  });
  /*dots.forEach(dot =>{
      dot.addEventListener("click", e =>{
          var slideTo = e.target.getAttribute('data-slide-to');
  
          sliderIndex = slideTo;
  
          offset = +width.slice(0, width.length - 2) * (slideTo - 1);
          slidesField.style.transform = `translateX(-${offset}px)`;
  
          if(slides.length < 10){
              current_slides.textContent = `0${sliderIndex}`;
          }else{
              current_slides.textContent = sliderIndex;
          }
  
          dots.forEach(dot => dot.style.opacity = "0.5");
          dots[sliderIndex - 1].style.opacity = "1";
      });
  });*/

  indicators.addEventListener("click", e => {
    //получаем все элементы класса dot вложенные в indicator
    if (e.target.className == "dot") {
      //записываем значение атрибута в переменную
      var slideTo = e.target.getAttribute('data-slide-to'); //переприсваиваем значение sliderIndex

      sliderIndex = slideTo; //первым множетелем выступает ширина видимого блока, второй индекс картинки

      offset = +width.replace(/\D/g, "") * (slideTo - 1); //перемещение в заданную ширину

      slidesField.style.transform = `translateX(-${offset}px)`;

      if (slides.length < 10) {
        current_slides.textContent = `0${sliderIndex}`;
      } else {
        current_slides.textContent = sliderIndex;
      } //сначала присваиваем всем индикаторам полупрозрачность 


      dots.forEach(dot => dot.style.opacity = "0.5"); //следом раскрываем конкретный 

      dots[sliderIndex - 1].style.opacity = "1";
    }
  }); //установка начального значения 

  function setNachZnach() {
    offset = 0;
    sliderIndex = 1;
    slidesField.style.transform = `translateX(-${offset}px)`;
    current_slides.textContent = `0${sliderIndex}`;
  }
}

/* harmony default export */ __webpack_exports__["default"] = (slider);

/***/ }),

/***/ "./js/modules/tabs.js":
/*!****************************!*\
  !*** ./js/modules/tabs.js ***!
  \****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
function tabs(tabsSelector, tabsContentSelector, tabsParentSelector, activeClass) {
  var tabs = document.querySelectorAll(tabsSelector),
      tabsContent = document.querySelectorAll(tabsContentSelector),
      tabsParent = document.querySelector(tabsParentSelector);

  function hideTAbContent() {
    //скрываем все табы 
    tabsContent.forEach(item => {
      //чтобы появилась анимация добаляем в css классы 
      item.classList.add('hide');
      item.classList.remove('show', 'fade'); //item.style.display = 'none';
    }); // удаляем класс активности у табов

    tabs.forEach(tab => {
      tab.classList.remove(activeClass);
    });
  } //функция отработки нажатия, где i это название позиции слайда 


  function showTabContent(i = 0) {
    //тоже часть анимации 
    tabsContent[i].classList.add('show', 'fade');
    tabsContent[i].classList.remove('hide'); //tabsContent[i].style.display = "block";

    tabs[i].classList.add(activeClass);
  } //дефолтная страница


  hideTAbContent();
  showTabContent();
  tabsParent.addEventListener('click', event => {
    var target = event.target; // с помощью делегирирования ищем нажатую облать и вызываем функции отработки 

    if (target && target.classList.contains(tabsSelector.slice(1))) {
      tabs.forEach((item, i) => {
        if (target == item) {
          hideTAbContent();
          showTabContent(i);
        }
      });
    }
  }); //Табы----------------------------
}

/* harmony default export */ __webpack_exports__["default"] = (tabs);

/***/ }),

/***/ "./js/modules/timer.js":
/*!*****************************!*\
  !*** ./js/modules/timer.js ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
function timer(id, deadline) {
  //Таймер-------------------------- 
  console.log(`=======`); //функция, которая будет считать, сколько осталось времени 
  //до конца и создавать на выходе собранный объект 

  function getTimeRemaining(endtime) {
    // количество милисекунд 
    var t = Date.parse(endtime) - Date.parse(new Date()),
        // количество дней
    days = Math.floor(t / (1000 * 60 * 60 * 24)),
        // количество часов
    hours = Math.floor(t / (1000 * 60 * 60) % 24),
        // количество минут 
    minutes = Math.floor(t / 1000 / 60 % 60),
        // количество секунд 
    seconds = Math.floor(t / 1000 % 60); // возврат объекта 

    return {
      'total': t,
      'days': days,
      'hours': hours,
      'minutes': minutes,
      'seconds': seconds
    };
  } //функция, которая принимает число и добавляет ноль в начало 
  //если число меньше 10


  function getZero(num) {
    if (num < 10) {
      return `0${num}`;
    } else {
      return num;
    }
  } //функция для доступа к элементам DOM и запуска таймера 


  function setClock(selector, endtime) {
    var timer = document.querySelector(selector),
        days = timer.querySelector("#days"),
        hours = timer.querySelector("#hours"),
        minutes = timer.querySelector("#minutes"),
        seconds = timer.querySelector("#seconds"); //из-за того, что функция setInterval начнет действовать только через 1 секунду
    //при одновлении страницы будет появляться изначальное значение 
    //чтобы избежать этого, нужно разово вызвать функцию счета времени

    updateClock(); //запуск регулярного обновления 

    var timeInterval = setInterval(() => updateClock(), 1000);

    function updateClock() {
      //получение объекта с датой 
      var t = getTimeRemaining(endtime); //модуль обновления времени на странице

      days.innerHTML = getZero(t.days);
      hours.innerHTML = getZero(t.hours);
      minutes.innerHTML = getZero(t.minutes);
      seconds.innerHTML = getZero(t.seconds); //проверка, если милисекунд 0 или меньше, то таймер очищается

      if (t.total <= 0) {
        clearInterval(timeInterval);
      }
    }
  } //запуск функции обновления таймера 


  setClock(id, deadline); //Таймер-------------------------- 
}

/* harmony default export */ __webpack_exports__["default"] = (timer);

/***/ }),

/***/ "./js/services/services.js":
/*!*********************************!*\
  !*** ./js/services/services.js ***!
  \*********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "postData": function() { return /* binding */ postData; },
/* harmony export */   "getResource": function() { return /* binding */ getResource; }
/* harmony export */ });
//если формат json 
//передаем url и данные data
//так как fetch это асинхронный код, то оперетор присвояения в res не будет 
//ожидать ответа на запрос, он присвоит сразу 
//и это вызовет в дальнейшем ошибку 
//для этого нужно испльзовать конструкцию async await
//async - необходим для того, чтобы сказать, что в данном фрагменте существует асинхронный код
//await  - нужен для пометки, что в этом местк есть асинхронный код 
var postData = async (url, data) => {
  var res = await fetch(url, {
    method: "POST",
    headers: {
      'Content-type': 'application/json'
    },
    body: data
  }); //получаем текст и трансформируем его в формат json 

  return await res.json();
}; //слайдер


var getResource = async url => {
  var res = await fetch(url); //проверка на ошибки, если произошла ошибка 

  if (!res.ok) {
    //чтобы ошибка была выкинута, нужно использловать метод throw
    throw new Error(`Cloud not fetch ${url}, status: ${res.status}`);
  } //получаем текст и трансформируем его в формат json 


  return await res.json();
};




/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!**********************!*\
  !*** ./js/script.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_tabs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/tabs */ "./js/modules/tabs.js");
/* harmony import */ var _modules_modal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/modal */ "./js/modules/modal.js");
/* harmony import */ var _modules_timer__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/timer */ "./js/modules/timer.js");
/* harmony import */ var _modules_cards__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/cards */ "./js/modules/cards.js");
/* harmony import */ var _modules_calc__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./modules/calc */ "./js/modules/calc.js");
/* harmony import */ var _modules_slider__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./modules/slider */ "./js/modules/slider.js");
/* harmony import */ var _modules_forms__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./modules/forms */ "./js/modules/forms.js");







window.addEventListener('DOMContentLoaded', () => {
  var modalTimerId = setTimeout(() => (0,_modules_modal__WEBPACK_IMPORTED_MODULE_1__.openModal)('.modal', modalTimerId), 50000);
  (0,_modules_tabs__WEBPACK_IMPORTED_MODULE_0__.default)('.tabheader__item', '.tabcontent', '.tabheader__items', 'tabheader__item_active');
  (0,_modules_modal__WEBPACK_IMPORTED_MODULE_1__.default)('[data-modal]', '.modal', modalTimerId);
  (0,_modules_timer__WEBPACK_IMPORTED_MODULE_2__.default)('.timer', '2021-09-11');
  (0,_modules_cards__WEBPACK_IMPORTED_MODULE_3__.default)();
  (0,_modules_calc__WEBPACK_IMPORTED_MODULE_4__.default)();
  (0,_modules_slider__WEBPACK_IMPORTED_MODULE_5__.default)({
    container: ".offer__slider",
    nextArrow: ".offer__slider-next",
    prevArrow: ".offer__slider-prev",
    slide: ".offer__slide",
    totalContainer: "#total",
    currentContainer: "#current",
    wrapper: ".offer__slider-wrapper",
    field: ".offer__slider-inner"
  });
  (0,_modules_forms__WEBPACK_IMPORTED_MODULE_6__.default)('form', modalTimerId);
});
}();
/******/ })()
;
//# sourceMappingURL=bundle.js.map