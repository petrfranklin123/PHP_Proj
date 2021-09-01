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
    
    <form class="" action="vendor/signup.php" method="post" enctype="multipart/form-data">
        <label for="">ФИО</label>
        <input type="text" name="full_name" placeholder="Введите свое полное имя">
        <label for="">Логин</label>
        <input type="text" name="login" placeholder="Введите логин">
        <label for="">Почта</label>
        <input type="email" name="email" placeholder="Введите свою почту">
        <label for="">Изображение профиля</label>
        <input type="file" name="avatar">
        <label for="">Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <label for="">Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
        <button>Зарегистрироваться</button>
        <p>
            У вас есть аккаунт? <a href="index.php">Страница входа!</a>
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