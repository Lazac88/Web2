<!DOCTYPE html>
<html lang = "en">
<head>
	<title>CalendarDisplay</title>
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
				events: "events.php"
			})
		});
</script>

<style type='text/css'>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 600px;
		margin: 0 auto;
		}

</style>

		<meta charset="UTF-8">
</head>
<body>
<div id='calendar'></div>
<?php
	include 'events.php';
?>
</body>

</html>