<?
        include 'function.php';
        $db = connect_db();
        $conn = connect_db_PDO();
        if($_GET['select_list']){
            //echo ($_GET['back']. '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
            $id = $_GET['select_list'];
                 $goods = select_list_tovar($db, $id);
                // print_r($goods);
                 if($goods == ""){
                     echo "Такой товар отсутствует.";
                 }else{
                 foreach ($goods as $item){
                     print_r($goods);
                     $info = $item['info'];
                     echo $item[0];
                   //  print_r($goods);
                 printf('
                 <div class="card">
                 <div class="card_flex">
                     <div class="left">
                         <div class="card_image"><img src="%s" alt=""></div>
                         <div class="card_a"><a href="#">В корзину</a></div>
                     </div>
                     <div class="right">
                         <h3><a class="select_obj" href="#" id="%s" value="1">%s</a> <br></h3>
                         <p class="card_info">%s
                         </p>
                         <div class="price">%s РУБ</div>
                     </div>
                 </div>
                 </div>
                             ',$item['image'], $item[0], $item['name'], $info,  $item['price']);
                 }
                }
                exit();
         }
//Скрипт, который не работает при нажатии кнопки "Назад"
        elseif($_GET['back']){
            //echo ($_GET['back']. '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
            $id = $_GET['back'];
                 $goods = get_text($db, $id);
                 foreach ($goods as $item){
                     $info = $item['info'];
                 printf('
                 <div class="card">
                 <div class="card_flex">
                     <div class="left">
                         <div class="card_image"><img src="%s" alt=""></div>
                         <div class="card_a"><a href="#">В корзину</a></div>
                     </div>
                     <div class="right">
                         <h3><a class="select_obj" href="#" id="%s" value="1">%s</a> <br></h3>
                         <p class="card_info">%s
                         </p>
                         <div class="price">%s РУБ</div>
                     </div>
                 </div>
                 </div>
                             ',$item['image'], $item['id'], $item['name'], $info,  $item['price']);
                 }
                exit();
         }
//Блок вывода конкретного товара 
        elseif($_GET['window']){
            $get =$_GET['window'];

            $goods = select_tovar($db, $get);
           // echo $_COOKIE["id_get_back"];

           $info = $goods['info'];
            printf('        
        <a class="back_id" id="%s" href="">Назад</a>
            <div class="back_card">
            <div class="card_flex back_card_flex">
                <div class="left">
                    <div class="card_image"><img src="%s" alt=""></div>
                    <div class="card_a"><a href="#">В корзину</a></div>
                </div>
                <div class="right">
                    <h3><span class=""  id="%s"  value="1">%s</span><br></h3>
                    <p class="card_info">%s
                    </p>
                    <div class="price">%s РУБ</div>
                    
                   
                </div>
                <div class="categogy"> 
                        <div class="cat">Категория: %s</div>
                        <div class="pogcat">Подкатегория: %s</div>
                    </div>
            </div>
        </div>  
                        ',$_COOKIE["id_get_back"] ,$goods['image'], $goods['id'], $goods['name'], $info,  $goods['price'], $goods['class_name'],  $goods['pod_cat']);

            exit();
        }
// Блок вывода каталога с сортировкой 
    elseif($_GET['idd']){
           $id = $_GET['idd'];  
        if($id=='1' || $id=='2' || $id=='3' || $id=='4' || $id=='5' || $id=='10' || $id=='11'){
           $id_cookie = $id;
           setcookie("id_cookie", $id_cookie, time()+3600);
        }
            setcookie("id_get_back", $id, time()+3600);

                $goods = get_text($db, $id);
      
 
                foreach ($goods as $item){

                    $info = $item['info'];

                printf('
                

                <div class="card">
                <div class="card_flex">
                    <div class="left">
                        <div class="card_image"><img src="%s" alt=""></div>
                        <div class="card_a"><a href="#">В корзину</a></div>
                    </div>
                    <div class="right">
                        <h3><a class="select_obj" href="#" id="%s" onclick="f1()" value="1">%s</a> <br></h3>
                        <p class="card_info">%s
                        </p>
                        <div class="price">%s РУБ</div>
                    </div>
                </div>
                </div>
                            ',$item['image'], $item['id'], $item['name'], $info,  $item['price']);


                           
                }
            exit();

        }?>
        <?php

?>
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



            <select id="selectt" onchange="getell()">


                <?
                $id = $_COOKIE["id_cookie"];
                if($id == '1'){?>
                <option value='1' selected>Стандартная сортировка</option>
                <option value='2'>Цена по возрастанию</option>
                <option value='3'>Цена по убыванию</option>
                <option value='4'>По алфавиту с начала</option>
                <option value='5'>По алфавиту с конца</option>
                <option value='10'>Количество по возрастанию</option>
                <option value='11'>Количество по убыванию</option>
                <?}else if($id == '2'){?>
                <option value='1'>Стандартная сортировка</option>
                <option value='2' selected>Цена по возрастанию</option>
                <option value='3'>Цена по убыванию</option>
                <option value='4'>По алфавиту с начала</option>
                <option value='5'>По алфавиту с конца</option>
                <option value='10'>Количество по возрастанию</option>
                <option value='11'>Количество по убыванию</option>
                <?}else if($id == '3'){?>
                <option value='1'>Стандартная сортировка</option>
                <option value='2' >Цена по возрастанию</option>
                <option value='3' selected>Цена по убыванию</option>
                <option value='4'>По алфавиту с начала</option>
                <option value='5'>По алфавиту с конца</option>
                <option value='10'>Количество по возрастанию</option>
                <option value='11'>Количество по убыванию</option>
                <?}else if($id == '4'){?>
                <option value='1'>Стандартная сортировка</option>
                <option value='2'>Цена по возрастанию</option>
                <option value='3'>Цена по убыванию</option>
                <option value='4' selected>По алфавиту с начала</option>
                <option value='5'>По алфавиту с конца</option>
                <option value='10'>Количество по возрастанию</option>
                <option value='11'>Количество по убыванию</option>
                <?}else if($id == '5'){?>
                <option value='1'>Стандартная сортировка</option>
                <option value='2' >Цена по возрастанию</option>
                <option value='3'>Цена по убыванию</option>
                <option value='4'>По алфавиту с начала</option>
                <option value='5' selected>По алфавиту с конца</option>
                <option value='10'>Количество по возрастанию</option>
                <option value='11'>Количество по убыванию</option>
                <?}else if($id == '10'){?>
                <option value='1'>Стандартная сортировка</option>
                <option value='2'>Цена по возрастанию</option>
                <option value='3'>Цена по убыванию</option>
                <option value='4'>По алфавиту с начала</option>
                <option value='5'>По алфавиту с конца</option>
                <option value='10' selected>Количество по возрастанию</option>
                <option value='11'>Количество по убыванию</option>
                <?}else if($id == '11'){?>
                <option value='1'>Стандартная сортировка</option>
                <option value='2' >Цена по возрастанию</option>
                <option value='3'>Цена по убыванию</option>
                <option value='4'>По алфавиту с начала</option>
                <option value='5'>По алфавиту с конца</option>
                <option value='10'>Количество по возрастанию</option>
                <option value='11' selected>Количество по убыванию</option>
                <?}else{?>
                <option value='1' selected>Стандартная сортировка</option>
                <option value='2'>Цена по возрастанию</option>
                <option value='3'>Цена по убыванию</option>
                <option value='4'>По алфавиту с начала</option>
                <option value='5'>По алфавиту с конца</option>
                <option value='10'>Количество по возрастанию</option>
                <option value='11'>Количество по убыванию</option>

                <?}?>

            </select>


<!-------------------------------------Блок размещения сетки (начало)------------------------------------>
                <div id="wrapper">

                <?
                    $id = $_COOKIE["id_cookie"];
                         if($id=='1' || $id=='2' || $id=='3' || $id=='4' || $id=='5' || $id=='10' || $id=='11'){
                   if($_COOKIE["id_cookie"]){

                    
            $goods = get_text($db, $id);
            
            $arr;
            $i = 0;
            foreach ($goods as $item){
             //   echo ($_GET['back']. '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                $info = $item['info'];
                //$info_i = file_get_contents("$info");
            printf('


            <div class="card">
            <div class="card_flex">
                <div class="left">
                    <div class="card_image"><img src="%s" alt=""></div>
                    <div class="card_a"><a href="#">В корзину</a></div>
                </div>
                <div class="right">
                    <h3><a class="select_obj" href="#" id="%s" onclick="f1()" value="1">%s</a> <br></h3>
                    <p class="card_info">%s
                    </p>
                    <div class="price">%s РУБ</div>
                </div>
            </div>
            </div>

                        ',$item['image'], $item['id'], $item['name'], $info ,  $item['price']);
                        

            }
            //exit();
            }
        }
           else{
            $goods = get_text($db);
            $arr;
            $i = 0;
            foreach ($goods as $item){
               // echo ($_GET['back']. '!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!');
                $info = $item['info'];
               // $info_i = file_get_contents("$info");
            printf('


            <div class="card">
            <div class="card_flex">
                <div class="left">
                    <div class="card_image"><img src="%s" alt=""></div>
                    <div class="card_a"><a href="#">В корзину</a></div>
                </div>
                <div class="right">
                    <h3><a class="select_obj" href="#" id="%s" onclick="f1()" value="1">%s</a> <br></h3>
                    <p class="card_info">%s
                    </p>
                    <div class="price">%s РУБ</div>
                </div>
            </div>
            </div>

                        ',$item['image'], $item['id'], $item['name'], $info ,  $item['price']);
                        

                       

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

            <div class="block one">
            <div class="block_item">
                <div class="block_title">
                    <a class="input" id="6" href="#">Шуруповерты</a>
                </div>
                <div class="block_text">
                     <ul>
                        <?
                        $goods = select_list($db);
                        $tip = 1;
                        $i = 1;
                        foreach($goods as $item){
                            $accum = $tip.$i;
                            printf('<li><a class="select_list" id="%s" href="#">%s</a></li>', $accum, $item['pod_cat']);
                            $i++;  
                           // $arr = str_split($accum);
                            //echo $arr[0] .'!'. $arr[1];
                       }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="block_item">
                <div class="block_title">
                    <a class="input" id="7" href="#">Дрели</a>
                </div>
                <div class="block_text">
                    <ul>
                    <?
                        $goods = select_list($db);
                        $tip = 2;
                        $i = 1;
                        foreach($goods as $item){
                            $accum = $tip.$i;
                            printf('<li><a class="select_list" id="%s" href="#">%s</a></li>', $accum, $item['pod_cat']);
                            $i++;  
                       }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="block_item">
                <div class="block_title">
                    <a class="input" id="8" href="#">Перфараторы</a>
                </div>
                <div class="block_text">
                     <ul>
                     <?
                        $goods = select_list($db);
                        $tip = 3;
                        $i = 1;
                        foreach($goods as $item){
                            $accum = $tip.$i;
                            printf('<li><a class="select_list" id="%s" href="#">%s</a></li>', $accum, $item['pod_cat']);
                            $i++;  
                       }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="block_item">
                <div class="block_title">
                    <a class="input" id="9" href="#">Аккумуляторы</a>
                </div>
                <div class="block_text">
                     <ul>
                     <?
                        $goods = select_list($db);
                        $tip = 4;
                        $i = 1;
                            foreach($goods as $item){
                                $accum = $tip.$i;
                                printf('<li><a class="select_list" id="%s" href="#">%s</a></li>', $accum, $item['pod_cat']);
                                $i++;  
                           }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
                    </div>
                </div>

            </div>

<!-------------------------------------Блок футера (начало)------------------------------------>
        <?php require "blocks/footer.php" ?>
<!-------------------------------------Блок футера (конец)------------------------------------>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/script.js"></script>


</body>
</html>