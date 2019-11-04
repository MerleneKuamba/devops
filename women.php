<?php
	session_start();
	
	if (isset($_SESSION['login'])) {
		$actu=count($_SESSION['shopcart']);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Women's Jewelry</title>
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
					<img src="pictures/logo2.png">
				</div>
				<div id="panier">
					<a href="shoppingCart.php" id="link">
					<button type="submit" disabled style="float:right"><?php echo "$actu" ?></button>
					<h3 id="pan">Shopping Cart</h3>
					<img src="pictures/panier2.jpg" id="imgpan">
					
					</a>
				</div>
				<div id="navbar">
					<a href="Homeshop1.php">Home</a>
					<a href="women.php" class="active">Women's jewel</a>				
					<a href="men.php">Men's jewel</a>
					<a href="deconnexion.php" style="float:right">Logout</a>
					<div class="search-container">
					    <form action="search.php" method="post">
					      <input type="text" placeholder="Search.." name="result">
					      <button type="submit" name="search1">Search</button>
					    </form>
					 </div>
				</div>
			</div>
			

			<div id= "block1" class="container">
				<center><h3 class="	text-primary text-center ">Women's Jewelry </h3></center>
			</div>
			<div class="contenu">
	<?php
		$connexion= new PDO ('mysql:host=localhost; dbname=Shop','root','');
				if(empty($connexion)){
					die('erreur de connexion');
				}
				else{
					$article = array();         
					$req= $connexion -> query("SELECT * FROM allproducts");
					while ($data = $req -> fetch()){                
					   	$article[] = $data;
					}
					$rep="pictures/";
					foreach($article as $at) {
						
						$pid=$at['pid'];
						
						$req1=$connexion -> query("SELECT * FROM women WHERE wid='$pid'");

						if (!empty($req1)) {
							$warticle = array(); 
							while ($data1 = $req1 -> fetch()){                
					   			$warticle[] = $data1;
							}
							foreach($warticle as $wat) {
								echo '<table class="tabart" border=1>';
								echo "<tr><td align=center>";
								echo '<form method="post" action="#">';
								echo '<input type="hidden" name="pid" value="'.$at['pid'].'">';
								
								$img=$wat['wimage'];
								echo '<img src="'.$rep.''.$img.'" alt="'.$wat['wname'].'" style="width:300px;height:300px;">';
								echo '<h4>'.$at['name'].'</h4>';						
								echo '<p><input type="submit" value="Ajouter" name="Add"></p>';
								echo "</form>";
								echo "</td></tr>";
								echo '</table>';
								//echo '</form></div></div>';
								//echo '<h4>'.$wat['wname'].'</h4>';
							}
						}
						
						
					}


				}
	?>
			</div>

			<div class="about" style="text-align: center;"><center><h4>About us</h4></center>
				Welcome to <b>A&M</b> Jelwery! Here you can find a large range of jewels for men and women! <br>
				Our address is on <b>132 avenue je ne sais pas 94230 cachan</b><br>
				If you want you can join us atthe folowing number <b>+77190397809</b> and follow us on facebook<br><br>
			</div>
			<div class="foot" style='font-family: "Lucida Calligraphy";''><center>Made by @M.K.</center></div>


		</div>

		</body>
		<script type="text/javascript" src="shop.js"></script>
		
</html>
<?php
	if(isset($_POST['Add'])){
		$prod=$_POST['pid'];
		$_SESSION['shopcart'][]=$prod;
		header("location:women.php");

	}
	}
	else{
		echo "Please connect....";
	}
?>