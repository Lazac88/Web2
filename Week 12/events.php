<?php
	/*
	Name: Matt Tucker
	Date: 20th October
	*/

	include 'functions.php';
	include 'connect.inc.php';
	include 'connectToServer.php';

	$selectString = "SELECT * FROM tblActivity WHERE userID = 1";
	$result = $pdo->query($selectString);
	$events = array();
	$color = "green";
	foreach($result as $row)
	{
		$eventArray['title'] = $row['activityName'];
		$eventArray['start'] = $row['activityDate'];

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
		$eventArray['color'] = $color;
		$events[] = $eventArray;
	}

	echo json_encode($events);


?>