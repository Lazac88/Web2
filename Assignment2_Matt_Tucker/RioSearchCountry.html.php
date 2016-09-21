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
  			<li><a class="active"  href="countryController.php">Search Countries</a></li>
  			<li><a href="addAthleteController.php">Add Athlete</a></li>
  			<li><a href="addCountryController.php">Add Countries</a></li>
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
		<!--List all sport chocies including All Sports-->
		<label for="country">Country: </label>
		<select class="btnSpace" name="country">
			<option></option>
			<option value='All Countries'>All Countries</option>
			<?php
				foreach ($allCountries as $row) 
				{				
					echo "<option value=\"$row[countryName]\">$row[countryName]</option>";
				}
			?>
		</select>

		<!--Sends User To Output Page with selected value -->
		<button class="btnSpace" type='submit' name='findCountry' value='findCountry'>Find Your Country</button>
		</form>
	</div>
</body>

</html>