<?php
	session_start();
	require('expiration.php');


	if (isset($_SESSION['login'])) {
		
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Home Shop</title>
		<link rel="stylesheet" type="text/css" href="shop1.css?t=<?php echo time(); ?>">
	<style type="text/css">
		body{
	background-color: #f1f1f1;
	font-family: Arial;
}
			
		</style>
	</head>
	<body class="sb-page-header">
		<div class="container">

			<div class="logo_barre">

				<div id="logo">
					<img src="pictures/Pricetiger.png" style="height: 70px; width: 100px;">
				</div>

				
				<div id="navbar">
					<a href="Homeshop1.php" class="active">Accueil</a>
					<a href="produits.php">Produits</a>
					<a href="magasins.php">Magasins</a>
					<a href="rayons.php">Rayons</a>
					<a href="deconnexion.php" style="float:right">Déconnexion</a>
					<div class="search-container">
					    <form action="search.php" method="post">
					      <input type="text" placeholder="Rechercher.." name="result">
					      <button type="submit" name="search1">Rechercher</button>
					    </form>
					 </div>
				</div>

			</div>


			
			<div class="contenu">
			<!--<div id= "block1" class="container">
				<center><h3 class="	text-primary text-center ">Women's Jewel </h3></center>
			</div>-->
			<div>Bonjour admin. Que veux-tu faire aujourd'hui?</div>
			<div>
				<ul>
					<li><a href="index.php">Gérer les produits</a></li>
					<li><a href="">Gérer les magasins</a></li>
					<li><a href="">Gérer les rayons</a></li>
					<li><a href="">Gérer les utilisateurs</a></li>
				</ul>
			</div>
	<?php
		$connexion= new PDO ('mysql:host=localhost; dbname=Shop','root','');
				if(empty($connexion)){
					die('erreur de connexion');
				}
				else{
					$article = array();         
					$req= $connexion -> query("SELECT * FROM produits");
					while ($data = $req -> fetch()){                
					   	$article[] = $data;
					}
					$rep="pictures/";
				
					


				}
	?>
	</div>

			<div class="about" style="text-align: center;"><center><h4>A propos de nous</h4></center>
				Bienvenue chez <b>PriceTiger</b> le site où vous pourrez économiser tout en mangeant sainement et trouver votre magasin à proximité <br>
				Nos contacts <b>132 avenue je ne sais pas 94230 cachan</b><br>
				Si vous voulez nous joindre, appeler le <b>+33190397809</b> ou suivez-nous sur notre page facebook<br><br>
			</div>
			<div class="foot" style='font-family: "Lucida Calligraphy";''><center>Made by @TeamPriceTiger</center></div>


	</div>


		<script type="text/javascript" src="shop.js"></script>
		
</html>
<?php
	if(isset($_POST['Add'])){
		$prod=$_POST['pid'];
		$_SESSION['shopcart'][]=$prod;
		header("location:Homeshop1.php");
		
	}
	}
	else{
		header("location:connexion.php");
		//echo "Please connect....";
	}
?>