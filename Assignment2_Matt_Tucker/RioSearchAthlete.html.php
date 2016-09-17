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
  			<li><a href="medalTable.html.php">Medal Table</a></li>
  			<li><a class="active" href="RioSearchAthlete.html.php">Search Athletes</a></li>
  			<li><a href="countryController.php">Search Countries</a></li>
  			<li><a href="addAthlete.html.php">Add Athlete</a></li>
  			<li><a href="addCountry.html.php">Add Countries</a></li>
  			<li><a href="deleteAthlete.html.php">Delete Athlete</a></li>

		</ul>
	</div>

	<div class="mainContent"> 
  		<?php
			$self = htmlentities($_SERVER['PHP_SELF']);
			echo "<form action= $self method='POST'>"
		?>
		First name: <input type="text" name="FirstName" placeholder="First Name">
		Last name: <input type="text" name="LastName" placeholder="Last Name"><br>

		<!--List all sport chocies including All Sports-->
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
	</div>
</body>

</html>