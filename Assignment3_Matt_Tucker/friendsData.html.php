<!DOCTYPE html>
<html lang = "en">
<head>
	<title>User Statistics</title>
	<link rel="stylesheet" type="text/css" href="StyleSheet.css" /> 
	<meta charset="UTF-8">
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
          data.addColumn('string', 'Friend');
          data.addColumn('number', 'Total Exercise Minutes');

          <?php
              //$friendTotals = findFriendTotals($pdo);
              foreach($friendTotals as $row)
              {

                //if statement required because friends data graph breaks if a user has not entered any workouts
                if($row[1] != NULL)
                {
                  echo " data.addRow([ '{$row[0]}', {$row[1]} ]); ";
                }
                
              }
          ?>
          // Set chart options
          var options = {'title':'Total Friends Exercise',
                          hAxis: {
                                title: 'Friends',
                                }, 
                          vAxis: {
                                title: 'LifeTime total of Exercise Minutes'
                                },
                         'width':1000,
                         'height':400};

          var barChart = new google.visualization.ColumnChart(document.getElementById('barChart_div'));
          barChart.draw(data, options);
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
  			<li><a class="active" href="?link=5" name="friendsData">Friends Data</a></li>
  			<li><a href="?link=6" name="rawData">Show Raw Data</a></li>
		</ul>
	</div>

	<div class="mainContent"> 
  		<h2 id="homeHeading">User Statistics</h2>
        
        <div id="barChart_div"></div>
	</div>
</body>

</html>