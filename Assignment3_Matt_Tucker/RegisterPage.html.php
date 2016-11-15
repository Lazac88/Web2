<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Register</title>
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
				<button class="cornerButtons" name="Login" type="submit">Login</button>
			</form>
			
				<div class="clearFloat"></div>
		</div>
		<div id="registerPage">
			<h1 class="welcomeInfo">Please Enter Your Details Below</h1>
			<br>
			<br>
			<?php
				$self = htmlentities($_SERVER['PHP_SELF']);
				echo "<form action= $self method='POST'>"
			?>
			<div class="alignFormCenter">
			<!--Using the php in the input to refill the form if it fails. Will likely strip the input and save values to different variables once my controller is built-->
			<?php 
				
				echo ("	<label>First name:</label> <input type='text' name='fName' value='$fName'/> <span class='error'>* $fNameErr</span> <br> ");

		  		echo ("	<label>Last name:</label> <input type='text' name='lName' value='$lName'/> <span class='error'>* $lNameErr</span> <br> ");

		  		echo ("	<label>Email:</label> <input type='text' name='email' value='$email'/> <span class='error'>* $emailErr</span> <br> ");

		  		echo ("	<label>Height(cm):</label> <input type='number' name='height' value='$height'/> <span class='error'>* $heightErr</span> <br> ");

		  		echo ("	<label>Password:</label> <input type='password' name='password1'><span class='error'>* $passwordErr</span> <br> ");

		  		echo ("	<label>Repeat Password:</label> <input type='password' name='password2'> <span class='error'>*</span> <br> ");

		  		echo ("	<label>Secret Code:</label> <input type='text' name='secretCode'> <span class='error'>*$secretCodeErr</span> <br> ");
		  			
			?>
				
  				<div class="clearFloat"></div>
  				<br>
  				<input id="registerBtn" type="submit" name="RegisterButton" value="Submit">
  			</div>
			</form>
		</div>
</body>

</html>