<?php
	session_start();
	require('expiration.php');
	if (isset($_SESSION['login'])) {
	
		if (isset($_POST['confirmpayment'])) {
			$fullName=$_POST['fullname'];
			$email=$_POST['email'];
			$address=$_POST['address'];
			$city=$_POST['city'];
			$state=$_POST['state'];
			$zipcode=$_POST['zip'];
			$cardname=$_POST['cardname'];
			$cardnum=$_POST['cardnumber'];
			$expmonth=$_POST['expmonth'];
			$expyear=$_POST['expyear'];
			$cvv=$_POST['cvv'];
			$datedel=$_POST['datedel'];
			$timedel=$_POST['timedel'];
			$total=$_SESSION['totalOrder'];
		?>
<!DOCTYPE html>
<html>
<head>
	<title>Bill</title>
	<link rel="stylesheet" type="text/css" href="shop1.css?t=<?php echo time(); ?>">
</head>
<body>
	<body class="sb-page-header">
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
					<a href="Homeshop1.php">Home</a>
					<a href="women.php">Women's jewel</a>
					<a href="men.php">Men's jewel</a>
					
					<a href="deconnexion.php" style="float:right">Logout</a>
				</div>

			</div>

			<div>
		
<?php

			echo "<h3>Thank your for your order, $fullName</h3>";
			echo "You will be delivered at $address $city $zipcode $state on $datedel at $timedel.<br>";
			echo "Please find your bill below.<br><br>";
			echo "--------------<br>";
			echo "<h3>Bill</h3>";
			echo "Name of the client: $fullName<br>";
			echo "Delivery address: $address $city $zipcode $state<br>";
			echo "Delivery date: $datedel at $timedel<br>";
			echo "Total payment: $total<br><br>";
			echo "</t>Payment information<br>";
			echo "Card propriety: $cardname<br>";
			echo "Card Number: $cardnum<br>";
			echo "--------------<br><br>";

			echo "<a href='Homeshop1.php'><button type='submit'>Return to homepage</button></a>";
			$_SESSION['shopcart']=array();
		
		}
	}

?>
			</div>
		</div>	
</body>
</html>