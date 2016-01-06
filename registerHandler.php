<?php

require(__DIR__.'/config/pdo.php');

// je vérifie que le submit a été clické 

	if(isset( $_POST['action'])){
		// Affecte une valeur à chaque valeur de $_POST , htmlentities évite que l'utilisateur mette des balises et trim enlève tous les espaces inutiles
		$email= trim(htmlentities($_POST['email']));
		$password= trim(htmlentities($_POST['password']));;
		$confirmPassword=trim(htmlentities($_POST['confirmPassword']));;

	

		// Initialisation d'un tableau d'erreurs
		$errors = [];

		// check du champs email
		if(empty($email) || (filter_var($email,FILTER_VALIDATE_EMAIL)=== false )){
			$errors['email'] = "wrong email.";
		} elseif (strlen($email)> 60 ) {
				$errors['email'] = "Email too long";
		} else {
			// Je vérifie que l'email n'existe pas déjà dans ma base de données
			$query= $pdo->prepare('SELECT email FROM  users WHERE email= :email');
			$query->bindValue(':email',$email,PDO::PARAM_STR);
			$query->execute();
			// je récupère le resultat sql
			$resultEmail= $query->fetch();

			if($resultEmail['email']){
				$errors['email']="email already exists.";
			}

		}

		// check du champs password
		// 1. Vérifier que les deux mdp sont identiques
		// 2. Vérifier que le mdp ne fasse pas moins de 6 caractères 
		// 3.condition de caractères dans le password

		if($password != $confirmPassword){
			$errors['password']='Not same passwords.';
		} elseif(strlen($password) <= 6){
			$errors['password']="Password too short.";
		} else {
			// le password contien au moins une lettre ?
			$containsLetter = preg_match('/[a-zA-Z]/',$password);
			// le password à au moins un chiffre ?
			$containsDigit = preg_match('/\d/',$password);
			// le password contien au moins un autre caractère ?
			$containsSpecial = preg_match('/[^a-zA-Z\d]/', $password);

			// si une des conditions n'est pas remplies ... erreur

			if(!$containsLetter || !$containsDigit || !$containsSpecial  ){
				$error['password'] = 'Choose a best password with at least one letter, one number and one sepciale caracter.';
			}
		}


		if(empty($errors)){
			$query = $pdo->prepare('INSERT INTO users(email,password,created_at,updated_at) VALUES (:email,:password, NOW() , NOW())');
			$query->bindValue('email',$email,PDO::PARAM_STR);

			// Hash du password pour la sécurité
			$hashedPassword = password_hash($password,PASSWORD_DEFAULT);
			echo $hashedPassword;
		}

	} 


?>