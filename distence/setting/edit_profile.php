<?php
session_start();
print_r($_POST);
print_r($_SESSION[email]);




$email = $_SESSION[email];
$name = $_POST[input_name];
$famale = $_POST[input_famale];


$db = mysqli_connect('localhost', 'root', '', 'distence');
$q = "UPDATE info_profile SET name='".$name."', famile='".$famale."' WHERE email_profile='".$email."';";                  
$result=mysqli_query($db, $q);