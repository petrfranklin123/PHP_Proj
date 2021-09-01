function cards(){

       //использование класса для карточек 

       class MenuCard{
        //rest оператор нужен для того, чтобы добавлять элементы в функцию в безграниченном режиме
        //синтаксис ...название переменной, к которой обращаешься 
        //переменная будет как массив
        constructor(src, alt, title, descr, price, parentSelector, ...classes){
            this.src = src;
            this.alt = alt;
            this.title = title;
            this.descr = descr;
            //this.price = price;
            this.transfer = 27;
            this.price = price * this.transfer;
            this.classes = classes;
            this.parent = document.querySelector(parentSelector); 
            //this.changeToUAH();
        }

        changeToUAH(){
            this.price = this.price * this.transfer;
        }  

        render(){
            var element = document.createElement('div');

            //в этом участке проверяется, существует ли записи в массив классов,
            //если их нет, то добавляется дефолтный класс 
            if(this.classes.length === 0){
                this.element = 'menu__item';
                element.classList.add(this.element);
            }else{
                //то есть мы добавляем классы к новосозданному DIV 
                //соответственно, это будет оберткой для пораждаемых объектов 
                this.classes.forEach(classAdd =>{
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
    }

    var getResource = async (url) => {
        var res = await fetch(url);
        //проверка на ошибки, если произошла ошибка 
        if(!res.ok){
            //чтобы ошибка была выкинута, нужно использловать метод throw
            throw new Error(`Cloud not fetch ${url}, status: ${res.status}`);
        }
        //получаем текст и трансформируем его в формат json 
        return await res.json();
    };
    //вывод на страницу карточек (обращаемся по адресу меню)
    getResource("http://localhost:3000/menu")
        .then(data =>{
            // производим деструктуризацию приходящих объектов {}
            data.forEach(({img, altimg, title, descr, price})=>{
                //создание объекта карточки для вывода на страницу 
                new MenuCard(img, altimg, title, descr, price, '.menu .container').render();
            });
        });


    //Анимация появления каточек
    var selectorCards = document.querySelectorAll(".menu__item");

    selectorCards.forEach(item =>{
        item.classList.add('fade', 'show');
        item.classList.remove('hide');
    });
    //Анимация появления каточек
    
}

module.exports = cards;