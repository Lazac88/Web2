<!--
  Matt Tucker
  Assignment 3
  Date 16/11/16
-->
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
      google.charts.setOnLoadCallback(drawPieChart);
      google.charts.setOnLoadCallback(drawMonthBarChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.

        function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'User');
        data.addColumn('number', 'Target');
        <?php
            foreach($workoutResults as $row)
            {
              //print_r($row);
              echo " data.addRow([ '{$row[0]}', {$row[1]}, 30 ]); ";
            }
        ?>
        // Set chart options
        var options = {
                         'width':1000,
                         'height':400,
                          title:'Weekly Exercise',
                          hAxis: {
                                title: 'Date',
                                }, 
                          vAxis: {
                                title: 'Minutes of exercise per day'
                                },
                          seriesType: 'bars',
                          series: {2: {type: 'line'}}                         
                        };

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        //chart.draw(data, options);
        var barChart = new google.visualization.ComboChart(document.getElementById('barChart_div'));
        barChart.draw(data, options);
      }

      function drawPieChart() {

        // Create the data table.
        var pieData = new google.visualization.DataTable();
        pieData.addColumn('string', 'Exercise Types');
        pieData.addColumn('number', 'User');
        <?php

          foreach($activityResults as $row)
          {
            //print_r($row);
            echo " pieData.addRow([ '{$row[0]}', {$row[1]} ]); ";
          }
        ?>
        // Set chart options
        var pieOptions = {'title':'Weekly Activities',
                        hAxis: {
                              title: 'Activities',
                              }, 
                        vAxis: {
                              title: 'Minutes of activity this week'
                              },
                       'width':1000,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var pieChart = new google.visualization.PieChart(document.getElementById('pieChart_div'));
        pieChart.draw(pieData, pieOptions);
        //var barChart = new google.visualization.ColumnChart(document.getElementById('barChart_div'));
        //barChart.draw(data, options);
      }

      function drawMonthBarChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'User');
        <?php
            foreach($workoutResultsMonth as $row)
            {
              //print_r($row);
              echo " data.addRow([ '{$row[0]}', {$row[1]} ]); ";
            }
        ?>
        // Set chart options
        var optionsMonth = {'title':'Monthly Exercise',
                        hAxis: {
                              title: 'Date',
                              }, 
                        vAxis: {
                              title: 'Minutes of exercise per day'
                              },
                       'width':1000,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        //var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        //chart.draw(data, options);
        var barChartMonth = new google.visualization.ColumnChart(document.getElementById('barChartMonth_div'));
        barChartMonth.draw(data, optionsMonth);
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
  			<li><a class="active" href="?link=3" name="userGraphs">User Statistics</a></li>
        <li><a href="?link=4" name="userData">User Data</a></li>
  			<li><a href="?link=5" name="trackWeight">Track Weight</a></li>
        <li><a href="?link=6" name="friendsData">Friends Data</a></li>
        <li><a href="?link=7" name="rawData">Show Raw Data</a></li>
		</ul>
	</div>

	<div class="mainContent"> 
  		<h2 id="homeHeading">User Statistics</h2>
        <div id="pieChart_div"></div>
        <div id="barChart_div"></div>
        <div id="barChartMonth_div"></div>
	</div>
</body>

</html>