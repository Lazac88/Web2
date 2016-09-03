<?php

	/*
	Name: Matt Tucker
	Date: 1st September 2016
	Assignment 1
	*/

	include 'connect.inc.php';
	
	//Connect to mySQL server
	try
	{
		$pdo = new PDO("mysql:host=$host;dbname=$database", $userMS, $passwordMS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');
	}
	catch(PDOException $e)
	{
		$error = 'Connection to database failed';
		include 'error.html.php';
		exit();
	}

	//Delete Tables
	try
	{
		$dropQuery = "DROP TABLE IF EXISTS athleteEventTable";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS athleteInfo";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS eventInfo";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS medalTable";
		$pdo->exec($dropQuery);

	}
	catch(PDOException $e)
	{
		$error = 'Deleting Tables Failed';
		include 'error.html.php';
		exit();
	}

	//Create the athlete table in the database
	try
	{
		createAthleteTable($pdo);					//Here is my practise function	
	}
	catch(PDOException $e)
	{
		$error = 'Creating the table failed';
		include 'error.html.php';
		exit();
	}

	//Create the Event table in the database
	try
	{

		$createQuery = "CREATE TABLE eventInfo
						(
							eventID INT(6) NOT NULL AUTO_INCREMENT,
							sport VARCHAR(20) NOT NULL,
							event VARCHAR(20) NOT NULL,													

							PRIMARY KEY(eventID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the table failed';
		include 'error.html.php';
		exit();
	}

	//Create the medal table in the database
	try
	{
		$createQuery = "CREATE TABLE medalTable
						(
							medalID INT(6) NOT NULL AUTO_INCREMENT,
							medalName VARCHAR(20) NOT NULL,
							
							PRIMARY KEY(medalID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the table failed';
		include 'error.html.php';
		exit();
	}

	//Create the AthleteEvent table in the database
	try
	{
		$createQuery = "CREATE TABLE athleteEventTable
						(
							athleteID INT(6) NOT NULL,
							eventID INT(6) NOT NULL,
							medalID INT(6) NOT NULL,							

							PRIMARY KEY(athleteID, eventID, medalID),
							FOREIGN KEY (athleteID) REFERENCES athleteInfo(athleteID),
							FOREIGN KEY (eventID) REFERENCES eventInfo(eventID),
							FOREIGN KEY (medalID) REFERENCES medalTable(medalID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the table failed';
		include 'error.html.php';
		exit();
	}

	//Insert Athlete Data
	try
	{
		$file = fopen("athletesList.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			//Used for testing purposes below

  			//echo $temp[0];
  			//echo $temp[1];
  			//echo $temp[2];
  			//echo $temp[3];
  			$insertQuery = "INSERT INTO athleteInfo(lastName, firstName, gender, athleteImage) VALUES('$temp[0]', '$temp[1]', '$temp[2]', '$temp[3]')";
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}

	//Insert Medal Data
	try
	{
		$file = fopen("medalsList.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);
  			
  			$insertQuery = "INSERT INTO medalTable(medalName) VALUES('$temp[0]')";
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}

	//Insert Sports and Events Data
	try
	{
		$file = fopen("sportsEventsList.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			$insertQuery = "INSERT INTO eventInfo(sport, event) VALUES('$temp[0]', '$temp[1]')";
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}

	//Insert Data into conjoined table
	try
	{
		$file = fopen("athleteEventMedal.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			$insertQuery = "INSERT INTO athleteEventTable(athleteID, eventID, medalID) VALUES('$temp[0]', '$temp[1]', '$temp[2]')";
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}

	function createAthleteTable($pdo)					//Practise function
	{
		$createQuery = "CREATE TABLE athleteInfo
						(
							athleteID INT(6) NOT NULL AUTO_INCREMENT,
							lastName VARCHAR(20) NOT NULL,
							firstName VARCHAR(20) NOT NULL,
							gender VARCHAR(6) NOT NULL,
							athleteImage VARCHAR(20),							

							PRIMARY KEY(athleteID)

						)";
		$pdo->exec($createQuery);
	}
?>