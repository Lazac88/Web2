<!--
	Matt Tucker
	Assignment 3
	Date 16/11/16
-->
<!DOCTYPE html>
<html lang = "en">
<head>
	<title>User Data</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css" /> 
	<meta charset="UTF-8">
</head>
<body>
	
	<header>
	
	</header>
	<div class="subBanner">
		<H1>Exercise Tracker</H1>
		<?php
			$self = htmlentities($_SERVER['PHP_SELF']);
			echo "<form action= $self method='POST'>";
			$userName = $_SESSION['firstName'];
			echo ("<input id='logoutBtn' type='submit' name='logoutBtn' value='Logout'>");
			echo ("<span id='helloBtn'>Hello $userName </span>");
		?>			
			</form>		
	</div>
	<div class="menu">
		<ul>
  			<li><a href="?link=1" name="homePage">Home</a></li>
  			<li><a href="?link=2" name="enterWorkout">Enter Workout</a></li>
  			<li><a href="?link=3" name="userGraphs">User Statistics</a></li>
  			<li><a class="active" href="?link=4" name="userData">User Data</a></li>
  			<li><a href="?link=5" name="friendsData">Friends Data</a></li>
  			<li><a href="?link=6" name="rawData">Show Raw Data</a></li>
		</ul>
	</div>

	<div class="mainContent"> 
  		<h2 id="homeHeading">User Data</h2>
  		<br>
  		<table class="rawDataDisplay">
		<tr>
			<th>Date</th>
			<th>Activity</th>
			<th>Duration (mins)</th>
			<th>Comments</th>
		</tr>

		<?php
		
		foreach($userResults as $row)
		{
			echo "<tr>";
			echo "<td>$row[workoutDate]</td>";
			echo "<td>$row[activityName]</td>";
			echo "<td>$row[workoutMinutes]</td>";
			echo "<td>$row[workoutComments]</td>";
			echo "</tr>";
		}

		?>

	</table>

	<br>
  		<table class="rawDataDisplay">
		<tr>
			<th>Activity</th>
			<th>Life Time Duration (mins)</th>
		</tr>

		<?php
		
		foreach($allTimeResults as $row)
		{
			echo "<tr>";			
			echo "<td>$row[activityName]</td>";
			echo "<td>$row[minutes]</td>";
			echo "</tr>";
		}

		?>

	</table>

	</div>
</body>

</html>