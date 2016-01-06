<?php
	session_start();
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

			<?php if(isset($_SESSION['message'])) : ?>
				<div class="alert alert-info">
					<?php echo $_SESSION['message'];?>
					<?php unset($_SESSION['message']);?>
				</div>
			<?php endif;?>

			<div class="col-md-6">
				<h1>Register</h1>

					<?php if(isset($_SESSION['registerErrors'])):?>
						<!-- Affiche les erreurs stockées en session avec la clé registerErrors -->
						<?php print_r($_SESSION['registerErrors']);?>
						<!-- Supprime les erreurs après les avoir affichées une fois -->
						<?php unset($_SESSION['registerErrors']);?>
					<?php endif; ?>
				<!-- Copié de bootstrap -->
				<form method="POST" action="registerHandler.php">

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email"  name="email" placeholder="Email">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password"  placeholder="Password">
					</div>

					<div class="form-group">
						<label for="confirmPassword">Confirm Password</label>
						<input type="password" class="form-control" id="confirmPassword"  name="confirmPassword" placeholder="Password">
					</div>
					

					<button type="submit" class="btn btn-default" name="action">Submit</button>
				</form>
			
			</div>

			<div class="col-md-6">
				<h1>Login</h1>
				<!-- Copié de bootstrap -->
				<form method="POST" action="loginHandler.php">

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email"  name="email" placeholder="Email">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password"  placeholder="Password">
					</div>
					<div class="form-group">
						<p class="help-block">
							<a href="forgotPassword.php">Forgot your password ?</a>
						</p>
					</div>

					<button type="submit" class="btn btn-default" name="action">Submit</button>
				</form>
			
			</div>
			

		</div>
	</div>	
</body>
</html>