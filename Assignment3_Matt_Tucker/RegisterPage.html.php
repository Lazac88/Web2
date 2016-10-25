<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css" /> 
		<meta charset="UTF-8">
</head>
<body>
		<div id="frontBanner">
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
				<label>First name:</label> <input type="text" name="fName" value="<?php if(isset($_POST['fName'])) {echo htmlentities($_POST['fName']); }?>"/><br>
  				<label>Last name:</label> <input type="text" name="lName" value="<?php if(isset($_POST['lName'])) {echo htmlentities($_POST['lName']); }?>"/><br>
  				<label>Email:</label> <input type="text" name="email" value="<?php if(isset($_POST['email'])) {echo htmlentities($_POST['email']); }?>"/><br>
  				<label>Height(cm):</label> <input type="number" name="height" value="<?php if(isset($_POST['height'])) {echo htmlentities($_POST['height']); }?>"/><br>
  				<label>Password:</label> <input type="password" name="password1"><br>
  				<label>Repeat Password:</label> <input type="password" name="password2"><br>
  				<label>Secret Code:</label> <input type="password" name="secretCode"><br>
  				<div class="clearFloat"></div>
  				<br>
  				<input id="registerBtn" type="submit" name="RegisterButton" value="Submit">
  			</div>
			</form>
		</div>
</body>

</html>