<html>
<head>
	<title>Nouvelle inscription</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="shop2.css?t=<?php echo time(); ?>">
</head>
<body class="container">
		<div style="text-align: center;">
			<img src="pictures/Pricetiger.png" id="load_img"><br><br>
		</div>

		<div id="formRegistration2">
		<form name="form2" class="formulaire2" method="post" action="#" >
			<p>
				<label for="lastName">Nom:</label>
				<span>
					<input  type="text" name="lastName" class="text" id="lastName" onblur="controlenom();" required/>
					<span id="spe"> </span>
				</span>
			</p>
			<p>
				<label for="firstName">Prénom:</label>
				<span>
					<input  required type="text" name="firstName" id="firstName" onblur="controleprenom();" required />
					<span id="spi"> </span>
				</span>
			</p>
			<p id="p">
				<label for="email">E-mail:</label>
				<span>
					<input type="text" name="email" class="text" id="adresse" onblur="controlemail();" required />
					<span id="span"> </span>
				</span>
			</p>
			<p>
				<label for="callNumber">Numéro de téléphone:</label>
				<span><br>
				<input type="text" value="+33" disabled size="3px" style="width:70px" />
				
					<input type="text" name="callNumber" class="text" id="callNumber" style="width:630px" onblur="controlenumero();" required />
					<span id="spa"> </span>
				</span>
			</p>
			<p>
				<label for="abonnement">Abonnement:</label>
				<span>
					<SELECT name="abonnement" size="1"  class="myselect">
						<OPTION selected value="1">Gratuit
						<OPTION value="2">Premium
						<OPTION value="3">VIP
					</SELECT>
				</span>
			</p>
			<p>
				<label for="login">Choisissez un identifiant:</label>
				<span>
					<input type="text" name="login" id="login" required />
				</span>
			</p>
			<p>
				<label for="password">Mot de passe:</label>
				<span>
					<input type="Password" name="password" id="password" required />
				</span>
			</p>
			<p>
				<label for="cPassword">Resaissir le mot de passe:</label>
				<span>
					<input type="Password" name="cPassword" id="cPassword" onblur="controleMDP();" required />
					<span id="spo"> </span>
					</span>
			</p>
			<p style="text-align: center;">
				<span >
					<input id="bout" type="submit" name="Submit" value="Valider" />
					<input type="reset" value="Reprendre"/>
				</span>
			</p>
  		</form>
		<!--<div id="inscription"></div>-->
		</div>
		</br></br>
		<div id="formConnexion2">
		<form id="form1">
			<p>
				<span>
					<a href="connexion.php">
						<input type="button" name="connexion" value="Se connecter" id="color" onClick=""/>
					</a>
				</span>
		
			</p>
		</form>
		</div>
		</br></br>
		
		<script type="text/javascript" src="inscription.js?t=<?php echo time(); ?>"></script>
</body>
</html>

<?php
	$connection= new PDO ('mysql:host=localhost; dbname=shop','root','') or die("Impossible to connect to the database");
	if(!empty($connection)){
		
		//echo('connexion reussie');

		//Inscription
		if(isset($_POST['Submit']) &&($_POST['password'])==$_POST['cPassword']){
			$firstName=$_POST['firstName'];
			$lastName=$_POST['lastName'];
			$password=$_POST['password'];
			$callNumber=$_POST['callNumber'];
			$email=$_POST['email'];
			$login=$_POST['login'];
			$abonnement=$_POST['abonnement'];
			$req=$connection->query("INSERT INTO users (login, firstName, lastName, email, callNumber, abonnement, password) VALUES ('$login','$firstName','$lastName','$email', '$callNumber','$abonnement', '$password')");
				
				if(empty($req)){
					echo("requete non conforme1");
				}
				else
					echo "Inscription validée! Vous pouvez maintenant vous connecter :)";
		}
			else{
				//echo "Wrong password";
			}
		}

?>