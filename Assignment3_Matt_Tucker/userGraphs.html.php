<!DOCTYPE html>
<html lang = "en">
<head>
	<title>User Statistics</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css" /> 
	<meta charset="UTF-8">
</head>
<body>
	
	<header>
		<?php
			$self = htmlentities($_SERVER['PHP_SELF']);
			echo "<form action= $self method='POST'>";
			$userName = $_SESSION['firstName'];
			echo ("<input id='logoutBtn' type='submit' name='logoutBtn' value='Logout'>");
			echo ("<span id='helloBtn'>Hello $userName </span>");
		?>
			</form>
		<H1>Exercise Tracker</H1>
	</header>

	<div class="menu">
		<ul>
  			<li><a href="?link=1" name="homePage">Home</a></li>
  			<li><a href="?link=2" name="enterWorkout">Enter Workout</a></li>
  			<li><a class="active" href="?link=3" name="userGraphs">User Statistics</a></li>
  			<li><a href="?link=4" name="friendsData">Friends Data</a></li>
  			<li><a href="?link=5" name="rawData">Show Raw Data</a></li>
		</ul>
	</div>

	<div class="mainContent"> 
  		<h2 id="homeHeading">User Statistics</h2>
	</div>
</body>

</html>