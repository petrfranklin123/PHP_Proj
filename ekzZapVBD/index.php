<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form_block">

            <input type="text" name="name" id="name">

            <button type="submit" >Загрузить</button>

    </div>

</form> 

<?php

function connect_db_PDO($name){
    //подключаем базу данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    
try{
    //подключение базы 
    $conn = new PDO("mysql:host=$servername; dbname=ekzam", $username, $password);
    //подготовка запроса
    $query = "INSERT INTO zap VALUES (NULL, :name)";
            
    $msg = $conn->prepare($query);
    $msg->execute(['name'=>$_POST['name'] ]);
    echo "Запись совершена!";

}catch(PDOExeption $e){ //если не удалось подключиться
    echo "Connection failed" . $e->getMessage(); //выводим ошибку
}
    return $conn;
}
$name = 'Вася';
connect_db_PDO($name);

?>


</body>
</html>