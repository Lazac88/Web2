<?php
	/*
	Name: Matt Tucker
	Date: 3rd September 2016
	Assignment 2
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

	if (isset($_POST['addAthlete']))			//If the add athlete button has been clicked
	{
		$fName = $_POST['firstName'];
		$lName = $_POST['lastName'];
		$gender = $_POST['gender'];
		$imageName = $_POST['athleteImage'];
		$cID = $_POST['countryID'];

		$insertQuery = "INSERT INTO athleteTableRio(lastName, firstName, gender, athleteImage, countryID) VALUES('$lName', '$fName', '$gender', '$imageName', '$cID')";
		$pdo->exec($insertQuery);
		$success = $fName;

		$query = "SELECT DISTINCT countryName FROM countryTableRio";
		$allCountries = $pdo->query($query);
		include 'AthleteSuccess.html.php';
	}
	else
	{
		$query = "SELECT DISTINCT countryName, countryID FROM countryTableRio";
		$allCountries = $pdo->query($query);
		include 'RioAddAthlete.html.php';
	}

?>