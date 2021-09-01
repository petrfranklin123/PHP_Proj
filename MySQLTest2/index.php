<?php
$servername = "localhost";
$username = "root";
$password = "";


$conn = new mysqli($servername, $username, $password);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE testDB2_1";

if($conn->query($sql)===TRUE){
    echo "Like";
}else{
    echo "Error" . $conn->error;
}
?>