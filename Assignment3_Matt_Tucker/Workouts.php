<?php
	/*
	Name: Matt Tucker
	Date: 20th October
	*/

	include 'functions.php';
	include 'connect.inc.php';
	include 'connectToServer.php';

	$userID = $_SESSION['userID'];
	$selectString = "SELECT * FROM tblActivity
					 LEFT JOIN tblWorkout ON tblActivity.activityID = tblWorkout.activityID
					 WHERE userID = '$userID'";
	$result = $pdo->query($selectString);
	$events = array();
	foreach($result as $row)
	{
		$eventArray['title'] = $row['activityName'];
		$eventArray['start'] = $row['workoutDate'];
		$eventArray['color'] = $row['activityColour'];

		$events[] = $eventArray;
	}

	echo json_encode($events);


?>