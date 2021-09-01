<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<? 
    include 'function.php';
?>
    <form action="" method="POST">
    <button name="name" value="qwer" type="submit">отправить</button>
    <button name="namee" value="rewq" type="submit">отправить</button>
    </form>
<?
    $value = $_POST['name'];
    if($value = 'qwer'){
        echo "Сработало";
    }else{
        echo "Не сработало";
    }

?>
    
</body>
</html>