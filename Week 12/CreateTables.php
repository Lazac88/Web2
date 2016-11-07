<?php

	/*
	Name: Matt Tucker
	Date: 20th October
	*/

	include 'connect.inc.php';
	include 'connectToServer.php';

	//Delete Tables
	try
	{
		
		$dropQuery = "DROP TABLE IF EXISTS tblActivity2";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS tblUser2";
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
		$createQuery = "CREATE TABLE tblUser2
						(
							userID INT(6) NOT NULL AUTO_INCREMENT,
							userName VARCHAR(20) NOT NULL,
							userPassword VARCHAR(100) NOT NULL,
							userEmail VARCHAR(40) NOT NULL,

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

	//Create the athlete table in the database
	try
	{
		$createQuery = "CREATE TABLE tblActivity2
						(
							activityID INT(6) NOT NULL AUTO_INCREMENT,
							activityDate DATE NOT NULL,
							activityName VARCHAR(20) NOT NULL,							
							activityMinutes INT(6) NOT NULL,
							userID INT(6) NOT NULL,			

							PRIMARY KEY(activityID),
							FOREIGN KEY (userID) REFERENCES tblUser(userID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the athlete table failed';
		include 'error.html.php';
		exit();
	}
?>