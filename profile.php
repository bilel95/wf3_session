<?php
session_start();

// Je check que l'utilisateur est bien logué sinon je redirige vers index.php

if(empty($_SESSION['user'])){
	// On redirige dans l'index
	header('location: index.php');
	// force l'arrêt de cette page
	die();
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Wf3 Session</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">

			<div class="col-md-6">
				<h1>Profile</h1>
				<a href="logout.php">Logout</a>
			</div>
			<?php if(isset($_SESSION['user'])): ?>
				<?php print_r($_SESSION['user']); ?>
			<?php endif;?>
		</div>
	</div>

