<?php

        $servername = "localhost";
        $username = "root";
        $password = "";

/*if($_GET['val']){

        try{
            //подключение базы 
            $conn = new PDO("mysql:host=$servername; dbname=webshop", $username, $password);
            //подготовка запроса
            $query = "SELECT * FROM pricelist WHERE col <= :col" ;
            


        }catch(PDOExeption $e){ //если не удалось подключиться
            echo "Connection failed" . $e->getMessage(); //выводим ошибку
        }
        $col = $_GET['val'];
        //вторая часть подготовки запроса 
        $msg = $conn->prepare($query);
        //отправляем переменные 
        $msg->execute(array('col'=> $col));

        foreach($msg as $item){
            printf('
            <div>%s</div>
        ', $item['name']);
            //echo $item['name'] . "\n";

        }

 exit();
}*/ 
if($_GET['num1']){

    printf('%s', $_GET['num1']);
    exit();
}
if($_GET['num2']){

    printf('%s', $_GET['num2']);
    exit();
}


?>
<p class="btn_class" id="9">НАЖМИ НА МЕНЯ</p>
<br>
<p id="r1">0</p>
<br>
<p id="r2">0</p>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/script.js"></script>
