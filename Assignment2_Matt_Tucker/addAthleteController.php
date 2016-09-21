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

	if (isset($_POST['addAthlete']))			//If the add athlete button has been clicked
	{
		if($_POST['firstName'] != "" && $_POST['lastName'] != "" && $_POST['gender'] != "" && $_POST['athleteImage'] != "")
		{
			
			$insertQuery = "INSERT INTO athleteTableRio(lastName, firstName, gender, athleteImage, countryID) VALUES(:lName, :fName, :gender, :imageName, :cID)";

			$preparedStatement = $pdo->prepare($insertQuery);

			$preparedStatement->bindParam(":lName", $lName);
			$preparedStatement->bindParam(":fName", $fName);
			$preparedStatement->bindParam(":gender", $gender);
			$preparedStatement->bindParam(":imageName", $imageName);
			$preparedStatement->bindParam(":cID", $cID);



			$fName = $_POST['firstName'];
			$fName = clean_data($fName);
			$lName = $_POST['lastName'];
			$lName = clean_data($lName);
			$gender = $_POST['gender'];
			$imageName = $_POST['athleteImage'];
			$imageName = clean_data($imageName);
			$cID = $_POST['countryID'];

			
			$preparedStatement->execute();
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
		
	}
	else
	{
		$query = "SELECT DISTINCT countryName, countryID FROM countryTableRio";
		$allCountries = $pdo->query($query);
		include 'RioAddAthlete.html.php';
	}

?>