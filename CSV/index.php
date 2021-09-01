<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<? $file = file('content.txt');?>
        <?$r = count($file);
        $number = $r;?>

       <?php for($i = 0; $i < $number; $i++): ?>
        <?//php for($j = 0; $j < $number; $j++): ?>
           <?php
           $inputt = $file[$i];
           $piecess[$i] = explode(";", $inputt); 
           $names[$i] = $piecess[$i][1]; 
          // echo $names[$i]?>
           
          <?//php endfor; ?>
        <?php endfor; ?>

            <?
                sort($names);

            for($i = 0; $i < $r; $i++){
                //echo "$names[$i] = $i\n";
            }

            
            ?>

           <?php for($i = 0; $i < $number; $i++): ?>
               <?php for($j = 0; $j < $number; $j++): ?>
                   <? 
                           if($names[$i] == $piecess[$j][1]) {
                       //if($arr[$j] < $arr[$j + 1]) {
                        //   $temp = $arr[$j];
                         //  $arr[$j] = $arr[$j + 1];
                         //  $arr[$j + 1] = $temp;

                           //$tempid = $file[$j];
                           //$file[$j] = $file[$j + 1];
                           //$file[$j + 1] = $tempid;
                           $fileend[$i] = $file[$j];
                           echo $fileend[$i];
                           ?>
                           </br>
                           <?

                       }  
                   ?>
                  
               <?php endfor; ?>
           <?php endfor; ?>

           </br>
                    <?php for($i = 0; $i < $number; $i++): ?>

                    <?php
                    $inputt = $file[$i];
                    $piecess = explode(";", $inputt); 
                    
                    
                    ?>
                        

 
                        <?php echo $piecess[0], $piecess[1], $piecess[2], $piecess[3] ; ?>
                        </br>
                        
                    <?php endfor; ?>
                    

<?

                    $text = "Какой-то текст";
                    

                    $fp = fopen("file.txt", "w");
                    

                    fwrite($fp, $text);
                    

                    fclose($fp);

?>

</body>
</html>