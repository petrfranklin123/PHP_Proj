<?

        include 'function.php';
        $db = connect_db();
        $conn = connect_db_PDO();


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
        <?php


if($_GET['val']){
    //include 'function.php';

        $query = "SELECT * FROM pricelist WHERE col <= :col" ;
        $col = $_GET['val'];
        //вторая часть подготовки запроса 
        $msg = $conn->prepare($query);
        //отправляем переменные 
        $msg->execute(array('col'=> $col));

        foreach($msg as $item){
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
}
?>
<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSHOP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
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
                    <label for="4">С начала</label>
                </div>
                <div class="form_radio_btn">
                    <input class="input" id="5" type="radio" name="radio" value="5">
                    <label for="5">С конца</label>
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
                <div class="polzun">
                <p class="col_plzun">Сортировка по количеству: </p>
                <p id="value_polzun">1</p>
                <div class="conteiner_polzun">
                        <input id="plzun" type="range" min="1" max="100" step="1" value="1"> 
                </div>
                </div>
                
<!-------------------------------------Блок размещения сетки (начало)------------------------------------>
                <div id="wrapper">

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
            }
            ?>
            </div>
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

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Вывод таблицы</title>
  <link rel="stylesheet" href="main.css">
</head>

<body>
  <div class="table-block">
    <table>
      <thead>
        <tr>
          <?php
          if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
          } else {
            $sort = "ASC";
          }

          if (isset($_GET['title'])) {
            $title = $_GET['title'];
          } else {
            $title = "Name";
          }

          if ($sort == 'ASC' && $title == 'Name') {
            array_multisort($data_name, SORT_ASC, $AssociativeArray);
          }
          if ($sort == 'DESC' && $title == 'Name') {
            array_multisort($data_name, SORT_DESC, $AssociativeArray);
          }
          if ($sort == 'ASC' && $title == 'Gender') {
            array_multisort($data_gender, SORT_ASC, $AssociativeArray);
          }
          if ($sort == 'DESC' && $title == 'Gender') {
            array_multisort($data_gender, SORT_DESC, $AssociativeArray);
          }
          if ($sort == 'ASC' && $title == 'Seasons') {
            array_multisort($data_seasons, SORT_ASC, $AssociativeArray);
          }
          if ($sort == 'DESC' && $title == 'Seasons') {
            array_multisort($data_seasons, SORT_DESC, $AssociativeArray);
          }
          $sort == 'DESC' ? $sort = 'ASC' : $sort = 'DESC';
          ?>
          <?php

          foreach ($titleList as $titleItem) {
            $_GET['title'] == $titleItem ? $color = "#6e00ff2e" : $color = "#ffffff";
            echo "<th style=background-color:$color><a href=?title=$titleItem&sort=$sort>$titleItem</a></th>";
          }
          ?>
          <th>Languages</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        <?php

        foreach ($AssociativeArray as $array) {
          echo "<tr>";
          echo "<td>";
          echo "<span>" . $array['name'] . "</span>";
          echo "</td>";
          echo "<td>";
          echo "<span>" . $array['gender'] . "</span>";
          echo "</td>";
          echo "<td>";
          echo "<span>" . $array['seasons'] . "</span>";
          echo "</td>";
          echo "<td>";
          echo "<ul class='technologies__list'>";
          foreach ($array['languages'] as $language) {
            echo "<li class='technologies__item'>";
            echo "<span>$language</span>";
            echo "</li>";
          }
          echo "</ul>";
          echo "</td>";
          echo "<td>";
          echo "<div>";
          echo "<img src=" . $array['image'] . " alt='Картинка' width='130' />";
          echo "</div>";
          echo "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>






<div class="item_table">
                <div class="tab name"><?=$array['name']?></div>
                <div class="tab gender"><?=$array['gender']?></div>
                <div class="tab seasons"><?=$array['seasons']?></div>
                <div class="tab languages"><?=$array['languages']?></div>
                <div class="tab image"><img src=<?=$array['image']?>alt='Картинка' width='130' /></div>
            </div>


            <div class="header_table">
                <div class="tab name">name</div>
                <div class="tab gender">gender</div>
                <div class="tab seasons">seasons</div>
                <div class="tab languages">languages</div>
                <div class="tab image">image</div>
            </div>