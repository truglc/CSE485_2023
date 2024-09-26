

<?php
$controller = isset($_GET['controller'])?   $_GET['controller']:'home';
$action     = isset($_GET['action'])?       $_GET['action']:'index';

$controller = ucfirst($controller);
$controller .= 'Controller';
$controllerPath = 'controllers/'.$controller.'.php';

if(!file_exists($controllerPath)){
    die('Lỗi! Controller này không tồn tại');
}
require_once($controllerPath);
$myObj = new $controller(); 
$myObj->$action(); 
?>