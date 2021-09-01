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
function get_goods($db, $id = FALSE){
    //запрос на выборку всех товаров 
    if($id == '1'){
        $sql = "SELECT * FROM pricelist";
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
        $s1 = '<input type="radio" name="default" id="def" checked value="1">';
        $s2 = '<input type="radio" name="default" id="voz" value="2">';
        $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
        $s4 = '<input type="radio" name="default" id="abc" value="4">';
        $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
        $s6 = '<input type="radio" name="default" id="shur" value="6">'; 
        $s7 = '<input type="radio" name="default" id="drel" value="7">'; 
        $s8 = '<input type="radio" name="default" id="perf" value="8">'; 
        $s9 = '<input type="radio" name="default" id="akku" value="9">'; 
        ?>
        <div class="group">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="sort">
                <div class="sort_row">
                    <div class="sort_row_1">
                        <? echo $s1; ?>
                        <label for="def">Стандартное</label>
                        <? echo $s2; ?>
                        <label for="voz">По возрастанию</label>
                        <? echo $s3; ?>
                        <label for="ubiv">По убыванию</label>
                        <? echo $s4; ?>
                        <label for="abc">A,B,C...</label>
                        <? echo $s5; ?>
                        <label for="xyz">Z,Y,X...</label>
                    </div>
                    <div class="sort_row_2">
                        <? echo $s6; ?>
                        <label for="voz">Шуруповерты</label>
                        <? echo $s7; ?>
                        <label for="ubiv">Дрели</label>
                        <? echo $s8; ?>
                        <label for="abc">Перфораторы</label>
                        <? echo $s9; ?>
                        <label for="xyz">Аккумуляторы</label>
                    </div>  
                </div>


                
                <div class="btn_button"><button type="submit" >Сортировать</button></div>
        
            </div>
        </form>
        <br>
        </div>
        <?
    }else if($id == '2'){
        $sql = "SELECT * FROM pricelist";

        $sql .= ' ORDER BY price ASC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
        $s1 = '<input type="radio" name="default" id="def" value="1">';
        $s2 = '<input type="radio" name="default" id="voz" checked value="2">';
        $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
        $s4 = '<input type="radio" name="default" id="abc" value="4">';
        $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
        ?>
        <div class="group">
        <form action="" method="post" enctype="multipart/form-data">
        <? echo $s1; ?>
         <label for="def">Стандартное</label>
        <? echo $s2; ?>
        <label for="voz">По возрастанию</label>
        <? echo $s3; ?>
        <label for="ubiv">По убыванию</label>
        <? echo $s4; ?>
        <label for="abc">A,B,C...</label>
        <? echo $s5; ?>
        <label for="xyz">Z,Y,X...</label>
        
        <button type="submit" >Сортировать</button>
        </form>
        <br>
        </div>
        <?
    }else if($id == '3'){
        $sql = "SELECT * FROM pricelist";
        $sql .= ' ORDER BY price DESC';
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
        $s1 = '<input type="radio" name="default" id="def" value="1">';
        $s2 = '<input type="radio" name="default" id="voz" value="2">';
        $s3 = '<input type="radio" name="default" id="ubiv" checked value="3">'; 
        $s4 = '<input type="radio" name="default" id="abc" value="4">';
        $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
        ?>
        <div class="group">
        <form action="" method="post" enctype="multipart/form-data">
        <? echo $s1; ?>
         <label for="def">Стандартное</label>
        <? echo $s2; ?>
        <label for="voz">По возрастанию</label>
        <? echo $s3; ?>
        <label for="ubiv">По убыванию</label>
        <? echo $s4; ?>
        <label for="abc">A,B,C...</label>
        <? echo $s5; ?>
        <label for="xyz">Z,Y,X...</label>
        
        <button type="submit" >Сортировать</button>
        </form>
        <br>
        </div>
        <?

    }
        else if($id == '4'){
            $sql = "SELECT * FROM pricelist";
            $sql .= ' ORDER BY name ASC';
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $goods[] = mysqli_fetch_array($result);
            }
            $s1 = '<input type="radio" name="default" id="def" value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" checked value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
            ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <? echo $s1; ?>
         <label for="def">Стандартное</label>
        <? echo $s2; ?>
        <label for="voz">По возрастанию</label>
        <? echo $s3; ?>
        <label for="ubiv">По убыванию</label>
        <? echo $s4; ?>
        <label for="abc">A,B,C...</label>
        <? echo $s5; ?>
        <label for="xyz">Z,Y,X...</label>
        
        <button type="submit" >Сортировать</button>
            </form>
            <br>
            </div>
            <?
        }
        else if($id == '5'){
            $sql = "SELECT * FROM pricelist";
            $sql .= ' ORDER BY name DESC';
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $goods[] = mysqli_fetch_array($result);
            }
            $s1 = '<input type="radio" name="default" id="def" value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" checked value="5">'; 
            ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <? echo $s1; ?>
         <label for="def">Стандартное</label>
        <? echo $s2; ?>
        <label for="voz">По возрастанию</label>
        <? echo $s3; ?>
        <label for="ubiv">По убыванию</label>
        <? echo $s4; ?>
        <label for="abc">A,B,C...</label>
        <? echo $s5; ?>
        <label for="xyz">Z,Y,X...</label>
        
        <button type="submit" >Сортировать</button>
            </form>
            <br>
            </div>
            <?
        }else     if($id == '6'){
            $sql = "SELECT * FROM pricelist";
            $sql .= ' WHERE class_t = "Шуроповерты"';
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $goods[] = mysqli_fetch_array($result);
            }
            $s1 = '<input type="radio" name="default" id="def" value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
            $s6 = '<input type="radio" name="default" id="shur" checked value="6">'; 
            $s7 = '<input type="radio" name="default" id="drel" value="7">'; 
            $s8 = '<input type="radio" name="default" id="perf" value="8">'; 
            $s9 = '<input type="radio" name="default" id="akku" value="9">'; 
            ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="sort">
                    <div class="sort_row">
                        <div class="sort_row_1">
                            <? echo $s1; ?>
                            <label for="def">Стандартное</label>
                            <? echo $s2; ?>
                            <label for="voz">По возрастанию</label>
                            <? echo $s3; ?>
                            <label for="ubiv">По убыванию</label>
                            <? echo $s4; ?>
                            <label for="abc">A,B,C...</label>
                            <? echo $s5; ?>
                            <label for="xyz">Z,Y,X...</label>
                        </div>
                        <div class="sort_row_2">
                            <? echo $s6; ?>
                            <label for="voz">Шуруповерты</label>
                            <? echo $s7; ?>
                            <label for="ubiv">Дрели</label>
                            <? echo $s8; ?>
                            <label for="abc">Перфораторы</label>
                            <? echo $s9; ?>
                            <label for="xyz">Аккумуляторы</label>
                        </div>  
                    </div>
    
    
                    
                    <div class="btn_button"><button type="submit" >Сортировать</button></div>
            
                </div>
            </form>
            <br>
            </div>
            <?}else     if($id == '7'){
            $sql = "SELECT * FROM pricelist";
            $sql .= ' WHERE class_t = "Дрели"';
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $goods[] = mysqli_fetch_array($result);
            }
            $s1 = '<input type="radio" name="default" id="def" value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
            $s6 = '<input type="radio" name="default" id="shur" value="6">'; 
            $s7 = '<input type="radio" name="default" id="drel" checked value="7">'; 
            $s8 = '<input type="radio" name="default" id="perf" value="8">'; 
            $s9 = '<input type="radio" name="default" id="akku" value="9">'; 
            ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="sort">
                    <div class="sort_row">
                        <div class="sort_row_1">
                            <? echo $s1; ?>
                            <label for="def">Стандартное</label>
                            <? echo $s2; ?>
                            <label for="voz">По возрастанию</label>
                            <? echo $s3; ?>
                            <label for="ubiv">По убыванию</label>
                            <? echo $s4; ?>
                            <label for="abc">A,B,C...</label>
                            <? echo $s5; ?>
                            <label for="xyz">Z,Y,X...</label>
                        </div>
                        <div class="sort_row_2">
                            <? echo $s6; ?>
                            <label for="voz">Шуруповерты</label>
                            <? echo $s7; ?>
                            <label for="ubiv">Дрели</label>
                            <? echo $s8; ?>
                            <label for="abc">Перфораторы</label>
                            <? echo $s9; ?>
                            <label for="xyz">Аккумуляторы</label>
                        </div>  
                    </div>
    
    
                    
                    <div class="btn_button"><button type="submit" >Сортировать</button></div>
            
                </div>
            </form>
            <br>
            </div>
            <?}else     if($id == '8'){
            $sql = "SELECT * FROM pricelist";
            $sql .= ' WHERE class_t = "Перфораторы"';
            $result = mysqli_query($db, $sql);
            for($i = 0; $i < mysqli_num_rows($result); $i++){
                $goods[] = mysqli_fetch_array($result);
            }
            $s1 = '<input type="radio" name="default" id="def" value="1">';
            $s2 = '<input type="radio" name="default" id="voz" value="2">';
            $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
            $s4 = '<input type="radio" name="default" id="abc" value="4">';
            $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
            $s6 = '<input type="radio" name="default" id="shur" value="6">'; 
            $s7 = '<input type="radio" name="default" id="drel" value="7">'; 
            $s8 = '<input type="radio" name="default" id="perf" checked value="8">'; 
            $s9 = '<input type="radio" name="default" id="akku" value="9">'; 
            ?>
            <div class="group">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="sort">
                    <div class="sort_row">
                        <div class="sort_row_1">
                            <? echo $s1; ?>
                            <label for="def">Стандартное</label>
                            <? echo $s2; ?>
                            <label for="voz">По возрастанию</label>
                            <? echo $s3; ?>
                            <label for="ubiv">По убыванию</label>
                            <? echo $s4; ?>
                            <label for="abc">A,B,C...</label>
                            <? echo $s5; ?>
                            <label for="xyz">Z,Y,X...</label>
                        </div>
                        <div class="sort_row_2">
                            <? echo $s6; ?>
                            <label for="voz">Шуруповерты</label>
                            <? echo $s7; ?>
                            <label for="ubiv">Дрели</label>
                            <? echo $s8; ?>
                            <label for="abc">Перфораторы</label>
                            <? echo $s9; ?>
                            <label for="xyz">Аккумуляторы</label>
                        </div>  
                    </div>
    
    
                    
                    <div class="btn_button"><button type="submit" >Сортировать</button></div>
            
                </div>
            </form>
            <br>
            </div>
            <?}
            else     if($id == '9'){
                $sql = "SELECT * FROM pricelist";
                $sql .= ' WHERE class_t = "Аккумуляторы"';
                $result = mysqli_query($db, $sql);
                for($i = 0; $i < mysqli_num_rows($result); $i++){
                    $goods[] = mysqli_fetch_array($result);
                }
                $s1 = '<input type="radio" name="default" id="def" value="1">';
                $s2 = '<input type="radio" name="default" id="voz" value="2">';
                $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
                $s4 = '<input type="radio" name="default" id="abc" value="4">';
                $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
                $s6 = '<input type="radio" name="default" id="shur" value="6">'; 
                $s7 = '<input type="radio" name="default" id="drel" value="7">'; 
                $s8 = '<input type="radio" name="default" id="perf" value="8">'; 
                $s9 = '<input type="radio" name="default" id="akku" checked value="9">'; 
                ?>
                <div class="group">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="sort">
                        <div class="sort_row">
                            <div class="sort_row_1">
                                <? echo $s1; ?>
                                <label for="def">Стандартное</label>
                                <? echo $s2; ?>
                                <label for="voz">По возрастанию</label>
                                <? echo $s3; ?>
                                <label for="ubiv">По убыванию</label>
                                <? echo $s4; ?>
                                <label for="abc">A,B,C...</label>
                                <? echo $s5; ?>
                                <label for="xyz">Z,Y,X...</label>
                            </div>
                            <div class="sort_row_2">
                                <? echo $s6; ?>
                                <label for="voz">Шуруповерты</label>
                                <? echo $s7; ?>
                                <label for="ubiv">Дрели</label>
                                <? echo $s8; ?>
                                <label for="abc">Перфораторы</label>
                                <? echo $s9; ?>
                                <label for="xyz">Аккумуляторы</label>
                            </div>  
                        </div>
        
        
                        
                        <div class="btn_button"><button type="submit" >Сортировать</button></div>
                
                    </div>
                </form>
                <br>
                </div>
                <?}
    else{
        $sql = "SELECT * FROM pricelist";
        $result = mysqli_query($db, $sql);
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $goods[] = mysqli_fetch_array($result);
        }
        $s1 = '<input type="radio" name="default" id="def" checked value="1">';
        $s2 = '<input type="radio" name="default" id="voz" value="2">';
        $s3 = '<input type="radio" name="default" id="ubiv" value="3">'; 
        $s4 = '<input type="radio" name="default" id="abc" value="4">';
        $s5 = '<input type="radio" name="default" id="xyz" value="5">'; 
        $s6 = '<input type="radio" name="default" id="shur" value="6">'; 
        $s7 = '<input type="radio" name="default" id="drel" value="7">'; 
        $s8 = '<input type="radio" name="default" id="perf" value="8">'; 
        $s9 = '<input type="radio" name="default" id="akku" value="9">'; 
        ?>
        <div class="group">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="sort">
                <div class="sort_row">
                    <div class="sort_row_1">
                        <? echo $s1; ?>
                        <label for="def">Стандартное</label>
                        <? echo $s2; ?>
                        <label for="voz">По возрастанию</label>
                        <? echo $s3; ?>
                        <label for="ubiv">По убыванию</label>
                        <? echo $s4; ?>
                        <label for="abc">A,B,C...</label>
                        <? echo $s5; ?>
                        <label for="xyz">Z,Y,X...</label>
                    </div>
                    <div class="sort_row_2">
                        <? echo $s6; ?>
                        <label for="voz">Шуруповерты</label>
                        <? echo $s7; ?>
                        <label for="ubiv">Дрели</label>
                        <? echo $s8; ?>
                        <label for="abc">Перфораторы</label>
                        <? echo $s9; ?>
                        <label for="xyz">Аккумуляторы</label>
                    </div>  
                </div>


                
                <div class="btn_button"><button type="submit" >Сортировать</button></div>
        
            </div>
        </form>
        <br>
        </div>
        <?
    }

    return $goods;
}
?>
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