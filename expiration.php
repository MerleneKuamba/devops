<?php

$expireAfter = 30;
	if(isset($_SESSION['last_action'])){
	    $secondsInactive = time() - $_SESSION['last_action'];
	    $expireAfterSeconds = $expireAfter * 60;
	    
	    if($secondsInactive >= $expireAfterSeconds){
	    	/*Cookie for saving shopping cart*/
			$tabserial = serialize($_SESSION['shopcart']);
			$name="TabId".$_SESSION['login'];
			setcookie("$name", $tabserial, time()+3*24*60*60);

	        session_unset();
	        session_destroy();
	        header("location:connexion.php");
	    }
	    
	}
	$_SESSION['last_action'] = time();

?>