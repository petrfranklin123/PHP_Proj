<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSHOP</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
<body>
<!-------------------------------------Блок шапки (начало)------------------------------------>
            <?php require "blocks/header.php" ?>
<!-------------------------------------Блок шапки (конец)------------------------------------>
                <div class="forma">
                
                <div class="forma_text"><a href="form_add.php">Добавить в каталог товаров</a></div>

                </div>
            <div class="body">

                <div class="conteiner_body">
                    <div class="block_1">
                        <div class="map">
                            <p><a href="#">Главная</a> >> Аккумуляторные дрели и шуруповерты</p>
                        </div>
                        <div class="body_title">
                            <h2>Аккумуляторные дрели и шуруповерты</h2>
                        </div>

<!-------------------------------------Блок размещения сетки (начало)------------------------------------>
                    <?
                            $file = file('content1.txt');
                            $r = count($file);
                            $number = $r;
                    ?>
                        
                    <? $str = explode(";;", $input);?>
                    
                    <?php for($i = 0; $i < $number; $i++): ?>

                    <?php
                    $inputt = $file[$i];
                    $piecess = explode("|", $inputt); ?>

                    <div class="card">
                            <div class="card_flex">
                                <div class="left">
                                    <div class="card_image"><img src="<?php echo $piecess[4]; ?>" alt=""></div>
                                    <div class="card_a"><a href="#">В корзину</a></div>
                                </div>
                                <div class="right">
                                    <h3><a href="#"><?php echo $piecess[1]; ?></a> <br></h3>
                                    <p class="card_info"><?php echo file_get_contents("$piecess[3]"); ?>
                                    </p>
                                    <div class="price"><?php echo $piecess[2]; ?></div>
                                </div>
                            </div>
                        </div>

                    <?php endfor; ?>



<!-------------------------------------Блок размещения сетки (конец)------------------------------------>

                        <div class="stranica">
                            <div class="stranica_title">Страницы</div>
                            <ul class="number">
                                <li><a href="#" id="select">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">все</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="block_2">
                        <div class="block_2_title">
                            Каталог
                        </div>
                        <ul class="ul_menu">
                            <li><a href="#">Аккумуляторный инструмент</a>
                                <ul>
                                    <li><a href="#">Система 18 В</a></li>
                                    <li><a href="#">Система 14,4 В</a></li>
                                    <li><a href="#">Система 12 В</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Лазерные уровни, дальномеры</a></li>
                            <li><a href="#">Сетевые дрели, шуруповерты, миксеры</a></li>
                            <li><a href="#">Перфораторы и отбойные молотки</a></li>
                            <li><a href="#">Металлообработка</a></li>
                        </ul>

                    </div>
                </div>

            </div>
<!-------------------------------------Блок футера (начало)------------------------------------>
        <?php require "blocks/footer.php" ?>
<!-------------------------------------Блок футера (конец)------------------------------------>
    </div>


</body>
</html>