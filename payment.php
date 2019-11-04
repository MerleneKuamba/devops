<?php
	session_start();
	require('expiration.php');
	if (isset($_SESSION['login'])) {
		$ach=array();
		$ach=$_SESSION['shopcart'];

	
		
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="shop2.css?t=<?php echo time(); ?>">
	<link rel="stylesheet" type="text/css" href="shop1.css?t=<?php echo time(); ?>">
</head>
<body>

    <div class="container">
    <div class="logo_barre">

				<div id="logo">
					<img src="pictures/logo2.png">
				</div>

				<div id="panier">
					<a href="shoppingCart.php" id="link">
						<h3 id="pan">Shopping Cart</h3>
						<img src="pictures/panier2.jpg" id="imgpan">
					</a>
				</div>
				<div id="navbar">
					<a href="Homeshop1.php" class="active">Home</a>
					<a href="women.php">Women's jewel</a>
					<a href="men.php">Men's jewel</a>
					<a href="deconnexion.php" style="float:right">Logout</a>
				</div>

			</div><br><br><br><br><br>


      
      	<div class="row1">
      		<div><h3>Your Order Summary</h3></div>
      		<?php
	
	$tab_achat=array_count_values($ach);
	//print_r($tab_achat);
	$connexion= new PDO ('mysql:host=localhost; dbname=Shop','root','');
	if(empty($connexion)){
		die('erreur de connexion');
	}
	else{
		foreach ($tab_achat as $id => $value) {
			$req= $connexion -> query("SELECT * FROM allproducts WHERE pid='$id'");		
			$article = array();    
			if (!empty($req)) {
				while ($data = $req -> fetch()){                
			   	$article[] = $data;

				}
				$rep="pictures/";
				echo '<table class="tabart" border=1>';
				foreach($article as $at) {

					$req1=$connexion -> query("SELECT * FROM women WHERE wid='$id'");
					$req2=$connexion -> query("SELECT * FROM men WHERE mid='$id'");

					if (!empty($req1)) {
						$warticle = array(); 
						while ($data1 = $req1 -> fetch()){                
					 			$warticle[] = $data1;
						}

						foreach($warticle as $wat) {
							
							echo "<tr><td align=center>";
							
							echo $at['pid'].' '.$at['name'].'  X  ';
							echo "$value<br>";
							echo "</td></tr>";

						}
					}

					if (!empty($req2)) {
						//echo "ac bon";
						$marticle = array(); 
						while ($data2 = $req2 -> fetch()){                
					 			$marticle[] = $data2;
					 			//echo "ac bon";
						}

						foreach($marticle as $mat) {
							echo "<tr><td align=center>";
							echo $at['pid'].' '.$at['name'].'  X  ';
							echo "$value<br>";
							echo "</td></tr>";

						}
					}
				}
				echo "</table><br><br><br>";
			}
		}
	}
		//$_SESSION['totalOrder']=$_['montant'];

		echo '<div style="text-align: center;"><h3>Total: '. $_SESSION['totalOrder'].'</h3></div><br>';
      		?>


      	</div>
        <div class="row1">
        <form method="post" action="bill.php">
          <div class="col-50">
            <h3>Billing Information</h3><br>

            <label for="myname">Full Name</label>
            <input type="text" id="myname" name="fullname" placeholder="Keke Jess" onblur="checkFullName();" required>
            <span id="vnom"> </span><br>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="keke@gmail.com" onblur="checkMail();" required>
            <span id="vmail"> </span><br>

            <label for="adr"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="42 rue Jean Jaures" onblur="checkAdr();" required>
            <span id="vadr"> </span><br>

            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder="Choisy-le-roi" onblur="checkCity();" required>
            <span id="vcity"> </span><br>

			<label for="state">State</label>
            <input type="text" id="state" name="state" placeholder="Val-de-marne" onblur="checkState();" required>
            <span id="vstate"> </span><br>

            <label for="zip">Zip Code</label>
            <input type="text" id="zip" name="zip" placeholder="94000" onblur="checkZipCode();" required>
            <span id="vzip"> </span><br>

            <label for="datedel">Choose a date for your delivery</label>
            <input type="date" id="datedel" name="datedel" placeholder="" min="2018-05-09" required><br>

            <label for="timedel">Choose an hour for your delivery</label>
            <input type="time" id="timedel" name="timedel" placeholder=""  required><br>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
            	<img src="pictures/cards.jpg" id="imgcard"><br>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Keke Jess Kwasi" onblur="checkCardName();" required>
            <span id="vcname"> </span><br>

            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" onblur="checkCardNum();" required>
            <span id="vccnum"> </span><br>

            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="01" onblur="checkMonth();" required>
            <span id="vmonth"> </span><br>

            <label for="expyear">Exp Year</label>
            <input type="text" id="expyear" name="expyear" placeholder="ex: 18 for 2018" onblur="checkYear();" required>
            <span id="vyear"> </span><br>

            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="352" onblur="checkCvv();" required>
            <span id="vcvv"> </span><br><br>
             
          </div>
          <p style="text-align: center;"><input type="submit" value="Confirm payment" name="confirmpayment" class="btn"></p>
          </form>
        </div>
        
      
    </div>
  
	
		<script type="text/javascript" src="inscription.js?t=<?php echo time(); ?>"></script>
		
	<div class="about" style="text-align: center;"><center><h4>About us</h4></center>
				Welcome to <b>A&M</b> Jelwery! Here you can find a large range of jewels for men and women! <br>
				Our address is on <b>132 avenue je ne sais pas 94230 cachan</b><br>
				If you want you can join us atthe folowing number <b>+77190397809</b> and follow us on facebook<br><br>
			</div>
			<div class="foot" style='font-family: "Lucida Calligraphy";''><center>Made by @M.K.</center></div>
</body>
</html>
<?php
	
	}
	else{
		echo "Please connect....";
	}
?>