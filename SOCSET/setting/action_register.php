<?
if(isset($_POST)){
    if(empty($_POST['email'])){
        echo"<b><center><font size=4 color=red>Введите ваш E-mail</font></center></b>";
    
    } elseif(!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/",$_POST['email'])){
      echo"<b><center><font size=4 color=red>некоректный E-mail, например domain@domain.ru</font></center></b>";
        }
        elseif(empty($_POST['password'])){
        echo"<b><center><font size=4 color=red>Придумайте пароль</font></center></b>";
    }
    elseif(!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])){
         echo"<b><center><font size=4 color=red>Пароль должен быь от 6 до 20 символов</font></center></b>"; 
    }
    elseif(empty($_POST['password_2'])){
        echo"<b><center><font size=4 color=red>Повторите ваш пароль</font></center></b>";
    }
     elseif($_POST['password']!=$_POST['password_2']){
        echo"<b><center><font size=4 color=red>Введеные пароли не совпадают</font></center></b>";
    }else{
         $email=htmlspecialchars($_POST['email']);
           $password=htmlspecialchars($_POST['password']);
           $password_2=htmlspecialchars($_POST['password_2']);
           $data=date("d-m-y в H:i");
           $password=(md5($_POST['password']));
             $ip=$_SERVER['REMOTE_ADDR'];
             
              $query=("SELECT id FROM users WHERE email='$email'");
             $sql=mysqli_query($db, $query);
             if(mysqli_num_rows($sql)>0){
                echo"<b><center><font size=4 color=red>пользователь с таким E-mail уже зарегистрированн</font></center></b>";
             }else{
                  $q="INSERT INTO users(email, password, data, ip, activation)VALUES('$email','$password', '$data', '$ip', '0')";
                  $result=mysqli_query($db, $q);

                  $zapr_select_mail ="SELECT id FROM users WHERE email='$email'";
                  $active = mysqli_query($db, $zapr_select_mail);
                  $id_acrive = mysqli_fetch_array($active);
                  $activation = md5($id_acrive['id']);
                  $subject = "Подтверждение регистрации";
                  $message = "Перейдите по ссылке, чтобы подтвердить регистрацию на сайте SOCSET.ru /n Ваш E-mail: ".$email." /n
                  Ссылка: /n http://socset/index?email=".$email."&act=".$activation."/n/n";
                  print mail($email, $subject, $message, "Content-type:text/plane; Charset=utf-8\n\n");

                  exit("<b><center><font size=4 color=green>Вы успешно зарегистрировались, на ваш E-mail отправлена ссылка для подтверждения!</font></center></b>");
             }
    }
}
?>