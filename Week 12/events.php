<?php
	/*
	Name: Matt Tucker
	Date: 20th October
	*/

	include 'functions.php';
	include 'connect.inc.php';
	include 'connectToServer.php';

	//$selectString = "SELECT * FROM tblActivity2 WHERE userID = 1";
	$selectString = "SELECT * FROM tblActivity
					 LEFT JOIN tblWorkout ON tblActivity.activityID = tblWorkout.activityID
					 WHERE userID = 1";
	$result = $pdo->query($selectString);
	$events = array();
	$color = "green";
	foreach($result as $row)
	{
		$eventArray['title'] = $row['activityName'];
		//$eventArray['start'] = $row['activityDate'];
		$eventArray['start'] = $row['workoutDate'];

		//Switch here to give each activityName a different colour
		switch ($row['activityName']) 
		{
		    case "Running":
		        $color = "yellow";
		        break;
		    case "Swimming":
		        $color = "red";
		        break;
		    case "Gym":
		        $color = "green";
		        break;
		}
		//temp colour
		//$eventArray['color'] = $color;
		$eventArray['color'] = $row['activityColour'];
		$events[] = $eventArray;
	}

	echo json_encode($events);


?>