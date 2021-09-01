<?php
   header('Location: /index.php');

        if(($_POST['name'] != '')&&($_POST['price']!= '')&&($_POST['info']!= '')){

        $servername = "localhost";
        $username = "root";
        $password = "";


        try{
            $conn = new PDO("mysql:host=$servername; dbname=webshop", $username, $password);
            $query = "INSERT INTO pricelist VALUES (NULL, :name, :price, :col, :class_t, :info, :image, :pod_cat_mat)";
            
            //$f_info = $_POST['info'];
            //$location_info = "info/".$_POST['name'].".txt";
            //file_put_contents( $location_info , $f_info);
            
            $name_image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name, "images/" . $_POST['name'] . ".jpg");
            $location_image = "images/" . $_POST['name'] . ".jpg";


            $msg = $conn->prepare($query);
            $msg->execute(['name'=>$_POST['name'], 'price'=>$_POST['price'], 'col'=>$_POST['col'], 'class_t'=>$_POST['class_t'], 'info'=>  $_POST['info'], 'image'=> $location_image, 
            'pod_cat_mat'=>$_POST['pod_cat_mat']]);
        }catch(PDOExeption $e){
            echo "Connection failed" . $e->getMessage(); //выводим ошибку
        }

    }

?>