<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css" /> 
		<meta charset="UTF-8">
</head>
<body>
	<header>
	</header>
		<div class="subBannerLogin">
			<H1>Exercise Tracker</H1>
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
			<?php
				echo (" <label> Email: </label> <input type='text' name='emailLogin'/> <span class='error'>* $loginErr </span> <br> ");
				echo (" <label> Password: </label> <input type='password' name='passwordLogin'/> <span class='error'>* $passwordErr </span> <br> ");

  				echo (" <span id='registrationSuccessful'>$registrationSuccessful </span><br><br>");
  			?>
  				
  				<div class="clearFloat"></div>
  				<br>
  				<input id="loginBtn" type="submit" name="LoginButton" value="Login">
  			</div>
			</form>
		</div>
</body>

</html>