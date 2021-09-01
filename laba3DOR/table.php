<?
/*if($_POST["nameB"]){
    setcookie("sort", $_POST["nameB"], time()+3600);
}*/
//print_r($_POST);

$_POST["nameB"] = $_COOKIE["sort"];
//print_r($_POST);
function connect_db(){
    //подключаем базу данных
    $db = mysqli_connect('localhost', 'root', '', 'dorogina');
    if(!$db){
        exit('Error'.mysqli_error());
    }

    //mysqli_query($db, "SET NAMES cp1251");

    return $db;
}
function connect_db_PDO(){
    //подключаем базу данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    
try{
    //подключение базы 
    $conn = new PDO("mysql:host=$servername; dbname=dorogina", $username, $password);
    //подготовка запроса

}catch(PDOExeption $e){ //если не удалось подключиться
    echo "Connection failed" . $e->getMessage(); //выводим ошибку
}
    return $conn;
}


function get_text($db, $id = FALSE){

    if($id == '20'){
        $sql = "SELECT * FROM users";
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    }else if($id == '1'){
        $sql = "SELECT * FROM users";
        $sql .= ' ORDER BY name ASC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    }else if($id == '2'){
        $sql = "SELECT * FROM users";
        $sql .= ' ORDER BY gender ASC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    }else if($id == '3'){
        $sql = "SELECT * FROM users";
        $sql .= ' ORDER BY seasons ASC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    }else if($id == '4'){
        $sql = "SELECT * FROM users";
        $sql .= ' ORDER BY languages ASC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }

        } else{
            $sql = "SELECT * FROM users";
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }

            
    }
    return $goods;
}?>
<?
function default_table($goods){
    ?>
<? foreach ($goods as $item) :?>
<?
$info = $item['info'];
?>
    <div class="card">
            <div class="card_flex">
                <div class="left">
                    <div class="card_image"><img src="<?php echo $item['image']; ?>" alt=""></div>
                    <div class="card_a"><a href="#">В корзину</a></div>
                </div>
                <div class="right">
                    <h3><a href="#"><?php echo $item['name']; ?></a> <br></h3>
                    <p class="card_info"><?php echo file_get_contents("$info"); ?>
                    </p>
                    <div class="price"><?php echo $item['price']; ?></div>
                </div>
            </div>
        </div>
   
<? endforeach; ?>
   <?
   } 

   $db = connect_db();
   $conn = connect_db_PDO();


    if($_POST){
        $goods = get_text($db, $_POST["nameB"]);
    }else{
        $goods = get_text($db, 5);
    }
   
   //echo $goods;

   //foreach ($goods as $item) {
   //   echo $item["name"] ." ";
   //}
   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
   </head>
   <body>
   <?php

    /*foreach ($goods as $array) {  
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
    //foreach ($array['languages'] as $language) {
    //  echo "<li class='technologies__item'>";
        //echo "<span>";
        //foreach ($array['languages'] as $language) {
        //echo $language;
        //}
        //echo "</span>";
    //  echo "</li>";
    //}
    echo "</ul>";
    echo "</td>";
    echo "<td>";
    echo "<div>";
    echo "<img src=" . $array['image'] . " alt='Картинка' width='130' />";
    echo "</div>";
    echo "</td>";
    echo "</tr>";
    }*/
    ?>

    <div class="container">
        <div class="wrapper">

        <? 
//print_r ($_POST);
?>
            <table>
            <tr>
            <form action="cookie.php" method="post" enctype="multipart/form-data">
                <td <? if($_POST[nameB] == 1) echo "class='bg'";?>>
                <span><button name="nameB" type="submit" value="1">Name</button></span>
                </td>
                <td <? if($_POST[nameB] == 2) echo "class='bg'";?>>
                <span><button name="nameB" type="submit" value="2">Gender</button></span>
                </td>
                <td <? if($_POST[nameB] == 3) echo "class='bg'";?>>
                <span><button name="nameB" type="submit" value="3">Seasons</button></span>
                </td>
                <td <? if($_POST[nameB] == 4) echo "class='bg'";?>>
                <span><button name="nameB" type="submit" value="4">Languages</button></span>
                </td>
                <td>
                <span><button name="nameB" type="submit" value="5">Image</button></span>
                </td>
            </form>
            </tr>
<? foreach ($goods as $array) :?>
            <tr>
                <td>
                <span><?=$array['name']?></span>
                </td>
                <td>
                <span><?=$array['gender']?></span>
                </td>
                <td>
                <span><?=$array['seasons']?></span>
                </td>
                <td>
                <span><?=$array['languages']
                
                ?></span>
                </td>
                <td>
                <div>
                <img src=<?=$array['image']?> alt='Картинка' width='130' />
                </div>
                </td>
            </tr>

<? endforeach; ?> 


</body>
</html>




<style>

body{
    width: 100%;
}
.container{
    margin: 0 auto;
}
.wrapper{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.header_table{
    display: flex;
}
.item_table{
    display: flex;
}
.tab{
    padding: 10px 20px;
    border: 1px solid #000000;
}
.bg{
    background-color: #000555;
}
  body {
    font-size: 15px;
  }

  a {
    text-decoration: none;
    color: #000000;
  }

  table,
  td,
  tr,
  th {
    border: 2px solid #000000;
    border-collapse: collapse;
    padding: 10px;
    text-align: center;
    vertical-align: middle;
  }

  ul,
  li {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .table-block {
    margin: 20px;
    display: flex;
    justify-content: space-evenly;
  }

  img {
    display: block;
    height: auto;
    max-width: 100%;
    border-radius: 5px;
  }
</style>