<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Rio Olympics Home</title>
	<link rel="stylesheet" type="text/css" href="RioStyle.css" /> 
	<meta charset="UTF-8">
</head>
<body>
	
	<header>
		<H1>Welcome to the Rio Olympics</H1>
	</header>

	<div class="menu">
		<ul>
  			<li><a href="RioHome.html">Home</a></li>
  			<li><a href="athleteController.php">Search Athletes</a></li>
  			<li><a href="countryController.php">Search Countries</a></li>
  			<li><a href="addAthleteController.php">Add Athlete</a></li>
  			<li><a class="active" href="addCountryController.php">Add Countries</a></li>
  			<li><a href="addEventController.php">Add Event</a></li>
  			<li><a href="issueMedalController.php">Issue Medal</a></li>
  			<li><a href="RioResetHome.php">Reset Database</a></li>

		</ul>
	</div>

	<div class="mainContent"> 
  		<?php
			$self = htmlentities($_SERVER['PHP_SELF']);
			echo "<form action= $self method='POST'>"
		?>
  			<label for="countryName">Country Name:  </label>
  			<input class="btnSpace" type="text" name="countryName">
  			<label for="countryImageName">Image Name (E.g. "USA.jpg"):  </label>
  			<input class="btnSpace" type="text" name="countryImageName">
  			<label for="population">Population: </label>
  			<input class="btnSpace" type="number" name="population" min="1"><br><br>
  			<!--Adds Country To the Database -->
		<button class="btnSpace" type='submit' name='addCountry' value='addCountry'>Add Your Country</button>
		</form>
	</div>
</body>

</html>