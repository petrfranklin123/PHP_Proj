<?
session_start();

    $db = mysqli_connect('localhost', 'root', '', 'distence');
    $email_session = $_SESSION['email'];
    $q = "SELECT * FROM info_profile WHERE email_profile='$email_session'";  
    $result=mysqli_query($db, $q);
    $row = mysqli_fetch_row($result);
    echo $row[0];

?>