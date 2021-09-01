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

        <div class="form_block">
            <div class="form_block_left">
            <label for="name">Название</label> <br>
                <input type="text" name="name" id="name"><br>
                <label for="price">Стоимость</label> <br>
                <input type="number" name="price" id="price"><br>
                <label for="col">Количество</label> <br>
                <input type="number" name="col" id="col"><br>
                <label for="class_t">Категория товара</label> <br>
                <select name="class_t" id="class_t">
                <option value="1">Шуроповерты</option>
                <option value="2">Дрели</option>
                <option value="3">Перфораторы</option>
                <option value="4">Аккумуляторы</option>
                </select>
                <br>
                <label for="pod_cat_mat">Подкатегория товара</label> <br>
                <select name="pod_cat_mat" id="pod_cat_mat">
                <option value="1">Дешевые</option>
                <option value="2">Средние</option>
                <option value="3">Дорогие</option>
                </select>




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
                   
