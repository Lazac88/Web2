<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Workout Home</title>
	<link rel="stylesheet" href="fullcalendar.css" /> 
	

</script>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css" /> 
	<meta charset="UTF-8">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
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
		<div class="workoutEntryCenter">
  			<h2 id="workoutHeading">Enter Workout</h2>
  			<?php
				$self = htmlentities($_SERVER['PHP_SELF']);
				echo "<form action= $self method='POST'>"
			?>
	  			<label>Choose Activity</label>
	  			<br><br>
	  			<select class="" name="activityResult">
					<?php
						foreach ($activityResult as $row) 
						{				
							echo "<option value=\"$row[activityID]\">$row[activityName]</option>";
						}
					?>
				</select>
				<br><br>
				<a href="?link=7" id="addActivity" name="addActivity">+Add Activity</a><br>
				<label>Duration in minutes (maximum 240):</label>
				<input type="number"  name="workoutDuration" min="1" max="240">
				<br><br>
				<label>Date:</label><input type="text" name="datepicker" id="datepicker">
				<br><br><br>
				<label>Comments:</label>
				<textarea name="workoutComment" rows="6" cols="50">
						
				</textarea>
				<br><br>
	 			<input id="submitWorkoutBtn" type="submit" name="submitWorkoutBtn" value="Submit Workout">
			</form>	



  		</div>
	</div>
</body>

</html>