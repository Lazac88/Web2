<!--
	Matt Tucker
	Assignment 3
	16th November 2016
-->
<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Workout Home</title>
	<link rel="stylesheet" href="fullcalendar.css" /> 
	

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
  			<li><a href="?link=1" name="homePage">Home</a></li>
  			<li><a class="active" href="?link=2" name="enterWorkout">Enter Workout</a></li>
  			<li><a href="?link=3" name="userGraphs">User Statistics</a></li>
  			<li><a href="?link=4" name="userData">User Data</a></li>
  			<li><a href="?link=5" name="friendsData">Friends Data</a></li>
  			<li><a href="?link=6" name="rawData">Show Raw Data</a></li>
		</ul>
	</div>

	<div class="mainContent">
		<div class="activityEntryCenter">
			<?php
				$self = htmlentities($_SERVER['PHP_SELF']);
				echo "<form action= $self method='POST'>"
			?>
			<h2 id="activityEntry">New Activity</h2>
			<?php 
				
				echo ("	<label>New Activity:</label> <input type='text' name='activityName' value=''/> <span class='error'>* $actNameErr</span> <br> "); //Provides feedback if activity already exists
			?>
  			<label>Activity Colour:</label>
  			<input type="color" id="html5colorpicker" name="colourName" onchange="clickColor(0, -1, -1, 5)" value="#ff0000" style="width:169px;">	<!--Simplr colour picker-->
  			<br><br><br>  			
  			<input id="submitActivityBtn" type="submit" name="submitActivityButton" value="Submit">
  			</form>
  			<?php
				$self = htmlentities($_SERVER['PHP_SELF']);
				echo "<form action= $self method='POST'>"
			?>
			<input id="backActivityBtn" type="submit" name="backActivityBtn" value="Back">
			</form>
  		</div>
	</div>
</body>

</html>