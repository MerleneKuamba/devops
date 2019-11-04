<?php 
	
	function getDatabaseConnexion() {
		try {
		    $user = "root";
			$pass = "";
			$pdo = new PDO('mysql:host=localhost;dbname=shop', $user, $pass);
			 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
			
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
 
	
	// récupere tous les users
	function getAllUsers() {
		$con = getDatabaseConnexion();
		$requete = 'SELECT * from users';
		$rows = $con->query($requete);
		return $rows;
	}
 
	// creer un user
	function createUser($nom, $prenom, $callNumber, $login, $password, $email, $abonnement) {
		try {
			$con = getDatabaseConnexion();
			$sql = "INSERT INTO users (lastName, firstName, login, password, email, callNumber, abonnement) 
					VALUES ('$nom', '$prenom', '$login' ,'$password',$email,$callNumber,$abonnement)";
	    	$con->exec($sql);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
 
	//recupere un user
	function readUser($id) {
		$con = getDatabaseConnexion();
		$requete = "SELECT * from users where id_user = '$id' ";
		$stmt = $con->query($requete);
		$row = $stmt->fetchAll();
		if (!empty($row)) {
			return $row[0];
		}
		
	}
 
	//met à jour le user
	function updateUser($nom, $prenom, $callNumber, $login, $password, $email, $abonnement) {
		try {
			$con = getDatabaseConnexion();
			$requete = "UPDATE users set 
						lastName = '$nom',
						firstName = '$prenom',
						login = '$login',
						password = '$password',
						email = '$email',
						abonnement = '$abonnement',
						callNumber = '$callNumber' 
						where id = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
 
	// suprime un user
	function deleteUser($id) {
		try {
			$con = getDatabaseConnexion();
			$requete = "DELETE from users where id_user = '$id' ";
			$stmt = $con->query($requete);
		}
	    catch(PDOException $e) {
	    	echo $sql . "<br>" . $e->getMessage();
	    }
	}
?>