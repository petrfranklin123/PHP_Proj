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
   <?php require "blocks/header.php" ?>
   <div class="conteiner">



       <div class="items">
       <div class="a"> <a class="back" href="index.php">Назад</a></div>
        <form action="add.php" method="post" enctype="multipart/form-data">
              
        <form action="">
        <div class="form_block">
            <div class="form_block_left">
            <label for="name">Название</label> <br>
                <input type="text" name="name" id="name"><br>
                <label for="price">Стоимость</label> <br>
                <input type="number" name="price" id="price"><br>
            </div>
            <div class="form_block_right">
                <div class="block_right">
                <label for="info">Информация</label> <br>
                <textarea placeholder=" Характеристики товара..." name="info" id="info" ></textarea>
                </div>
                <div class="block_right">
                <input type="file" name="image">
                <button type="submit" >Загрузить</button>
                </div>
            </div>

        </div>
    </form> 
       </div>
   </div>
   <?php require "blocks/footer.php" ?>
   <script src="js/valid.js"></script>
   </body>
   </html>                 
                   