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
		<H1>Exercise Tracker</H1>
	</header>

	<div class="menu">
		<ul>
  			<li><a href="?link=1" name="homePage">Home</a></li>
  			<li><a class="active" href="?link=2" name="enterWorkout">Enter Workout</a></li>
  			<li><a href="?link=3" name="userGraphs">Show User Graphs</a></li>
  			<li><a href="?link=4" name="friendsData">Friends Data</a></li>
  			<li><a href="?link=5" name="rawData">Show Raw Data</a></li>
		</ul>
	</div>

	<div class="mainContent">
		<div class="workoutEntryCenter">
  			<h2 id="workoutHeading">Enter Workout</h2>
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
			<a href="?link=6" id="addActivity" name="addActivity">+Add Activity</a>


  		</div>
	</div>
</body>

</html>