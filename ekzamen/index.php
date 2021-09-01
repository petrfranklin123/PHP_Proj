<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


$ss=rob();
echo $ss;

function rob($ss="261982-frederika.jpg", $width="320", $height="200"){
    $conn = '<img src="'.$ss.'" width="'.$width.'" height="'.$height.'" alt="картинка">';
    return($conn);
}


?>
</body>
</html>