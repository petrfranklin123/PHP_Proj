<?

    if(isset($_POST)){
        if(empty($_POST['email_2'])){
            $email_2 = $_POST['email_2'];
            if($email_2 == ''){
                unset($email_2);
                exit("<b><center>Введите E-mail</center></b>");
            }
        }elseif(empty($_POST['password_3'])){
            $password_3 = $_POST['password_3'];
            if($password_3 == ''){
                unset($password_3);
                exit("<b><center>Введите пароль</center></b>");
            }
        }
        $email_2 = stripslashes($email_2);
        $email_2 = htmlspecialchars($email_2);
        $email_2 = trim($email_2);
        $password_3 = stripslashes($password_3);
        $password_3 = htmlspecialchars($password_3);
        $password_3 = trim($password_3);
        
        $email = $_POST['email_2'];
        $password = $_POST[$password_3];
        $password = md5($password);


        $query=("SELECT id FROM users WHERE email='$email' AND activation = '1'");
        $user=mysqli_query($db, $query);
        $id_user =  mysqli_fetch_array($user);
        if(empty($id_user['id'])){
            exit("<b><center>Введенный вами e-mail неверный или аккаунт не активирован</center></b>");
        }else{
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $id_user['id'];
            echo"<meta http-equiv='Refresh' content='0; URL=news'>";
        }
        if(setcookie('email', $_POST['password'],strtotime("+30 days"),'/')){
            setcookie('email', $_POST['email'], time()+99999999);
            setcookie('password', $_POST['password'], time()+99999999);

    }

    
    }

?>