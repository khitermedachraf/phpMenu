<?php

	//	Database connection
	$conn = new mysqli('localhost','root','','restaurant');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		echo"<h3>Connexion établie</h3>" ;
		$nameOfPlat = $_POST['nameOfPlat'];
		$typeOfPlat = $_POST['typeOfPlat'];
		// requete de verification si le user existe ou pas 
		$checkQuery = mysqli_query($conn, "SELECT * FROM menu WHERE nomPlat='$nameOfPlat'");
		if (!$checkQuery){
      	  die('Error: ' . mysqli_error($con));
   		}
		if(mysqli_num_rows($checkQuery) > 0){
		echo "<h3>Le plat  { ".$nameOfPlat." } existe deja dans Le menu </h3>";
		}else{
    		//	Requête d’insertion
			$insertQuery=mysqli_query($conn,"INSERT INTO menu VALUES(null,'$nameOfPlat','$typeOfPlat')");
			echo"<h3>Le nouveau plat a ete bien insere </;h3>";
		}	
		//	Fermer la connexion
		mysqli_close($conn);
	}
?>
