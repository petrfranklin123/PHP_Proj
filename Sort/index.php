<?php
$fruits = array("2321", "11", "0", "45", "1000");
sort($fruits);

for($i = 0; $i < 5; $i++){
    echo "$fruits[$i] = $i\n";
}
?>
<br>
<?
foreach ($fruits as $key => $val) {
    echo "$key = $val\n";
}
?>
<br>
<br>
<?
$str = 'stroka';
$array = str_split($str);
print_r($str);
for($i = 0; $i < 6; $i++){
    echo "$array[$i] \n";
}
?>
<br>
<?

$symbol = 'r';

if($array[2] == $symbol)
{
    echo "Получилось";
}else{
    echo "Не получилось";
}



echo $array[2];
?>