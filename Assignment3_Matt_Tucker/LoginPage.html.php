<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css" /> 
		<meta charset="UTF-8">
</head>
<body>
		<div id="frontBanner">
			<?php
				$self = htmlentities($_SERVER['PHP_SELF']);
				echo "<form action= $self method='POST'>"
			?>	
				<button class="cornerButtons" name='Register' type="submit">Register</button>
			</form>
			
				<div class="clearFloat"></div>
		</div>
		<div id="registerPage">
			<h1 class="welcomeInfo">Please Login Below</h1>
			<br>
			<br>
			<?php
				$self = htmlentities($_SERVER['PHP_SELF']);
				echo "<form action= $self method='POST'>"
				?>
			<div class="alignFormCenter">

				<!--Using the php in the input to refill the form if it fails. Will likely strip the input and save values to different variables once my controller is built-->
				<label>Email:</label> <input type="text" name="emailLogin"/><br>
  				<label>Password:</label> <input type="password" name="passwordLogin"/><br>
  				
  				<div class="clearFloat"></div>
  				<br>
  				<input id="loginBtn" type="submit" name="RegisterButton" value="Login">
  			</div>
			</form>
		</div>
</body>

</html>