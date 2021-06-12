<?php

	//	Database connection
	$conn = new mysqli('localhost','root','','restaurant');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
    //  Requête de sélection de toute la table
    $id=mysqli_query($conn,"SELECT * FROM  clients "); 

    //  Afficher l’en_tête du tableau (on double le / à cause de /t)
    echo "<table border='/1'/><tr><th>nom client<//th><th>email client<//th><//th><th>nombre de visites<//th><//tr>";

    //   Parcourir les résultats de la requête et afficher dans un tableau
    while ($donnees = mysqli_fetch_assoc($id) ){
        echo "<TR><TD>";
        echo "$donnees[nomClient]";//afficher le nom du client
        echo"<//td><td>";
        echo "$donnees[mailClient]";//afficher l'email 
        echo"<//td><td>";
        echo "$donnees[nbVisites]";//afficher le mombre de visites d l utilisateur
        echo "<//TD><//TR>"; }  
        echo "<//table>";
 

    }
        //  Fermer la connexion
        mysqli_close($conn);
?>