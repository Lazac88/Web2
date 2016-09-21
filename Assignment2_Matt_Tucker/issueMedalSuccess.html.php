<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Rio Olympics Issue Medal</title>
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
  			<li><a href="addEventController.php">Add Event</a></li>
  			<li><a class="active" href="issueMedalController.php">Issue Medal</a></li>
  			<li><a href="RioResetHome.php">Reset Database</a></li>

		</ul>
	</div>

	<div class="mainContent"> 
  		<?php
			$self = htmlentities($_SERVER['PHP_SELF']);
			echo "<form action= $self method='POST'>"
		?> 

		<label for="athleteID">Choose Athlete:  </label>		
  		<select class="btnSpace" name="athleteID">
			<?php
				foreach ($allAthletes as $row) 
				{				
					echo "<option value=\"$row[athleteID]\">$row[firstName] $row[lastName]</option>";
				}
			?>
		</select>

		<label for="eventID">Choose Event:  </label>	
		<select class="btnSpace" name="eventID">
			<?php
				foreach ($allEvents as $row) 
				{				
					echo "<option value=\"$row[eventID]\">$row[event] $row[sport]</option>";
				}
			?>
		</select>

		<label for="medalID">Choose Medal:  </label>	
		<select class="btnSpace" name="medalID">
			<?php
				foreach ($allMedals as $row) 
				{				
					echo "<option value=\"$row[medalID]\">$row[medalName]</option>";
				}
			?>
		</select>
		<br><br>
		
  			<!--Adds Athlete To the Database -->
		<button class="btnSpace" type='submit' name='issueMedal' value='issueMedal'>Issue Medal</button>
		</form>

		<h2>Your medal was successfully added to the database</h2>
	</div>
	
</body>

</html>