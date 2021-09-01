<? $file = file('content1.txt');
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

