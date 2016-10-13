<!DOCTYPE html>
<html lang = "en">
<head>
	<title>LoginPHP</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.php" /> 
		<meta charset="UTF-8">
</head>
<body>
	<?php
		include 'SessionManagementController.html.php'
	?>
	<h1>Welcome to my Home Page<h1>

	<?php
		$self = htmlentities($_SERVER['PHP_SELF']);
		echo "<form action= $self method='POST'>"
	?>
		<a href="LogoutPage.html.php">Logout</a>
	</form>
</body>

</html>