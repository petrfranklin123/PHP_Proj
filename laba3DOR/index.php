<?php
// После нажатия кнопки "отправить".
 if (count($_POST) > 0) {
  $nameInput = trim($_POST["input-name"]);
  $radioChoice = $_POST["input__radio"];
  $languages = $_POST["tech"];
  $seasons = $_POST["seasons"];

  

  // Проверка: заполнены ли все поля, кроме файла.
  if (!isset($nameInput) || !isset($radioChoice) || !isset($languages)) {
    $msg = "Необходимо заполнить все поля формы.";
  } 
  // Заносим информацию в текстовый файл.
  else {
    $textFile = "./formDataList.txt";
    file_put_contents($textFile, "$nameInput-|-$radioChoice-|-$seasons-|-", FILE_APPEND);
		
		$string_languages = implode("-|-", $languages);
	
		// Проверка, что файл был указан и был загружен во временную папку
		if (isset($_FILES["file"]) && $_FILES["file"]["tmp_name"] != '') {
			$oldFileName = $_FILES["file"]["name"];
			$imageExtension = pathinfo($oldFileName, PATHINFO_EXTENSION);
			$newFolder = "./uploads/"; // Папка для загрузки изображений
			$oldFolder = $_FILES["file"]["tmp_name"];
			// Будем генерировать уникальное имя файла с помощью uniqid()
			$newFileName = uniqid();
			
			while (file_exists($newFolder)) {
				$newFolder .= $newFileName . "." . $imageExtension;
			}
			
			move_uploaded_file($oldFolder, $newFolder);
			
		} else { // Если нет картинки, то подставляем фотографию по умолчанию
			$defaultFileName = "nophoto.jpg";
			$newFolder = "./uploads/"; // Папка для загрузки изображений
			$newFolder .= $defaultFileName;
			move_uploaded_file($oldFolder, $newFolder);
		}

    // Загрузка картинок(jpeg) в папку uploads.
		/*
    $fileName = $_FILES["file"]["name"];
    $parts = pathinfo($fileName);
    $oldFolder = $_FILES["file"]["tmp_name"];
    $newFolder = "./uploads/";
    $index = 1;
    // Переименовываем картинки в 1.jpg, 2.jpg и так далее.
    while(file_exists($newFolder)){
      $newFolder = "./uploads/" . $index . "." . $parts["extension"];
      $index++;
    }
		*/
		
    file_put_contents($textFile, "$newFolder-|-", FILE_APPEND);
		file_put_contents($textFile, "$string_languages", FILE_APPEND);
    file_put_contents($textFile, "\r\n", FILE_APPEND);
		
    //move_uploaded_file($oldFolder, $newFolder);
    $msg = "Ваши данные приняты. Спасибо!";
      $servername = "localhost";
      $username = "root";
      $password = "";



      try{
          $conn = new PDO("mysql:host=$servername; dbname=dorogina", $username, $password);
          $query = "INSERT INTO users VALUES (NULL, :name, :gender, :seasons, :languages, :image)";
          
          /*$f_info = $_POST['info'];
          $location_info = "info/".$_POST['name'].".txt";
          file_put_contents( $location_info , $f_info);
  
          $name_image = $_FILES['image']['name'];
          $tmp_name = $_FILES['image']['tmp_name'];
          move_uploaded_file($tmp_name, "images/" . $_POST['name'] . ".jpg");
          $location_image = "images/" . $_POST['name'] . ".jpg";*/

          $string_languages = implode(" ", $languages);
          $msgg = $conn->prepare($query);
          $msgg->execute(['name'=>$_POST["input-name"], 'gender'=>$_POST["input__radio"], 'seasons'=>$_POST["seasons"], 'languages'=>$string_languages, 'image'=>$newFolder]);
          $msg = "Данные занесены в БД";
      }catch(PDOExeption $e){
          echo "Connection failed" . $e->getMessage(); //выводим ошибку
      }


  } 
}
else {
  $nameInput = "";
  $radioChoice = "";
  $languages = array();
  $seasons = "";
  $msg = "Пожалуйста, заполните форму.";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Форма</title>
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div class="block">
    <form action="" method="post" name="form" class="form" enctype="multipart/form-data">
      <div class="form__text">
        <label for="input-name"></label>
        <input type="text" placeholder="Ваше имя" name="input-name" id="input-name" value="<?php echo $nameInput?>">
      </div>
      <div class="form__radio">
        <legend class="title">Пол</legend>
        <label for="input__radio-front">
          <input type="radio" id="input__radio" name="input__radio" value="Мужской">
          Мужской
          <input type="radio" id="input__radio" name="input__radio" value="Женский">
          Женский
        </label>
      </div>
      <div class="form__checkbox">
        <legend class="title">Какие языки ты знаешь?</legend>
        <label for="Английский">
          <input id="Английский" type="checkbox" name="tech[]" value="Английский">
          Английский
        </label>
        <label for="Итальянский">
          <input id="Итальянский" type="checkbox" name="tech[]" value="Итальянский">
          Итальянский
        </label>
        <label for="Китайский">
          <input id="Китайский" type="checkbox" name="tech[]" value="Китайский">
          Китайский
        </label>
        <label for="Немецкий">
          <input id="Немецкий" type="checkbox" name="tech[]" value="Немецкий">
          Немецкий
        </label>
        <label for="Русский">
          <input id="Русский" type="checkbox" name="tech[]" value="Русский">
          Русский
        </label>
      </div>
      <div class="form__select">
        <legend class="title">Любимое время года?</legend>
        <select name="seasons">
          <option value="Осень">Осень</option>
          <option value="Зима">Зима</option>
          <option value="Весна">Весна</option>
          <option value="Лето">Лето</option>
        </select>
      </div>
      <div class="form__file">
        <label for="file">Загрузите изображение</label>
        <input id="file" type="file" accept="image/jpeg, image/png" name="file">
      </div>
      <div class="form__submit">
        <input type="submit" value="Отправить" name="done">
      </div>
    </form>
    <div class="message">
      <span>
      <?php echo $msg;?>
      </span>
      <a href="table.php">Сортировочная страница</a>
    </div>
  </div>

  <script src="main.js"></script>
</body>
</html>
<style>
.message {
  text-align: center;
  margin-top: 20px;
}
</style>