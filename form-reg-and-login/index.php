<?
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <form class="" action="vendor/signin.php" method="post">
        <label for="">Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label for="">Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button>Войти</button>
        <p>
            У вас нет аккаунта? <a href="register.php">Зарегистрируйтесь!</a>
        </p>
        <?
            if($_SESSION['message']){
                echo '<p class="msg">'.$_SESSION['message'].'</p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>

</body>
</html>