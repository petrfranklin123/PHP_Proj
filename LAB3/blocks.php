<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSHOP</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
</head>
<?
 $value = $_POST['default'];
     if($value == '1'){
        // echo $value;
         
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


   <? 
     }else if($value == '2'){
        //echo $value;
      
        $file = file('content1.txt');?>
         <?$r = count($file);
         $number = $r;?>
        <?php for($i = 0; $i < $number; $i++): ?>

            <?php
            $inputt = $file[$i];
            $piecess = explode("|", $inputt); ?>
            <?
            $prom = explode(" ", $piecess[2]);
           // echo $prom[0];
            $arr[$i] = $prom[0];

            $arrid[$i] = $i;
            
            ?>
            
            <?php endfor; ?>

            
            <?php for($i = 0; $i < $number; $i++): ?>
                <?php for($j = 0; $j < $number - $i; $j++): ?>
                    <? 
                        if($arr[$j] > $arr[$j + 1]) {
                            $temp = $arr[$j];
                            $arr[$j] = $arr[$j + 1];
                            $arr[$j + 1] = $temp;
                            
                            $tempid = $arrid[$j];
                            $arrid[$j] = $arrid[$j + 1];
                            $arrid[$j + 1] = $tempid;

                            $tempid = $file[$j];
                            $file[$j] = $file[$j + 1];
                            $file[$j + 1] = $tempid;
                        }  
                    ?>
                <?php endfor; ?>
            <?php endfor; ?>
            <?php for($i = 0; $i < $number; $i++): ?>
            <?
               // echo $arr[$i];
                
            ?>
            <?php endfor; ?>
            
            

            <?php for($i = 0; $i < $number; $i++): ?>
            <?
                //echo $arrid[$i];
                
            ?>
            <?php endfor; ?>
          

                <?php for($i = 0; $i < $number; $i++): ?>
                <?
                 //   echo $file[$i];
                    
                ?>
                
                <?php endfor; ?>
                <?php for($i = 1; $i < $number; $i++): ?>

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

<?  




    }else if($value == '3'){
       // echo $value;
        $file = file('content1.txt');?>
        <?$r = count($file);
        $number = $r;?>
       <?php for($i = 0; $i < $number; $i++): ?>

           <?php
           $inputt = $file[$i];
           $piecess = explode("|", $inputt); ?>
           <?
           $prom = explode(" ", $piecess[2]);
           //echo $prom[0];
           $arr[$i] = $prom[0];
           
           ?>
           
           <?php endfor; ?>

           
           <?php for($i = 0; $i < $number; $i++): ?>
               <?php for($j = 0; $j < $number - $i; $j++): ?>
                   <? 
                       if($arr[$j] < $arr[$j + 1]) {
                           $temp = $arr[$j];
                           $arr[$j] = $arr[$j + 1];
                           $arr[$j + 1] = $temp;

                           $tempid = $file[$j];
                           $file[$j] = $file[$j + 1];
                           $file[$j + 1] = $tempid;

                       }  
                   ?>
               <?php endfor; ?>
           <?php endfor; ?>
           <?php for($i = 0; $i < $number; $i++): ?>
           <?
             //  echo $arr[$i];
           ?>
           <?php endfor; ?>
           <?php for($i = 1; $i < $number; $i++): ?>

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
        <?
    }
?>