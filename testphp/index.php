<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for($i = 0; $i < 2; $i++):
    ?>
        <img src=" <?php echo $i + 1 ?>.jpg" alt="">
        </br>
    <?php endfor; ?>
</body>
</html>