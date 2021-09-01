function openModal(modalSelector, modalTimerId){
    modal = document.querySelector(modalSelector);
    modal.classList.add('fade', 'show');
    modal.classList.remove('hide');
    //свойство, которое запрещает скроллинг по странице, пока активно модальное окно 
    document.body.style.overflow = 'hidden';

    console.log(modalTimerId);
    if(modalTimerId){
        //если пользователь сам перешел в модальное окно 
        clearInterval(modalTimerId);
    }


}

function closeModal(modalSelector){
    modal = document.querySelector(modalSelector);
    modal.classList.add('hide');
    modal.classList.remove('fade', 'show');
    //стираем свойство, чтобы была возможность скролить сайт после закрытия кмодального окна 
    document.body.style.overflow = '';
}

function modal(triggerSelector, modalSelector, modalTimerId){
    //Модальное окно -----------------

    var modalTrigger = document.querySelectorAll(triggerSelector),
        modal = document.querySelector(modalSelector);

    var prevModalDialogMAIN = document.querySelector('.modal__dialog');



    //перебор кнопок, которые вызывают модальное окно 
    modalTrigger.forEach(item =>{
        item.addEventListener('click', () =>{
            openModal(modalSelector, modalTimerId);
        });
    });



    // закрытие модального окна по нажатию по внешней области 
    modal.addEventListener('click', (event) =>{
        //проверка условия, что пользовательно нажал на внешнюю облать 
        if(event.target == modal || event.target.getAttribute('data-close') == ''){
            closeModal(modalSelector);    
        }
    });

    //закрытие модального окна по Esc
    document.addEventListener('keydown', (event) =>{
        if(event.code === "Escape" && modal.classList.contains('show')){
            closeModal(modalSelector);
        }
    });

    //Модификация модального окна-----


    function showModalByScroll(){
        //window.pageYOffset то, сколько проскролил пользователь
        //document.documentElement.clientHeight размер области видимости на экране у пользователя
        //document.documentElement.scrollHeight вся высота страницы 
        // если сумма экрана и и длины скролла совпадает с высотой страницы
        if(window.pageYOffset + document.documentElement.clientHeight >= document.documentElement.scrollHeight){
            // открытие модального окна
            openModal(modalSelector, modalTimerId);
            //запрет на повторное событие скроллинга 
            window.removeEventListener('scroll', showModalByScroll);
        }
    }
    //вешаем событие скроллинга, при котором
    //при достижении конца страницы пользователем единажы выбрасывает модальное окно 
    window.addEventListener('scroll', showModalByScroll);
    //Модальное окно -----------------
   
}

export default modal;

export {closeModal};

export {openModal};