<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
</head>
<body>

    <div class="block_dop_info">
        <form action="" class="form_dop_info">
            <input class="style_input_dop_info" type="text">
            <input class="style_input_dop_info" type="text">
            <select>
                <option selected disabled>Город</option>
                <?
                    $db = mysqli_connect('localhost', 'root', '', 'distence');
                    $active="SELECT town FROM cities";
                    $result = mysqli_query($db, $active) or trigger_error(mysql_error()." in ". $sql);
                    for($i = 0; $i < mysqli_num_rows($result); $i++){
                        $goods[] = mysqli_fetch_array($result);
                    }
                    $number = 0;
                    foreach ($goods as $item){
                        printf('<option value="%s">%s</option>',$number, $item['town']);
                        $number + 1;
                    }

                ?>

            </select>

            <select>
                <option selected disabled>Дата рождения</option>
                <?
                for($i = 2020; $i > 1900; $i--){
                    echo "<option value=".$i.">".$i."</option>";
                }
                ?>

            </select>
        </form>
    </div>
    
</body>
</html>