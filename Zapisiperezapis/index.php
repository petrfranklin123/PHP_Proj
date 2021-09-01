<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form_block">

            <select name="pod_cat_mat" id="pod_cat_mat">
            <option value="1">Первый</option>
            <option value="2">Второй</option>
            </select>

            <button type="submit" >Загрузить</button>

    </div>

</form> 



<?php

//$paramm = true;
//$paramm = false;

$paramm = $_POST['pod_cat_mat'];

function foo($param){
if($param == 1){
    $f = fopen("content.txt", "a");
    fwrite($f, "TRUE.\r\n");
}else{
    $f = fopen("content.txt", "w");
    fwrite($f, "FALSE.\r\n");
}
fclose($f);

$str = htmlentities(file_get_contents("content.txt"));
echo $str;    
}

foo($paramm);


?>
</body>
</html>