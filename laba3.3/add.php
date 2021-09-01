<?php
   header('Location: /index.php');
   // var_dump($_POST);
    //if($_POST['name']==" " || $_POST['price']==" " || $_POST['info']==" "){
    //    exit;
    //}else{
        $file = file('content1.txt');

        $r = count($file);
            echo $r; ?> <br> <?
        for($i = 0 ; $i <= $r ; $i++){
            echo $file[$i];
        }
        $number = $r+1;

        $f_info = $_POST['info'];

        $location_info = "info/".$number.".txt";
        file_put_contents( $location_info , $f_info);

        $name_image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, "images/" . $number . ".jpg");
        $location_image = "images/" . $number . ".jpg";

        file_put_contents('content1.txt', $number. "|" . $_POST['name']. "|" .$_POST['price']. " РУБ". "|" .$location_info . "|". $location_image . "\n" , FILE_APPEND);
        //$con = file_get_contents('content1.txt');
       // echo  $con;

   // }

