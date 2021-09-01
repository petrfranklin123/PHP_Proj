<? $file = file('content1.txt');?>
        <?$r = count($file);
        $number = $r;?>

       <?php for($i = 0; $i < $number; $i++): ?>
        <?//php for($j = 0; $j < $number; $j++): ?>
           <?php
           $inputt = $file[$i];
           $piecess[$i] = explode("|", $inputt); 
           $names[$i] = $piecess[$i][1]; 
           //echo $names[$i]?>
           
          <?//php endfor; ?>
        <?php endfor; ?>

            <?
                rsort($names);

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
                           //echo $fileend[$i];
                       }  
                   ?>
                   
               <?php endfor; ?>
           <?php endfor; ?>

           <?php for($i = 0; $i < $number; $i++): ?>

                <?php
                $inputt = $fileend[$i];
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