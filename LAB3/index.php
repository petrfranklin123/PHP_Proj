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
                        <?  
    //$checked = "checked";
    $value = $_POST['default'];
    $string = $_POST['name'];
    $checked = $_POST['checked'];
    $select = $_POST['select'];

    //$s1 = '<input type="radio" name="default" id="voz" checked value="">';
        if($value == '1'){
            $s1 = '<input type="radio" name="default" id="def" checked value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
            ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <label for="def">Стандартное</label>
            <? echo $s1; ?>
            <label for="voz">По возрастанию</label>
            <? echo $s2; ?>
            <label for="ubiv">По убыванию</label>
            <? echo $s3; ?>
            <label for="abc">A,B,C...</label>
            <? echo $s4; ?>
            <label for="xyz">Z,Y,X...</label>
            <? echo $s5; ?>
            <button type="submit" >Сортировать</button>
            </form>
            <br>
            </div>
        <?
            require "def.php";
        }else if($value == '2'){
            $s1 = '<input type="radio" name="default" id="def" value="1">';
            $s2 = '<input type="radio" name="default" id="voz" checked value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
            
            ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <label for="def">Стандартное</label>
            <? echo $s1; ?>
            <label for="voz">По возрастанию</label>
            <? echo $s2; ?>
            <label for="ubiv">По убыванию</label>
            <? echo $s3; ?>
            <label for="abc">A,B,C...</label>
            <? echo $s4; ?>
            <label for="xyz">Z,Y,X...</label>
            <? echo $s5; ?>
            <button type="submit" >Сортировать</button>
            </form>
            <br>
            </div>
        <?
            require "voz.php";
        }else if($value == '3'){
            $s1 = '<input type="radio" name="default" id="def" value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" checked value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" value="5">'; ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <label for="def">Стандартное</label>
            <? echo $s1; ?>
            <label for="voz">По возрастанию</label>
            <? echo $s2; ?>
            <label for="ubiv">По убыванию</label>
            <? echo $s3; ?>
            <label for="abc">A,B,C...</label>
            <? echo $s4; ?>
            <label for="xyz">Z,Y,X...</label>
            <? echo $s5; ?>
            <button type="submit" >Сортировать</button>
            </form>
            <br>
            </div>
        <?
            require "ubiv.php";
        }else if($value == '4'){
            $s1 = '<input type="radio" name="default" id="def" value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" checked value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" value="5">'; ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <label for="def">Стандартное</label>
            <? echo $s1; ?>
            <label for="voz">По возрастанию</label>
            <? echo $s2; ?>
            <label for="ubiv">По убыванию</label>
            <? echo $s3; ?>
            <label for="abc">A,B,C...</label>
            <? echo $s4; ?>
            <label for="xyz">Z,Y,X...</label>
            <? echo $s5; ?>
            <button type="submit" >Сортировать</button>
            </form>
            <br>
            </div>
        <?
            require "ABC.php";
        }else if($value == '5'){
            $s1 = '<input type="radio" name="default" id="def" value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" checked value="5">'; ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <label for="def">Стандартное</label>
            <? echo $s1; ?>
            <label for="voz">По возрастанию</label>
            <? echo $s2; ?>
            <label for="ubiv">По убыванию</label>
            <? echo $s3; ?>
            <label for="abc">A,B,C...</label>
            <? echo $s4; ?>
            <label for="xyz">Z,Y,X...</label>
            <? echo $s5; ?>
            <button type="submit" >Сортировать</button>
            </form>
            <br>
            </div>
        <?
            require "ZYX.php";
        }
        
        else{
            $s1 = '<input type="radio" name="default" id="def" checked value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" value="5">'; ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <label for="def">Стандартное</label>
            <? echo $s1; ?>
            <label for="voz">По возрастанию</label>
            <? echo $s2; ?>
            <label for="ubiv">По убыванию</label>
            <? echo $s3; ?>
            <label for="abc">A,B,C...</label>
            <? echo $s4; ?>
            <label for="xyz">Z,Y,X...</label>
            <? echo $s5; ?>
            <button type="submit" >Сортировать</button>
            </form>
            <br>
            </div>
        <?
            require "def.php";
           
        }
?>                        


<!-------------------------------------Блок размещения сетки (начало)------------------------------------>

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