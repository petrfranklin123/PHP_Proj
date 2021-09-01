<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">
    <input type="text" name="name" style="display: block">
    <textarea name="content" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Отправить">
</form>
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";

try{
    $conn = new PDO("mysql:host=$servername; dbname=testdb2_1", $username, $password);
    $query = "INSERT INTO name VALUES (NULL, :name, :content)";
    $msg = $conn->prepare($query);
    $msg->execute(['name'=>$_POST['name'], 'content'=>$_POST['content']]);
    echo "Connection success";
}
catch(PDOExeption $e){
    echo "Connection failed" . $e->getMessage(); //выводим ошибку
}


?>
    
</body>
</html>