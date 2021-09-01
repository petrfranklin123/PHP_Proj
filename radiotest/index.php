<?
        //$value = $_GET['default'];
        //echo $value;
        include 'function.php';
        $db = connect_db();



        if($_GET['idd']){
           $id = $_GET['idd'];

           $id_cookie = $id;
           setcookie("id_cookie", $id_cookie, time()+3600);

                $goods = get_text($db, $id);


                foreach ($goods as $item){

                    $info = $item['info'];
                    $info_i = file_get_contents("$info");
                printf('
                

                <div class="card">
                <div class="card_flex">
                    <div class="left">
                        <div class="card_image"><img src="%s" alt=""></div>
                        <div class="card_a"><a href="#">В корзину</a></div>
                    </div>
                    <div class="right">
                        <h3><a href="#">%s</a> <br></h3>
                        <p class="card_info">%s
                        </p>
                        <div class="price">%s РУБ</div>
                    </div>
                </div>
            </div>
                
                            ',$item['image'], $item['name'], $info_i,  $item['price']);

                }
            exit();

        }?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>


    <div class="wrapper">
    
<div class="form_radio_btn">
	<input class="input" id="1" type="radio" name="radio" value="1">
	<label for="1">Стандартное</label>
</div>
 
<div class="form_radio_btn">
	<input class="input" id="2" type="radio" name="radio" value="2">
	<label for="2">По возрастанию</label>
</div>
 
<div class="form_radio_btn">
	<input class="input" id="3" type="radio" name="radio" value="3">
	<label for="3">По убыванию</label>
</div>
 
<div class="form_radio_btn">
	<input class="input" id="4" type="radio" name="radio" value="4">
	<label for="4">В алфавитном порядке с начала</label>
</div>
<div class="form_radio_btn">
	<input class="input" id="5" type="radio" name="radio" value="5">
	<label for="5">В алфавитном порядке с конца</label>
</div>
 
<div class="form_radio_btn">
	<input class="input" id="6" type="radio" name="radio" value="6">
	<label for="6">Шуруповерты</label>
</div>
 
<div class="form_radio_btn">
	<input class="input" id="7" type="radio" name="radio" value="7">
	<label for="7">Дрели</label>
</div>
 
<div class="form_radio_btn">
	<input class="input" id="8" type="radio" name="radio" value="8">
	<label for="8">Перфораторы</label>
</div>
<div class="form_radio_btn">
	<input class="input" id="9" type="radio" name="radio" value="9">
	<label for="9">Аккумуляторы</label>
</div>
        <!--<form action="" method="GET">-->
    <!--<input class="input" type="radio" name="default" id="1" checked value="1">
    <input class="input" type="radio" name="default" id="2"  value="2">
    <input class="input" type="radio" name="default" id="3"  value="3">-->

    <!--<button type="submit" >Сортировать</button>-->
    <!--</form>-->
                    <div id="content">
                    
                    <?
                   if($_COOKIE["id_cookie"]){

            $id = $_COOKIE["id_cookie"];
            $goods = get_text($db, $id);


            foreach ($goods as $item){

                $info = $item['info'];
                $info_i = file_get_contents("$info");
            printf('


            <div class="card">
            <div class="card_flex">
                <div class="left">
                    <div class="card_image"><img src="%s" alt=""></div>
                    <div class="card_a"><a href="#">В корзину</a></div>
                </div>
                <div class="right">
                    <h3><a href="#">%s</a> <br></h3>
                    <p class="card_info">%s
                    </p>
                    <div class="price">%s РУБ</div>
                </div>
            </div>
            </div>

                        ',$item['image'], $item['name'], $info_i ,  $item['price']);

            }
            //exit();
            }
            else{
            $goods = get_text($db);
            
            }
            ?>

        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>