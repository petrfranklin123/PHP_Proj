<?
if(isset($_GET['act'])AND isset($_GET['email'])){
 $act=$_GET['act']; 
 $act=htmlspecialchars($act);
 $act=stripslashes($act);
  $email=$_GET['email'];
   $email=htmlspecialchars($email);
    $email=stripslashes($email);
    $db = mysqli_connect('localhost', 'root', '', 'distence');
    $active=mysqli_query($db, "SELECT id FROM users WHERE email='$email'");
    $id_active=mysqli_fetch_array($active);
    $activation=md5($id_active['id']);
     if($activation=$act){
         mysqli_query($db, "UPDATE users SET activation='1' WHERE email='$email'");
         echo"<div id='pole_activation'>
         <div id='close_pole_activation'></div>
         <b><center>Вы успешно активировали свой аккаунт, можете войти вводя свой E-mail и пароль</center></b>
         </div>";
     }
}
?>

