<html>
<head>
	<title>Connexion / Inscription</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="shop2.css?t=<?php echo time(); ?>">
</head>
<body class="container">
		<div style="text-align: center;">
			<img src="pictures/Pricetiger.png" id="load_img"><br><br>
		</div>
		<div id="formConnexion">

		<form name="form1" id="form1" method="post" action="#">
			<p>
				<label for="login">Mon identifiant:</label> 
				<span><input type="text" name="login" id="login" /></span>
			</p>
			<p>
				<label for="password">Mon mot de passe:</label> 
				<span><input type="password" name="password" id="password" /></span>
			</p>
			<p style="text-align: center;">
				<span>
					<input type="submit" name="connect" value="GO !" />
				</span>
			</p>
		</form>
		</div>
		</br></br>
		<div id="formRegistration" >
			<p>
				<span>
					<!--Mettre le lien de redirection vers la pasge newregistration-->
					<a href="newregistration.php">
						<input type="button" name="Newuser" value="Inscription"/>
					</a>
				</span>
		
			</p>
		</div>	

		<script type="text/javascript" src="inscription.js"></script>
</body>
</html>

<?php
	$connection= new PDO ('mysql:host=localhost; dbname=shop','root','');
	if(empty($connection)){
		die('erreur de connexion');
	}
	else{
		//echo('connexion reussie');
		if(isset($_POST['connect'])){
				$login=$_POST['login'];
				$password=$_POST['password'];
				
				$req=$connection->query("SELECT * FROM users WHERE login='$login' && password='$password'");
				

				if(empty($req)){
				   echo("Invalid statement");
			    }
			    else{
			       if($data=$req->fetch()){
					 	//echo("trouve");
				       	session_start();
				       	$_SESSION['login']=$data['login'];
				       	$_SESSION['firstName']=$data['firstName'];
				       	$_SESSION['lastName']=$data['lastName'];
				       	$_SESSION['shopcart']=array();
				       	$_SESSION['purchase']=array();
				       	$_SESSION['cpt']=0;
				       	$_SESSION['totalOrder']=0;
				       	$connexion= new PDO ('mysql:host=localhost; dbname=shop','root','');
				       	$count=0;
						if(empty($connexion)){
							die('erreur de connexion');
						}
						else{         
							$req= $connexion -> query("SELECT * FROM produits");
							while ($data = $req -> fetch())  {                
							   	$article[] = $data;
							   	$count++;
							}
							foreach($article as $at) {
								$_SESSION['purchase'][$at['p_id']] = array('quantity' => 0);
								echo $_SESSION['cart'][$at['p_id']]['quantity']."<br>";
							}
							
							echo " il y a $count";
						}
						
				       		header("location:Homeshop1.php");
					}
					else{
				      	echo "not found";
			}
					}
		}
			       
			   
	}
	//header("Refresh:300;url=loader.php");


?>