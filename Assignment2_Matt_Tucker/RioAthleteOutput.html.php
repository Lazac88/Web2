<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Rio Olympics Athletes</title>
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
  			<li><a class="active" href="athleteController.php">Search Athletes</a></li>
  			<li><a href="countryController.php">Search Countries</a></li>
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
		First name: <input class="btnSpace" type="text" name="FirstName" placeholder="First Name">
		Last name: <input class="btnSpace" type="text" name="LastName" placeholder="Last Name"><br>

		<!--List all sport chocies including All Sports-->
		<label for="sport">Sport: </label>
		<select class="btnSpace" name="sport">
			<option></option>
			<option value='All Sports'>All Sports</option>
			<?php
				foreach ($allSports as $row) 
				{				
					echo "<option value=\"$row[sport]\">$row[sport]</option>";
				}
			?>
		</select>


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

		<label for="medal">Medal: </label>
		<select class="btnSpace" name="medal">
		<option></option>
			<option value='All Medals'>All Medals</option>
			<?php
				foreach ($allMedals as $row) 
				{				
					echo "<option value=\"$row[medalName]\">$row[medalName]</option>";
				}
			?>
		</select>
		
		<!--Sends User To Output Page with selected value -->
		<button class="btnSpace" type='submit' name='findAthlete' value='findAthlete'>Find Your Athletes</button>		
		</form>
		<?php
			$self = htmlentities($_SERVER['PHP_SELF']);
			echo "<form action= $self method='POST'>"
		?>
		<!--Deletes Athletes From the Database -->
		<button class="btnSpace" type='submit' name='deleteAthlete' value='deleteAthlete'>Delete Selected Athletes</button>
		<br>
		<br>
	<table>
		<tr>
			<th>Delete?</th>
			<th>Picture</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Sport</th>
			<th>Event</th>
			<th>Medal</th>
			<th>Country</th>
			<th>Flag</th>
		</tr>

		<?php
		
		foreach($athleteResult as $row)
		{
			echo "<tr>";
			echo "<td><input type='checkbox' name='deleteList[]' value='$row[athleteID]'></td>";
			echo "<td><img src='photos/$row[athleteImage]' /></td>";
			echo "<td>$row[firstName]</td>";
			echo "<td>$row[lastName]</td>";
			echo "<td>$row[sport]</td>";
			echo "<td>$row[event]</td>";
			echo "<td>$row[medalName]</td>";
			echo "<td>$row[countryName]</td>";
			echo "<td><img src='flags/$row[countryFlagImage]' /></td>";
			echo "</tr>";
		}

		?>

	</table>
	</form>
	</div>
</body>

</html>

