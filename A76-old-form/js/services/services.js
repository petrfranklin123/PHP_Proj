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

    //слайдер
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


    export {postData};
    export {getResource};