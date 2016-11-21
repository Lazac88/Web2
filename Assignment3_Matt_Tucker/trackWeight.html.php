<!--
	Name: Matt Tucker
	Date: 16th November 2016
	Assignment 3
-->

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Track Weight</title>
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

<!--Line Graph Preparation-->
<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!--<script src="PieChartWeek.js"></script>-->
    <!--<script src="BarChart.js"></script>-->
    <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.

          function drawChart() {

          // Create the data table.
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Date');
          data.addColumn('number', 'Weight');
          data.addColumn('number', 'BMI');

          <?php
              //$friendTotals = findFriendTotals($pdo);
              foreach($BMIResults as $row)
              {

                //if statement required because friends data graph breaks if a user has not entered any workouts
                if($row[1] != NULL)
                {
                  echo " data.addRow([ '{$row[0]}', {$row[1]}, {$row[2]} ]); ";
                }
                
              }
          ?>
          // Set chart options
          var options = {'title':'Weight and BMI Results',
                          hAxis: {
                                title: 'Date',
                                }, 
                          vAxis: {
                                title: 'Weight/BMI'
                                },
                          series: {
          					1: {curveType: 'function'}
       							},
                         'width':1000,
                         'height':400};

          var lineChart = new google.visualization.LineChart(document.getElementById('lineChart_div'));
          lineChart.draw(data, options);
        }

        
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
  			<li><a href="?link=2" name="enterWorkout">Enter Workout</a></li>
  			<li><a href="?link=3" name="userGraphs">User Statistics</a></li>
  			<li><a href="?link=4" name="userData">User Data</a></li>
  			<li><a class="active" href="?link=5" name="trackWeight">Track Weight</a></li>
  			<li><a href="?link=6" name="friendsData">Friends Data</a></li>
  			<li><a href="?link=7" name="rawData">Show Raw Data</a></li>
		</ul>
	</div>

	<div class="mainContent">
		<div class="weightEntryCenter">
  			<h2 id="weightHeading">Track Weight</h2>
  			<?php
				$self = htmlentities($_SERVER['PHP_SELF']);
				echo "<form action= $self method='POST'>"
			?>
	  			<label>Enter Weight (kg): </label>
	  			<input type="number"  name="weight" min="40" max="240">
	  			<br><br>	
				<!--Date weight was taken-->
				<label>Date:</label><input type="text" name="datepicker" id="datepicker">
				<br><br><br>
				
				<br><br>
	 			<input id="submitWorkoutBtn" type="submit" name="submitWeightBtn" value="Submit Weight">
			</form>	

			<br><br><br>
			<div id="lineChart_div"></div>

  		</div>
	</div>
</body>

</html>