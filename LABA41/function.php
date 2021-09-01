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
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    }else if($id == '2'){
        $sql = "SELECT * FROM pricelist";

        $sql .= ' ORDER BY price ASC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    }else if($id == '3'){
        $sql = "SELECT * FROM pricelist";
        $sql .= ' ORDER BY price DESC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    }else if($id == '4'){
        $sql = "SELECT * FROM pricelist";
        $sql .= ' ORDER BY name ASC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
    }else if($id == '5'){
        $sql = "SELECT * FROM pricelist";
        $sql .= ' ORDER BY name DESC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }

        }else if($id == '6'){
            $sql = "SELECT * FROM pricelist";
            $sql .= ' WHERE class_t = "Шуроповерты"';
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $goods[] = mysqli_fetch_array($result);
            }
        }else     if($id == '7'){
            $sql = "SELECT * FROM pricelist";
            $sql .= ' WHERE class_t = "Дрели"';
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }

            }else     if($id == '8'){
            $sql = "SELECT * FROM pricelist";
            $sql .= ' WHERE class_t = "Перфораторы"';
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }

        }
            else     if($id == '9'){
            $sql = "SELECT * FROM pricelist";
            $sql .= ' WHERE class_t = "Аккумуляторы"';
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }

        } else{
            $sql = "SELECT * FROM pricelist";
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
   ?>