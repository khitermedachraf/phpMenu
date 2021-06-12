<?php

	//	Database connection
	$conn = new mysqli('localhost','root','','restaurant');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		echo"<h3>Connexion établie</h3>" ;
		$name = $_POST['name'];
		$email = $_POST['email'];
		// requete de verification si le user existe ou pas 
		$checkQuery = mysqli_query($conn, "SELECT * FROM clients WHERE nomClient='$name'");
		if (!$checkQuery){
      	  die('Error: ' . mysqli_error($con));
   		}
		if(mysqli_num_rows($checkQuery) > 0){
		echo "<h3>L'utilisateur { ".$name." } existe deja </h3>";
		//	incrementation de nombre de visites.
		$incrementQuery = mysqli_query($conn,"
			UPDATE clients 
			SET nbVisites = nbVisites + 1
			WHERE nomClient='$name'
		");
		echo"<h3>Le nombre de visites d'utilisateur { ".$name." } est incremente. </h3>";
		}else{
    		//	Requête d’insertion
			$insertQuery=mysqli_query($conn,"INSERT INTO clients VALUES(null,'$name','$email','1')");
			echo"<h3>L'utilisateur a ete bien insere </;h3>";
		}	
		//	Fermer la connexion
		mysqli_close($conn);
	}
?>