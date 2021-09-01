<?
function connect_db(){
    //подключаем базу данных
    $db = mysqli_connect('localhost', 'root', '', 'webshop');
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
    $conn = new PDO("mysql:host=$servername; dbname=webshop", $username, $password);
    //подготовка запроса

}catch(PDOExeption $e){ //если не удалось подключиться
    echo "Connection failed" . $e->getMessage(); //выводим ошибку
}
    return $conn;
}
function get_text($db, $id = FALSE){
    
    if($id == '1'){
        $sql = "SELECT * FROM pricelist";
    }else if($id == '2'){
        $sql = "SELECT * FROM pricelist";
        $sql .= ' ORDER BY price ASC';
    }else if($id == '3'){
        $sql = "SELECT * FROM pricelist";
        $sql .= ' ORDER BY price DESC';
    }else if($id == '4'){
        $sql = "SELECT * FROM pricelist";
        $sql .= ' ORDER BY name ASC';
    }else if($id == '5'){
        $sql = "SELECT * FROM pricelist";
        $sql .= ' ORDER BY name DESC';
    }else if($id == '6' || $id == '7' || $id == '8' || $id == '9'){
        $i;
        if($id == '6'){
            $i = 1;
        }else if($id == '7'){
            $i = 2;
        }
        else if($id == '8'){
            $i = 3;
        }else{
            $i = 4;
        }
        $sql = "WITH
        cte1 AS (SELECT * FROM pricelist),
        cte2 AS (SELECT id_class, class_name FROM class WHERE id_class = '".$i."') 
        SELECT * FROM cte1 JOIN cte2 
        WHERE cte1.class_t = cte2.id_class ";
        if($_COOKIE["id_cookie"] == '1'){
            $sql .= ""; 
        }else if($_COOKIE["id_cookie"] == '2'){
            $sql .= "ORDER BY price ASC"; 
        }else if($_COOKIE["id_cookie"] == '3'){
            $sql .= "ORDER BY price DESC"; 
        }else if($_COOKIE["id_cookie"] == '4'){
            $sql .= "ORDER BY name ASC"; 
        }else if($_COOKIE["id_cookie"] == '5'){
            $sql .= "ORDER BY name DESC"; 
        }else if($_COOKIE["id_cookie"] == '10'){
            $sql .= "ORDER BY `col` ASC"; 
        }else if($_COOKIE["id_cookie"] == '11'){
            $sql .= "ORDER BY `col` DESC"; 
        }
    }else if($id == '10'){
            $sql = "SELECT * FROM `pricelist` ORDER BY `pricelist`.`col` ASC";
    }else if($id == '11'){
            $sql = "SELECT * FROM `pricelist` ORDER BY `pricelist`.`col` DESC";
    } else{
            $sql = "SELECT * FROM pricelist";
    } 
    $result = mysqli_query($db, $sql) or trigger_error(mysql_error()." in ". $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    return $goods;
}?>
<?
function select_tovar($db, $id){
    $sql = "WITH
    cte1 AS (SELECT * FROM pricelist),
    cte2 AS (SELECT * FROM class),
    cte3 AS (SELECT * FROM pod_category)
    SELECT * FROM cte1 JOIN cte2 JOIN cte3 
      WHERE cte1.id = '".$id."' AND cte1.class_t = cte2.id_class AND cte1.pod_cat_mat = cte3.pod_cat_id";
    $result = mysqli_query($db, $sql) or trigger_error(mysql_error()." in ". $sql);
    $goods = mysqli_fetch_array($result);
    return $goods;
}
function select_list($db){
    $sql = "SELECT * FROM `pod_category`";
    $result = mysqli_query($db, $sql) or trigger_error(mysql_error()." in ". $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    return $goods;
}
function select_list_tovar($db, $id){
    $arr = str_split($id);
    $sql = "WITH
    cte1 AS (SELECT * FROM pricelist),
    cte2 AS (SELECT * FROM class WHERE id_class = '".$arr[0]."'),
    cte3 AS (SELECT * FROM pod_category WHERE pod_cat_id = '".$arr[1]."')
    SELECT * FROM cte1 JOIN cte2 JOIN cte3 
      WHERE cte1.class_t = cte2.id_class AND cte1.pod_cat_mat = cte3.pod_cat_id";
    $result = mysqli_query($db, $sql) or trigger_error(mysql_error()." in ". $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    return $goods;
}
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
   ?>