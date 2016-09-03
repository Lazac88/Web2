<?php

	/*
	Name: Matt Tucker
	Date: 5th September 2016
	Assignment 
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
		$dropQuery = "DROP TABLE IF EXISTS athleteTable";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS eventTable";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS medalTable";
		$pdo->exec($dropQuery);
		$dropQuery = "DROP TABLE IF EXISTS countryTable";
		$pdo->exec($dropQuery);

	}
	catch(PDOException $e)
	{
		$error = 'Deleting Tables Failed';
		include 'error.html.php';
		exit();
	}

	//Create the counrty table in the database
	try
	{
		$createQuery = "CREATE TABLE countryTable
						(
							countryID INT(6) NOT NULL AUTO_INCREMENT,
							countryName VARCHAR(20) NOT NULL,
							countryFlagImage VARCHAR(20) NOT NULL,
							countryPopulation INT(20),

							PRIMARY KEY(countryID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the country table failed';
		include 'error.html.php';
		exit();
	}

	//Create the athlete table in the database
	try
	{
		$createQuery = "CREATE TABLE athleteInfo
						(
							athleteID INT(6) NOT NULL AUTO_INCREMENT,
							lastName VARCHAR(20) NOT NULL,
							firstName VARCHAR(20) NOT NULL,
							gender VARCHAR(6) NOT NULL,
							athleteImage VARCHAR(20),
							countryID INT(6) NOT NULL,						

							PRIMARY KEY(athleteID),
							FOREIGN KEY (countryID) REFERENCES countryTable(countryID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the athlete table failed';
		include 'error.html.php';
		exit();
	}

	//Create the Event table in the database
	try
	{

		$createQuery = "CREATE TABLE eventTable
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
		$error = 'Creating the event table failed';
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
		$error = 'Creating the medal table failed';
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
							FOREIGN KEY (athleteID) REFERENCES athleteTable(athleteID),
							FOREIGN KEY (eventID) REFERENCES eventTable(eventID),
							FOREIGN KEY (medalID) REFERENCES medalTable(medalID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the athleteEvent table failed';
		include 'error.html.php';
		exit();
	}
?>

