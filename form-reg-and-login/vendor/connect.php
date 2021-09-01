<?php


 $connect = mysqli_connect('localhost', 'root', '', 'form-reg-and-login');

 if(!$connect){
     die('Error connect to DB');
 }