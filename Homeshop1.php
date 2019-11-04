<?php
	session_start();
	require('expiration.php');
	$_SESSION['cpt']++;
	$cpt=$_SESSION['cpt'];

	$name="TabId".$_SESSION['login'];
	if (isset($_COOKIE["$name"])) {
		$tabCookies1 = unserialize($_COOKIE["$name"]);
		/*echo "<br><br><br><br>";
		echo "<br><br><br><br>";
		echo "<br><br><br><br>";
		echo "ouiiiiiii";*/
		//print_r($tabCookies1);
		if ($cpt==1) {
			$_SESSION['shopcart']=$tabCookies1;
		}
		
		//echo "ouiiiiiii";
	}
	

	if (isset($_SESSION['login'])) {
		$actu=count($_SESSION['shopcart']);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Bienvenue chez Pricecare !</title>
		<link rel="stylesheet" type="text/css" href="shop1.css?t=<?php echo time(); ?>">
	<style type="text/css">
		body{
	background-color: #f1f1f1;
	font-family: Arial;
}
.promo{
	float: left;
	background-color: #D3D3D3;
	margin-top: 50px;
	margin-bottom:15px;
	width: 100%;
	color: black;
	font-size: 20px;
	
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
			<div>
			<table style="width:100%" class="promo">
			  <tr>
			    <th>Promotions</th>
			    <th>Avantages fidélité</th> 
			    <th><a href="apropos.php">A propos de nous</a></th>
			  </tr>
			</table>
			<br><br><br>
			<table style="width:100%" border="1">
			  <tr>
			    <th>Le produit phare de la semaine</th>
			    <th>En ce moment chez Carrefour</th> 
			  </tr>
			  <tr>
			    <?php
				$connexion= new PDO ('mysql:host=localhost; dbname=Shop','root','');
				if(empty($connexion)){
					die('erreur de connexion');
				}
				else{
					$article = array();         
					$req= $connexion -> query("SELECT * FROM produits where p_id=3");
					while ($data = $req -> fetch()){                
					   	$article[] = $data;
					}
					$rep="pictures/";
					foreach ($article as $ray) {
						# code...
						echo "<td align=center rowspan=3>";
								echo '<form method="post" action="#">';
								//echo '<input type="hidden" name="r_id" value="'.$ray['r_id'].'">';
								$img=$ray['p_image'];
								echo '<img src="'.$rep.''.$img.'" alt="'.$ray['p_name'].'" style="width:400px;height:400px;">';
								//Lien vers un rayon spécifique
								echo '<h4>'.$ray['p_name'].'</h4>';						
								//echo '<p><input type="submit" value="Ajouter" name="Add"></p>';
								echo '</form>';

								echo "</td>";
					}
					


				}
	?>
			    <td><?php echo '<center><img src="'.$rep.'exlu_carrefour.jpg" alt="" style="width:400px;height:200px;"></center>'; ?></td> 
			 
			  </tr>
			  <tr>
			    
			    <th>En ce moment chez Leclerc</th>
			  </tr>
			  <tr>
			    
			    
			    <td><?php echo '<center><img src="'.$rep.'exclu_leclerc.jpg" alt="" style="width:400px;height:200px;"></center>'; ?></td>
			  </tr>
			</table>
			<br><br>
			<p><b>Nos rayons les plus visités</b></p>
			<table style="width:100%">
			  <tr>
			  <?php
				$connexion= new PDO ('mysql:host=localhost; dbname=Shop','root','');
				if(empty($connexion)){
					die('erreur de connexion');
				}
				else{
					$article = array();         
					$req= $connexion -> query("SELECT * FROM rayons LIMIT 4");
					while ($data = $req -> fetch()){                
					   	$article[] = $data;
					}
					$rep="pictures/";
					foreach ($article as $ray) {
						# code...
						echo "<td align=center>";
								echo '<form method="post" action="#">';
								echo '<input type="hidden" name="r_id" value="'.$ray['r_id'].'">';
								$img=$ray['r_image'];
								echo '<img src="'.$rep.''.$img.'" alt="'.$ray['r_name'].'" style="width:100px;height:100px;">';
								//Lien vers un rayon spécifique
								echo '<h4><a href="details_rayon.php?id='.$ray['r_id'].'&name='.$ray['r_name'].'">'.$ray['r_name'].'</a></h4>';						
								//echo '<p><input type="submit" value="Ajouter" name="Add"></p>';
								echo '</form>';

								echo "</td>";
					}
					


				}
	?>
			    
			  </tr>
			</table>
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