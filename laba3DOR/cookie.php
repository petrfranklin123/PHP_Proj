<?php
if($_POST["nameB"]){
    setcookie("sort", $_POST["nameB"], time()+3600);
}
$new_url = 'table.php';
header('Location: '.$new_url);
?>