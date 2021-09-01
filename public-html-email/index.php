<?
session_start();
header('Content-Type: text/html; charset= utf-8');
include("bd.php");

if ($_SERVER['REQUEST_URI'] == '/') {
$Page = 'index';
$Module = 'index';
} else {
$URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$URL_Parts = explode('/', trim($URL_Path, ' /'));
$Page = array_shift($URL_Parts);
$Module = array_shift($URL_Parts);


if (!empty($Module)) {
$Param = array();
for ($i = 0; $i < count($URL_Parts); $i++) {
$Param[$URL_Parts[$i]] = $URL_Parts[++$i];
}
}
}
  


if($Page=='index')include('page/index.php');
elseif($Page=='novosti')include('page/novosti.php');
elseif($Page=='exit')include('page/exit.php');
elseif($Page=='action_register')include('setting/action_register.php');
elseif($Page=='action_login')include('setting/action_login.php');



   
/////////////////////////////////////////// Проверка сессионных данных






function top($title){
   include("html/top.php");
}
function bottom(){
  include("html/bottom.php");
}

 
?>