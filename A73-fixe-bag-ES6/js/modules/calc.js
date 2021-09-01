function calc(){
    //------------ калькулятор калорий 1 - 2

var result = document.querySelector(".calculating__result span");



var sex, 
    height, 
    weight, 
    age, 
    ratio;

//проверка на наличие локального значения для пола    
if(localStorage.getItem('sex')){
    sex = localStorage.getItem('sex');
}else{
    //если нет, то устанавливаем начальное значение
    sex = 'female';
    //и сразу устанавливаем значение в локальное хранилище
    localStorage.setItem('sex', 'female');
}

//проверка на наличие локального значения для каллорий
if(localStorage.getItem('ratio')){
    ratio = localStorage.getItem('ratio');
}else{
    //если нет, то устанавливаем начальное значение
    ratio = 1.375;
    //и сразу устанавливаем значение в локальное хранилище
    localStorage.setItem('ratio', 1.375);
}

//универсальная функция, как и функция ниже, она для двух схожип по структуре блоков 
function initLocalSettings(selector, activeClass){
    var elements = document.querySelectorAll(selector);

    //перебираем блоки для навешивания начального значения класса активности 
    elements.forEach((elem) =>{
        //удаляем для выбранного блока (пол или каллории) классы активности 
        elem.classList.remove(activeClass);
        //для события по атрибуту id для пола 
        if(elem.getAttribute('id') === localStorage.getItem('sex')){
            elem.classList.add(activeClass);
        }
        //для рассчета калорий
        if(elem.getAttribute('data-ratio') === localStorage.getItem('ratio')){
            elem.classList.add(activeClass);
        }
    })
}

initLocalSettings("#gender div", "calculating__choose-item_active");
initLocalSettings(".calculating__choose_big div", "calculating__choose-item_active");

    function calcTotal(){
        if(!sex || !height || !weight || !age || !ratio){
            result.textContent = "_____";
            return;
        }
        if(sex == "female"){
            result.textContent = Math.round(( 447.6 + (9.2 * weight) + (3.1 * height) - (4.3 * age)) * ratio);
        }else{
            result.textContent = Math.round((88.36 + (13.4 * weight) + (4.8 * height) - (5.7 * age)) * ratio);
        }
    }

    calcTotal();

    function getStaticInformation(parentSelector, activeClass){
        //получаем все дивы из родителя parentSelector
        var elements = document.querySelectorAll(`${parentSelector} div`);

        //В данном случае делегирование событий не применимо
        elements.forEach(elem =>{
            elem.addEventListener('click', (e)=>{
                //проверяем, если у блоока есть этот атрибут 
                if(e.target.getAttribute("data-ratio")){
                    ratio = +e.target.getAttribute("data-ratio");
                    //запоминаем данныые в локальном хранилище
                    localStorage.setItem("ratio", e.target.getAttribute("data-ratio"));
                }else{
                    sex = e.target.getAttribute("id");
                    //запоминаем данныые в локальном хранилище
                    localStorage.setItem("sex", e.target.getAttribute("id"));
                }
    
                console.log(ratio, sex);
    
                elements.forEach(elem =>{
                    elem.classList.remove(activeClass);
                });
    
                e.target.classList.add(activeClass);
                calcTotal();
            });
        });


    }

    getStaticInformation("#gender", "calculating__choose-item_active");
    getStaticInformation(".calculating__choose_big", "calculating__choose-item_active");

    function getDinamicInformation(selector){
        var input = document.querySelector(selector);

        input.addEventListener("input", ()=>{

            if(input.value.match(/\D/g)){
                input.style.border = "1px solid red";
            }else{
                input.style.border = "none";
            }

            switch(input.getAttribute("id")){
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

export default calc;