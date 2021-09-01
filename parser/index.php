<?php
set_time_limit(0); // убираем ограничение по времени выполнения скрипта

function random_string($length){ // функция генерации рандомной строки
	$chars = "abcdefghijklmnopqrstuvwxyz1234567890"; // символы из которых генерируем
	$numChars = strlen($chars); // Определяем длину $chars
	$string = ''; // задаем пустую переменную
	for ($i = 0; $i < $length; $i++) { // Собираем строку
		$string .= substr($chars, rand(1, $numChars) - 1, 1);
	}
	return $string; // Возвращаем готовую строку
}


while (1) {
	$randstring = random_string(5); // генерируем рандомную сроку
	echo($randstring . "Код");
	$htmldata = file_get_contents('http://prnt.sc/1'.$randstring); // подставляем рандомную строку и получаем код страницы
	echo($htmldata. "121121212121221212");
	//preg_match_all('/<meta name="twitter:image:src" content="(.*?)"/>/is',$htmldata,$img_url); // парсим регуляркой url картинки
	preg_match_all('/<meta name="twitter:image:src" content="(.*?)"/>/',$htmldata,$img_url); // парсим регуляркой url картинки
	if (strlen($img_url[1][0]) > 1) { // проверяем длину полученной строки, если больше 1 - картинка по этому адресу есть
		$localname = array_pop(explode('/',$img_url[1][0])); // разбиваем строку в массив и извлекаем последний элемент массива (т.е. imagename.png)
		$localpath = "./images/".$localname; // определяем куда будет сохраняться картинка локально. у меня заранее создана папка images 
		file_put_contents($localpath, file_get_contents($img_url[1][0])); // скачиваем, можно было бы реализовать через curl, но на мой взгляд это проще и быстрее
		
		echo "<span style='color: green; display: block; margin-bottom: 50px;'>Сохранение - ".$localname." , url - http://prnt.sc/1".$randstring." , скачиваем с ".$img_url[1][0]."</span>";
	} else {
		echo "<span style='color: red; display: block; margin-bottom: 50px;'>По адресу http://prnt.sc/1".$randstring." нет картинки</span>";
		
	}
	
}
?>
