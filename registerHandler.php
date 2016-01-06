<?php

require(__DIR__.'/config/pdo.php');

// je vérifie que le submit a été clické 

	if(isset( $_POST['action'])){
		// Affecte une valeur à chaque valeur de $_POST , htmlentities évite que l'utilisateur mette des balises et trim enlève tous les espaces inutiles
		$email= trim(htmlentities($_POST['email']));
		$password= trim(htmlentities($_POST['password']));;
		$confirmPassword=trim(htmlentities($_POST['confirmPassword']));;

		echo $email.'<br>';
		echo $password.'<br>';
		echo $confirmPassword.'<br>';
	} 


?>