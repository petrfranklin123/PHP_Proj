<?php
    print_r ($_POST); 


    $name = $_POST["name"];
    $name_document = file_get_contents("content/1.txt");
    echo $name_document;
    $name = $name . ' ' . $name;
    file_put_contents('test.txt', "$name");