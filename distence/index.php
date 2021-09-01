<?
session_start();
    header('Content-Type: text/html; charset= utf-8');
    include("bd.php");

    if ($_SERVER['REQUEST_URI'] == '/'){
        $Page = 'index';
        $Module = 'index';
    }else{
        $URL_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $URL_Parts = explode('/', trim($URL_Path, ' /'));
        $Page = array_shift($URL_Parts);
        $Module = array_shift($URL_Parts);

        if(!empty($Module)){
            $Param = array();
            for($i = 0; $i < count($URL_Parts); $i++){
                $Param[$URL_Parts[$i]] = $URL_Parts[++$i];
            }
        }
    }

    
    if($Page == 'index')include('page/register_and_login.php');
    elseif($Page == 'profile')include('page/profile.php');
    elseif($Page == 'news')include('page/news.php');
    elseif($Page == 'register_and_login')include('page/register_and_login.php');
    elseif($Page == 'register')include('setting/register.php');
    elseif($Page == 'login')include('setting/login.php');
    elseif($Page == 'edit')include('setting/edit_profile.php');

function top($title){
    include("html/top.php");
}
function bottom(){
    include("html/bottom.php");
}
function left_bar(){
    include("form/left_bar.php");
}
function header_bar(){
    include("form/header_bar.php");
}
function activation_akkaunt(){
    include("setting/activation.php");
}
function profile_info(){
    include("setting/profile_info.php");
}
function edit_profile(){
    include("setting/edit_profile.php");
}
?>