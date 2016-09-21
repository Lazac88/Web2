<?php
	/*
	Name: Matt Tucker
	Date: 3rd September 2016
	Assignment 2
	*/

	include 'connect.inc.php';
	include 'functions.php';
	
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

	if (isset($_POST['issueMedal']))			//If the add country button has been clicked
	{
		$athleteID = $_POST['athleteID'];
		$eventID = $_POST['eventID'];
		$medalID = $_POST['medalID'];

		$insertQuery = "INSERT INTO athleteEventTableRio(athleteID, eventID, medalID) VALUES('$athleteID', '$eventID', '$medalID')";
		$pdo->exec($insertQuery) or die($pdo->errorInfo());

		$query = "SELECT athleteID, firstName, lastName FROM athleteTableRio";
		$allAthletes = $pdo->query($query);

		$query = "SELECT eventID, sport FROM eventTableRio";
		$allEvents = $pdo->query($query);

		$query = "SELECT medalID, medalName FROM medalTableRio";
		$allMedals = $pdo->query($query);
		include 'issueMedalSuccess.html.php';
	}
	else
	{
		$query = "SELECT athleteID, firstName, lastName FROM athleteTableRio";
		$allAthletes = $pdo->query($query);

		$query = "SELECT eventID, sport, event FROM eventTableRio";
		$allEvents = $pdo->query($query);

		$query = "SELECT medalID, medalName FROM medalTableRio";
		$allMedals = $pdo->query($query);
		include 'RioIssueMedal.html.php';
	}
?>