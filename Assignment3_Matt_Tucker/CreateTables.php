<?php

	/*
	Name: Matt Tucker
	Date: 20th October
	*/

	include 'connect.inc.php';
	include 'connectToServer.php';
	include 'functions.php';

	//Delete Tables
	try
	{
		$dropQuery = "DROP TABLE IF EXISTS tblBMI";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS tblWorkout";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS tblActivity";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS tblUser";
		$pdo->exec($dropQuery);
		

	}
	catch(PDOException $e)
	{
		$error = 'Deleting Tables Failed';
		include 'error.html.php';
		exit();
	}

	//Create the user table in the database
	try
	{
		$createQuery = "CREATE TABLE tblUser
						(
							userID INT(6) NOT NULL AUTO_INCREMENT,
							firstName VARCHAR(20) NOT NULL,
							lastName VARCHAR(20) NOT NULL,
							email VARCHAR(40) NOT NULL UNIQUE,
							height INT(3) NOT NULL,
							userPassword VARCHAR(200) NOT NULL,							

							PRIMARY KEY(userID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the user table failed';
		include 'error.html.php';
		exit();
	}

	//Create the activity table in the database
	try
	{
		$createQuery = "CREATE TABLE tblActivity
						(
							activityID INT(6) NOT NULL AUTO_INCREMENT,
							activityName VARCHAR(20) NOT NULL,
							activityColour VARCHAR(20) NOT NULL,

							PRIMARY KEY(activityID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the activity table failed';
		include 'error.html.php';
		exit();
	}

	//Create the workout table in the database
	try
	{
		$createQuery = "CREATE TABLE tblWorkout
						(
							workoutID INT(6) NOT NULL AUTO_INCREMENT,
							userID INT(6) NOT NULL,
							activityID INT(6) NOT NULL,
							workoutDate DATE NOT NULL,							
							workoutMinutes INT(6) NOT NULL,
							workoutComments VARCHAR(200) NOT NULL,
										

							PRIMARY KEY(workoutID),
							FOREIGN KEY (userID) REFERENCES tblUser(userID),
							FOREIGN KEY (activityID) REFERENCES tblActivity(activityID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the workout table failed';
		include 'error.html.php';
		exit();
	}

	//Create the workout table in the database
	try
	{
		$createQuery = "CREATE TABLE tblBMI
						(
							bmiID INT(6) NOT NULL AUTO_INCREMENT,
							userID INT(6) NOT NULL,
							bmiDate DATE NOT NULL,							
							weight INT(6) NOT NULL,
										

							PRIMARY KEY(bmiID),
							FOREIGN KEY (userID) REFERENCES tblUser(userID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the BMI table failed';
		include 'error.html.php';
		exit();
	}

	//Hard Coded Dale as user (using dale as email so she can log in using dale)
	//Insert User Data
	try
	{
		doInsert("Dale", "Parsons", "dale", "159", "test", $pdo);
	}
	catch(Exception $e)
	{
		$error = "Inserting users failed";
		include 'error.html.php';
	}


	//Insert Activity Data
	/*
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
	*/
?>