<?php 
session_start();
//$_SESSION = array();
/*Cookie for saving shopping cart*/
$name="TabId".$_SESSION['login'];
$tabserial = serialize($_SESSION['shopcart']);
setcookie("$name", $tabserial, time()+3*24*60*60);

session_unset();
session_destroy();
header('location:connexion.php');

?>