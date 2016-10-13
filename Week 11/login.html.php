<!DOCTYPE html>
<html lang = "en">
<head>
	<title>SessionsPHP</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.php" /> 
		<meta charset="UTF-8">
</head>
<body>

</body>
	<?php
		$self = htmlentities($_SERVER['PHP_SELF']);
		echo "<form action= $self method='POST'>"
	?>
  			<label for="userName">User Name:  </label>
  			<input class="btnSpace" type="text" name="userName">
  			<label for="password">Password:  </label>
  			<input class="btnSpace" type="password" name="password">

  			<button type='submit' name='login' value='login'>Login</button>
		</form>
	</div> 			
</html>