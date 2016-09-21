<!--
	Name: Matt Tucker
	Date: 3rd September 2016
	Assignment 2
	-->


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
  			<li><a href="addCountryController.php">Add Countries</a></li>
  			<li><a class="active" href="addEventController.php">Add Event</a></li>
  			<li><a href="issueMedalController.php">Issue Medal</a></li>
  			<li><a href="RioResetHome.php">Reset Database</a></li>

		</ul>
	</div>

	<div class="mainContent"> 
  		<?php
			$self = htmlentities($_SERVER['PHP_SELF']);
			echo "<form action= $self method='POST'>"
		?>
  			<label for="eventName">Event Name:  </label>
  			<input class="btnSpace" type="text" name="eventName">
  			<label for="sportName">Sport Name:  </label>
  			<input class="btnSpace" type="text" name="sportName"><br><br>
  			
  			<!--Adds Event To the Database -->
		<button class="btnSpace" type='submit' name='addEvent' value='addEvent'>Add Your Event</button>
		</form>

		<h2><?php echo "$success";?> was successfully added to the database</h2>			<!--if event was successfully added display this -->
	</div>
	
</body>

</html>