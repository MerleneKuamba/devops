<?php
	session_start();
	require('expiration.php');
	if (isset($_SESSION['login'])) {
		$actu=count($_SESSION['shopcart']);
		$ach=array();
		$ach=$_SESSION['shopcart'];


		$tab_achat=array_count_values($ach);
		$tab_count=count($tab_achat);
		$tab_id=array_keys($tab_achat);
		//print_r($tabserial);
		
		
		/*foreach($ach as $ac) {
			echo $ac.'<br>';
		}*/
		//echo "<br><br><br><br>";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Shopping cart</title>
		<link rel="stylesheet" type="text/css" href="shop1.css?t=<?php echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="shop3.css?t=<?php echo time(); ?>">
		<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    	<script type="text/javascript" src="dist/js/jquery.min.js"></script>
    	<script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
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
				<a href="produits.php">Produits</a>
				<a href="magasins.php">Magasins</a>
				<a href="rayons.php">Rayons</a>
				<a href="deconnexion.php" style="float:right">Déconnexion</a>
			</div>

			</div>
			
			<div class="contenu">
<?php
	$sum=0;
	
	//print_r($tab_id);
	//print_r($tab_achat);
	$connexion= new PDO ('mysql:host=localhost; dbname=Shop','root','');
	if(empty($connexion)){
		die('erreur de connexion');
	}
	else{
		
		foreach ($tab_achat as $id => $value) {
			$req= $connexion -> query("SELECT * FROM produits WHERE p_id='$id'");		
			$article = array();    
			if (!empty($req)) {
				while ($data = $req -> fetch()){                
			   	$article[] = $data;

				}
				$rep="pictures/";
				
				foreach($article as $at) {
					$newid=$at['p_id'];
					$req1=$connexion -> query("SELECT * FROM prodmag WHERE p_produit_id='$newid'");
					//$req2=$connexion -> query("SELECT * FROM men WHERE mid='$id'");

					if (!empty($req1)) {
						//echo "ac bon";
						$warticle = array(); 
						while ($data1 = $req1 -> fetch()){                
					 			$warticle[] = $data1;
					 			//echo "ac bon";
						}

						foreach($warticle as $wat) {
						
							echo '<table class="tabart" border=1>';
							echo '<form method="post" class="formach" action="#">';
							$img=$at['p_image'];

							echo "<tr><td align=center>";
							echo '<img src="'.$rep.''.$img.'" alt="'.$at['p_name'].'" style="width:200px;height:200px;">';
							echo ''.$at['p_name'].'<br>';	
							echo '<input type="hidden" name="pid" value="'.$at['p_id'].'">';

							echo "</td>";

							echo "<td align=center>";
							echo 'Quantity: ';
							echo '<button type="submit" name="reduce"> - </button> ';
							//echo $_SESSION['purchase'][$at['pid']]['quantity']."<--on est ici";
							echo "<input type='text' id='quant' value='$value'> ";	

							echo '<button type="submit" name="increment"> + </button> ';
							echo '<button type="submit" name="delete">X</button>';
							echo "</td>";
							echo '</form>';	
							echo "</td></tr>";
							echo '</table>';
											
							$sum+=($wat['prix']*$value);

						}
					}
				}
			
			}
		}
	}
	

	if(isset($_POST['reduce'])){
		
		$sup=$_POST['pid'];
		$i=array_search($sup, $_SESSION['shopcart']);
		unset($_SESSION['shopcart'][$i]);		
		
		header("location:shoppingCart.php");
	}
	if(isset($_POST['increment'])){
		$sup=$_POST['pid'];
		//$i=array_search($sup, $_SESSION['shopcart']);
		$_SESSION['shopcart'][]=$sup;
		header("location:shoppingCart.php");
	}

	if(isset($_POST['delete'])){
		$sup=$_POST['pid'];
		//echo "$sup<br>";
		//print_r($_SESSION['shopcart']);
		$is=array_search($sup, $_SESSION['shopcart']);
		//echo "<br>x$is";
		if ($is==0) {
			$is=-1;
		}
		while($is){
			//unset($_SESSION['shopcart'][$is]);
			if ($is==-1) {
				unset($_SESSION['shopcart'][0]);
			}
			else
				unset($_SESSION['shopcart'][$is]);
			
			$is=array_search($sup, $_SESSION['shopcart']);
			//echo "<br><br><br><br>";

			//echo "ok";
		}
		header("location:shoppingCart.php");
	}

	

	
?>
</div>
			<div style="text-align: center;">
				<?php
					echo "<h3>Total : $sum<h3><br>";
					$_SESSION['totalOrder']=$sum;
					if ($sum!=0) {
						echo "<a href='payment.php'><button type='submit' name='payment'>Go for payment</button></a>";
					}
					else
						echo "Votre panier est vide !";
					
					//echo "<a href='payment.php'><button type='submit' name='reset_cart'>Discard shopping cart</button></a>";
				?>
			</div>

			<div class="about" style="text-align: center;"><center><h4>A propos de nous</h4></center>
				Bienvenue chez <b>PriceTiger</b> le site où vous pourrez économiser tout en mangeant sainement et trouver votre magasin à proximité <br>
				Nos contacts <b>132 avenue je ne sais pas 94230 cachan</b><br>
				Si vous voulez nous joindre, appeler le <b>+33190397809</b> ou suivez-nous sur notre page facebook<br><br>
			</div>
			<div class="foot" style='font-family: "Lucida Calligraphy";''><center>Made by @TeamPriceTiger</center></div>


		</div>


		<script type="text/javascript" src="shop.js?t=<?php echo time(); ?>"></script>
		
</html>
<?php
	
	}
	else{
		header("location:connexion.php");
		//echo "Please connect....";
	}
?>

<script type="text/javascript">
	
</script>