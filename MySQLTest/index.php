
<?php
//ООП подход
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){ //если переменная получит 
    die("Connection falied: " .$conn->connect_error); //вывод причины ошибки 
}else{
    echo "Connection success";
}
?>
<br>

<?php
//Процедурный подход

$conn1 = mysqli_connect($servername, $username, $password);

if(!$conn1){ //если соединение не прошло  
    die("Connection falied: " .mysqli_connect_error()); //вывод причины ошибки 
}else{
    echo "Connection success";
}
?>
<br>

<?php
//PDO позволит подключать другие БД
    try{
        $conn1 = new PDO("mysql:host=$servername; dbname=newdb", $username, $password);
        echo "Connection success";
    }
    catch(PDOExeption $e){
        echo "Connection failed" . $e->getMessage(); //выводим ошибку
    }
?>