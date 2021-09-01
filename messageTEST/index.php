<?function connect_db_PDO(){
    //подключаем базу данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    
try{
    //подключение базы 
    $conn = new PDO("mysql:host=$servername; dbname=messtest", $username, $password);
    //подготовка запроса
    echo "Подключение осуществлено";

}catch(PDOExeption $e){ //если не удалось подключиться
    echo "Connection failed" . $e->getMessage(); //выводим ошибку
}
    return $conn;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="conteiner">
        <div class="block__massege">
            <div class="massages">
                <div class="massege">
                    <p>Привет мир!</p>
                </div>
                <?
                    connect_db_PDO()
                ?>
            </div>
            <div class="block_read">
                <input class="read" id="read_input" type="text">
                <button class="read_buttom" id="buttom_id">Отправиить</button>
            </div>
        </div>
    </div>
</body>
</html>