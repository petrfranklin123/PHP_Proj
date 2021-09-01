<?
if(isset($_GET['act'])AND isset($_GET['email'])){
 $act=$_GET['act']; 
 $act=htmlspecialchars($act);
 $act=stripslashes($act);
  $email=$_GET['email'];
   $email=htmlspecialchars($email);
    $email=stripslashes($email);
    $active=mysqli_query($db, "SELECT id FROM users WHERE email='$email'");
    $id_active=mysqli_fetch_array($active);
    $activation=md5($id_active['id']);
     if($activation=$act){
         mysqli_query($db, "UPDATE users SET activation='1' WHERE email='$email'");
         echo"<b><center>Вы успешно активировали свой аккаунт, можете войти вводя свой E-mail и пароль</center></b>";
     }
}
?>


<div id="login">
<div id="inform_2"></div>
    <form action="/action_login.php" method="POST">
        <div class="form_login">
            <b>E-mail</b>
            <input type="text" name="email_2" id="email_2"><br>
            <b>Password</b>
            <input type="password" name="password_3" id="password_3"><br>
            <input type="submit" name="enter" class="submit_2" value="Войти">    
        </div>
    </form>
</div>
<button id="buttom">Зарегистрироваться</button>