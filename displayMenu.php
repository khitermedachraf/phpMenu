<?php
	//	Database connection
	$conn = new mysqli('localhost','root','','restaurant');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		echo"<h3>Connexion établie</h3>" ;
        echo"<h3>Le nouveau menu :</h3>  ";
        //  Requête de sélection des plats du type {entree}
        echo"<label>Que desirez-vous comme entree?</label><br>";
        $result=mysqli_query($conn,"SELECT * FROM  menu WHERE typePlat = 'entree' "); 
        if (mysqli_num_rows($result) > 0){
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)){
                //afficher le plat
                echo '<input type="radio" id="'.$row["nomPlat"].'" name="platEntree" value="'.$row["nomPlat"].'">';
                echo '<label for="'.$row["nomPlat"].'">'.$row["nomPlat"].'</label><br>';
            }
        }else {
            echo "<h3>0 results</h3>";
        }

        //  Requête de sélection des plats du type {principal}
        echo"<br><label>Que desirez-vous comme plat prinipal?</label><br>";
        $result=mysqli_query($conn,"SELECT * FROM  menu WHERE typePlat = 'principal' "); 
        if (mysqli_num_rows($result) > 0){
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)){
                //afficher le plat
                echo '<input type="radio" id="'.$row["nomPlat"].'" name="platEntree" value="'.$row["nomPlat"].'">';
                echo '<label for="'.$row["nomPlat"].'">'.$row["nomPlat"].'</label><br>';
            }
        }else {
            echo "<h3>0 results</h3>";
        } 
        
        //  Requête de sélection des plats du type {dessert}
        echo"<br><label>Que desirez-vous comme dessert ?</label><br>";
        $result=mysqli_query($conn,"SELECT * FROM  menu WHERE typePlat = 'dessert' "); 
        if (mysqli_num_rows($result) > 0){
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)){
                //afficher le plat
                echo '<input type="radio" id="'.$row["nomPlat"].'" name="platEntree" value="'.$row["nomPlat"].'">';
                echo '<label for="'.$row["nomPlat"].'">'.$row["nomPlat"].'</label><br>';
            }
        }else {
            echo "<h3>0 results</h3>";
        }        
	}	

		//	Fermer la connexion
		mysqli_close($conn);       
?>