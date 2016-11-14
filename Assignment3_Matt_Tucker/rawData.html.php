<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Raw Data</title>
	
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
  			<li><a href="?link=4" name="userData">User Data</a></li>
  			<li><a href="?link=5" name="friendsData">Friends Data</a></li>
  			<li><a class="active" href="?link=6" name="rawData">Show Raw Data</a></li>
		</ul>
	</div>

	<div class="mainContent"> 
  		<h2 id="homeHeading">Raw Data</h2>
  		<!--User Table Raw Data-->
  		<h2>User Table Raw Data</h2>
  		<table class="rawDataDisplay">
		<tr>
			<th>userID</th>
			<th>First Name</th>
			<th>LastName</th>
			<th>Email</th>
			<th>Height</th>
			<th>Hashed Password</th>
		</tr>
		<?php		
			foreach($userResult as $row)
			{
				echo "<tr>";
				echo "<td>$row[userID]</td>";
				echo "<td>$row[firstName]</td>";
				echo "<td>$row[lastName]</td>";
				echo "<td>$row[email]</td>";
				echo "<td>$row[height]</td>";
				echo "<td>$row[userPassword]</td>";
				echo "</tr>";
			}
		?>
	</table>
	<br>
	<br>
	<h2>Activity Table Raw Data</h2>
	<!--Activity Table Raw Data-->
  		<table class="rawDataDisplay">
		<tr>
			<th>ActivityID</th>
			<th>Activity Name</th>
			<th>Activity Colour</th>
		</tr>
		<?php		
			foreach($activityResult as $row)
			{
				echo "<tr>";
				echo "<td>$row[activityID]</td>";
				echo "<td>$row[activityName]</td>";
				echo "<td>$row[activityColour]</td>";
				echo "</tr>";
			}
		?>
	</table>
	<br>
	<br>
	<h2>Workout Table Raw Data</h2>
	<!--Workout Table Raw Data-->
  		<table class="rawDataDisplay">
		<tr>
			<th>workoutID</th>
			<th>userID</th>
			<th>activityID</th>
			<th>Workout Date</th>
			<th>Workout Minutes</th>
			<th>Workout Comments</th>
		</tr>
		<?php		
			foreach($workoutResult as $row)
			{
				echo "<tr>";
				echo "<td>$row[workoutID]</td>";
				echo "<td>$row[userID]</td>";
				echo "<td>$row[activityID]</td>";			
				echo "<td>$row[workoutDate]</td>";
				echo "<td>$row[workoutMinutes]</td>";
				echo "<td>$row[workoutComments]</td>";
				echo "</tr>";
			}
		?>
	</table>
	<br>
	<br>
	<h2>BMI Table Raw Data</h2>
	<!--BMI Table Raw Data-->
  		<table class="rawDataDisplay">
		<tr>
			<th>bmiID</th>
			<th>userID</th>			
			<th>bmiDate</th>
			<th>Weight</th>
		</tr>
		<?php		
			foreach($BMIResult as $row)
			{
				echo "<tr>";
				echo "<td>$row[bmiID]</td>";
				echo "<td>$row[userID]</td>";			
				echo "<td>$row[bmiDate]</td>";
				echo "<td>$row[weight]</td>";
				echo "</tr>";
			}
		?>
	</table>
	<br>
	<br>


	</div>
</body>

</html>