<?php
	include 'SessionManagementController.html.php';
?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<title>LoginPHP</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.php" /> 
		<meta charset="UTF-8">
</head>
<body>
	<?php
		$_SESSION = array();
		session_destroy();
		
	?>
	<h1>You Have Been Logged Out<h1>

	<?php
		$self = htmlentities($_SERVER['PHP_SELF']);
		echo "<form action= $self method='POST'>"
	?>
	</form>
</body>

</html>