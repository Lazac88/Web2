<!DOCTYPE html>
<html>
<!--
	Name: Matt Tucker
	Date: 1st September 2016
	Assignment 1
-->
<head>
	<title>Search</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id= "contents">
	<img alt="Rio Banner" src="images/rio.jpg" />
	
	<?php
	$self = htmlentities($_SERVER['PHP_SELF']);
	echo "<form action= $self method='POST'>"
	?>
	<!--List all sport chocies including All Sports-->
	<select class="btnSpace" name="sport">
		<option value='All Sports'>All Sports</option>
		<?php
			foreach ($allSports as $row) 
			{
				
				echo "<option value=\"$row[sport]\">$row[sport]</option>";
			}
		?>
	</select>
		<!--Sends User To Output Page with selected value -->
		<button class="btnSpace" type='submit' name='chooseSport' value='chooseSport'>Find Your Athletes</button>
	</form>		
	</div>
</body>
</html>