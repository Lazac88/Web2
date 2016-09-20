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
		$cName = $_POST['countryName'];
		$cName = stripInput($cName);
		$cImageName = $_POST['countryImageName'];
		$cImageName = stripInput($cImageName);
		$cPopulation = $_POST['population'];

		$insertQuery = "INSERT INTO countryTableRio(countryName, countryFlagImage, countryPopulation) VALUES('\"$cName\"', '$cImageName', '$cPopulation')";
		$pdo->exec($insertQuery);
		include 'RioAddCountry.html.php';
		$success = $cName;
		include 'Success.html.php';
	}
	else
	{
		include 'RioAddCountry.html.php';
	}
?>