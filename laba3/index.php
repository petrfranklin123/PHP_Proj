<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-------------------------------------Блок шапки (начало)------------------------------------>
            <?php require "blocks/header.php" ?>
<!-------------------------------------Блок шапки (конец)------------------------------------>
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

                    <?php
                    
                    
                    $input = file_get_contents("content.txt"); ?>


                    <? $str = explode(";;", $input);?>
                    
                    <?php for($i = 0; $i < 8; $i++): ?>

                    <?//echo $str[$i];?>

                    <?php
                    $inputt = $str[$i];
                    $piecess = explode(";", $inputt); ?>
                    <?//echo $piecess[0];?>
                    <?//echo $piecess[1];?> 
                    <?//echo $piecess[2];?> 
                    <?//echo $piecess[3];?> 

                    <? $info = file_get_contents("$piecess[2]"); ?>
                    <?php for($j = 0; $j < 4; $j++): ?>

                       <? $infof = explode("<>", $info); ?>
                       <?//echo $infof[$j];?>
                    <?php endfor; ?>
                    <div class="card">
                            <div class="card_flex">
                                <div class="left">
                                    <div class="card_image"><img src="<?php echo $piecess[0]; ?>" alt=""></div>
                                    <div class="card_a"><a href="#">В корзину</a></div>
                                </div>
                                <div class="right">
                                    <h3><a href="#"><?php echo $piecess[1]; ?></a> <br></h3>
                                    <p class="card_info"><?php echo $infof[0]; ?><br>
                                    <?php echo $infof[1]; ?><br>
                                    <?php echo $infof[2]; ?><br>
                                    <?php echo $infof[3]; ?></p>
                                    <div class="price"><?php echo $piecess[3]; ?></div>
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