function modal(){
    //Модальное окно -----------------

    var modalTrigger = document.querySelectorAll('[data-modal]'),
        modal = document.querySelector(".modal");

    var prevModalDialogMAIN = document.querySelector('.modal__dialog');


    function openModal(){
        modal.classList.add('fade', 'show');
        modal.classList.remove('hide');
        //свойство, которое запрещает скроллинг по странице, пока активно модальное окно 
        document.body.style.overflow = 'hidden';

        //если пользователь сам перешел в модальное окно 
        clearInterval(modalTimerId);
    }

    function closeModal(){
        modal.classList.add('hide');
        modal.classList.remove('fade', 'show');
        //стираем свойство, чтобы была возможность скролить сайт после закрытия кмодального окна 
        document.body.style.overflow = '';
    }
    //перебор кнопок, которые вызывают модальное окно 
    modalTrigger.forEach(item =>{
        item.addEventListener('click', () =>{
            openModal();
        });
    });



    // закрытие модального окна по нажатию по внешней области 
    modal.addEventListener('click', (event) =>{
        //проверка условия, что пользовательно нажал на внешнюю облать 
        if(event.target == modal || event.target.getAttribute('data-close') == ''){
            closeModal();    
        }
    });

    //закрытие модального окна по Esc
    document.addEventListener('keydown', (event) =>{
        if(event.code === "Escape" && modal.classList.contains('show')){
            closeModal();
        }
    });

    //Модификация модального окна-----

    var modalTimerId = setTimeout(openModal, 50000);

    function showModalByScroll(){
        //window.pageYOffset то, сколько проскролил пользователь
        //document.documentElement.clientHeight размер области видимости на экране у пользователя
        //document.documentElement.scrollHeight вся высота страницы 
        // если сумма экрана и и длины скролла совпадает с высотой страницы
        if(window.pageYOffset + document.documentElement.clientHeight >= document.documentElement.scrollHeight){
            // открытие модального окна
            openModal();
            //запрет на повторное событие скроллинга 
            window.removeEventListener('scroll', showModalByScroll);
        }
    }
    //вешаем событие скроллинга, при котором
    //при достижении конца страницы пользователем единажы выбрасывает модальное окно 
    window.addEventListener('scroll', showModalByScroll);
    //Модальное окно -----------------
   
}

module.exports = modal;