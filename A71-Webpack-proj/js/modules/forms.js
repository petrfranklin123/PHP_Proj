function forms(){

    //отправка форм ------

    var forms = document.querySelectorAll('form');

    var message = {
        loading: 'img/form/spinner.svg',
        success: 'Спасибо, мы скоро с вами свяжемся!',
        failure: 'Что-то пошло не так'
    };

    forms.forEach(item => {
        bindpostData(item);
    });
    
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
        });
        //получаем текст и трансформируем его в формат json 
        return await res.json();
    };


    function bindpostData(form){
        form.addEventListener('submit', (e) =>{
            //запрещаем странице перезагружаться 
            e.preventDefault();

            //помещаем спиннер, добавляя тег img
            var statusMessage = document.createElement('img');
            //берем путь 
            statusMessage.src = message.loading;

            statusMessage.setAttribute('data-spinner', '');
            //центруем спиннер
            statusMessage.style.cssText = `
                display: block;
                margin: 0 auto;
            `;
            //добаляем его 

            form.append(statusMessage);

            form.insertAdjacentElement('afterend', statusMessage);

            //Собираем данные из формы 
            var formData = new FormData(form);
            

            //более совершенный способ формирования json формата
            //formData.entries() создает массив массивов (двумерный массив)
            //Object.fromEntries() создает объект из этого массива 
            //JSON.stringify() превращение в json формат объекта 
            var json = JSON.stringify(Object.fromEntries(formData.entries()));


            //заменяем вышестоящий метод одной строкой 
            postData("http://localhost:3000/requests", json)
            .then(data => {
                //data - это данные, которые вернулись из промиса 
                console.log(data);
                //модальное окно, что все прошло успешно 
                showThanksModal(message.success);
                statusMessage.remove();
            }).catch(() => {
                // при ошибке в запроса
                showThanksModal(message.failure);
                //в любом случае очищаем форму
            }).finally(() => {
                form.reset();
            });

        });
    }

    //отправка форм ------

    function showThanksModal(message){
        //получаем модальное окно 
        var prevModalDialog = document.querySelector('.modal__dialog');
        //добавляем скрытие этого окна
        prevModalDialog.classList.add('hide');
        //затем открываем родительский элемент модального окна 
        //для того чтобы в него моместить сообщение 
        openModal();

        //добавляем элемент с классом, чтобы стили распространились и на окно с сообщением 
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
        `;
        //добавляем в родительский класс 
        document.querySelector('.modal').append(thanksModal);

        //через 4 секунды возобновится модальное окно 
        setTimeout(() =>{
           thanksModal.remove(); 

           prevModalDialog.classList.add('show');
           prevModalDialog.classList.remove('hide');

           closeModal();
        }, 4000);
    }

    //чтобы проинициализировать наш проект надо прописать 
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
    fetch('db.json') 
    .then(data => {
        return data.json();
    }).then(res =>{
        return console.log(res);
    });

    // чтобы включить json-server нужно прописать команду npx json-server db.json
    //после включения сервера, нам стали доступные ссылки
    //http://localhost:3000/menu
    //http://localhost:3000/requests
    //где первая, это наша база данных 
    //А вторая, это куда мы будем постить данные 
    fetch('http://localhost:3000/menu') 
    .then(data => {
        return data.json();
    }).then(res =>{
        return console.log(res);
    });

    // в дальнейшем необходимо запускать два сервера

}

module.exports = forms;