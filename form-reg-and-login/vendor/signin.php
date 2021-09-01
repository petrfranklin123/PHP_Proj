<?
    session_start();

    require_once 'connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = ("SELECT * FROM users WHERE login = '$login' AND password = '$password'");

    $check_user = mysqli_query($connect, $query);


    //echo mysqli_num_rows($check_user);
    if(mysqli_num_rows($check_user) > 0){

    }else{
        $_SESSION['message'] = 'Неверный логин или пароль!';
        header('Location: ../index.php');
    }
?>