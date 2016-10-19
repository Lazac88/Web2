<?php

	/*
	Name: Matt Tucker
	Date: 20th October
	*/

	include 'functions.php';
	include 'connect.inc.php';
	include 'connectToServer.php';

	//Insert User Data
	try
	{
		doInsert("dale", "test", "dale@op.ac.nz", $pdo);
	}
	catch(Exception $e)
	{
		$error = "Inserting users failed";
		include 'error.html.php';
	}


	//Insert Activity Data
	try
	{
		$insertQuery = "INSERT INTO tblActivity (activityDate, activityName, activityMinutes, userID) VALUES ('2016-10-01', 'Running', '30', '1')";
		$pdo->exec($insertQuery);
		$insertQuery = "INSERT INTO tblActivity (activityDate, activityName, activityMinutes, userID) VALUES ('2016-10-01', 'Swimming', '40', '1')";
		$pdo->exec($insertQuery);
		$insertQuery = "INSERT INTO tblActivity (activityDate, activityName, activityMinutes, userID) VALUES ('2016-10-02', 'Running', '60', '1')";
		$pdo->exec($insertQuery);
		$insertQuery = "INSERT INTO tblActivity (activityDate, activityName, activityMinutes, userID) VALUES ('2016-10-02', 'Swimming', '20', '1')";
		$pdo->exec($insertQuery);
	}
	catch(Exception $e)
	{
		$error = "Inserting activities failed";
		include 'error.html.php';
	}

?>	