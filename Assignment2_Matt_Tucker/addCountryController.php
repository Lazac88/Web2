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

	if (isset($_POST['addCountry']))			//If the add country button has been clicked
	{
		if($_POST['countryName'] != "" && $_POST['countryImageName'] != "" && $_POST['population'] != "")
		{
			$insertQuery = "INSERT INTO countryTableRio(countryName, countryFlagImage, countryPopulation) VALUES(:cName, :cImageName, :cPopulation)";

			$preparedStatement = $pdo->prepare($insertQuery);

			$preparedStatement->bindParam(":cName", $cName);
			$preparedStatement->bindParam(":cImageName", $cImageName);
			$preparedStatement->bindParam(":cPopulation", $cPopulation);

			$cName = $_POST['countryName'];
			$cName = clean_data($cName);
			$cImageName = $_POST['countryImageName'];
			$cImageName = clean_data($cImageName);
			$cPopulation = $_POST['population'];

			
			$preparedStatement->execute();
			$success = $cName;
			include 'Success.html.php';
		}
		else
		{
			include 'RioAddCountry.html.php';

		}
	}
	else
	{
		include 'RioAddCountry.html.php';
	}
?>