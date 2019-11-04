<?php
	session_start();
	
	if (isset($_SESSION['login'])) {
		$actu=count($_SESSION['shopcart']);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Produits</title>
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
				<div id="panier">
					<a href="shoppingCart.php" id="link">
					<button type="submit" disabled style="float:right"><?php echo "$actu" ?></button>
						<h3 id="pan">Panier</h3>
						<img src="pictures/panier2.jpg" id="imgpan">
					</a>
				</div>
				<div id="navbar">
					<a href="Homeshop1.php">Accueil</a>
					<a href="produits.php" class="active">Produits</a>
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
			
			<div id= "block1" class="container">
				<center><h3 class="	text-primary text-center ">Tous les produits</h3></center>
			</div>
			<div class="contenu">
	<?php
		$connexion= new PDO ('mysql:host=localhost; dbname=Shop','root','');
				if(empty($connexion)){
					die('erreur de connexion');
				}
				else{
					$produit = array();         
					$req= $connexion -> query("SELECT * FROM produits");
					while ($data = $req -> fetch()){                
					   	$produit[] = $data;
					}
					$rep="pictures/";
					foreach($produit as $prod) {

								echo '<table class="tabart" border=1>';
								echo "<tr><td align=center>";
								echo '<form method="post" action="#">';
								echo '<input type="hidden" name="p_id" value="'.$prod['p_id'].'">';
								$img=$prod['p_image'];
								echo '<img src="'.$rep.''.$img.'" alt="'.$prod['p_name'].'" style="width:200px;height:200px;">';
								echo '<h4>'.$prod['p_name'].'</h4>';						
								echo '<p><input type="submit" value="Ajouter" name="Add"></p>';
								echo '</form>';

								echo "</td></tr>";
								echo '</table>';
								
							
						
						
					}
					


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
	</body>

	<script type="text/javascript" src="shop.js"></script>
		
</html>
<?php
	if(isset($_POST['Add'])){
		$prod=$_POST['p_id'];
		$_SESSION['shopcart'][]=$prod;
		header("location:produits.php");

	}
	}
	else{
		echo "Please connect....";
	}
?>