<!--
	Matt Tucker
	Assignment 3
	Date 16/11/16
-->
<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Workout Home</title>
	<link rel="stylesheet" href="fullcalendar.css" /> 
	<script src='lib/jquery.min.js'></script>
	<script src='lib/moment.min.js'></script>
	<script src='fullcalendar.js'></script>
	<script type='text/javascript'>
	$(document).ready(function() 
		{

			// page is now ready, initialize the calendar...

			$('#calendar').fullCalendar({
				// put your options and callbacks here
				editable: false,
				events: "Workouts.php"
			})
		});
</script>


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
  			<li><a class="active" href="?link=1" name="homePage">Home</a></li>
  			<li><a href="?link=2" name="enterWorkout">Enter Workout</a></li>
  			<li><a href="?link=3" name="userGraphs">User Statistics</a></li>
  			<li><a href="?link=4" name="userData">User Data</a></li>
  			<li><a href="?link=5" name="trackWeight">Track Weight</a></li>
  			<li><a href="?link=6" name="friendsData">Friends Data</a></li>
  			<li><a href="?link=7" name="rawData">Show Raw Data</a></li>
		</ul>
	</div>

	<div class="mainContent"> 
  		<h2 id="homeHeading">Workout Calendar</h2>
  		<div id='calendar'></div>
	</div>
</body>

</html>