<?php
	/*
	Name: Matt Tucker
	Date: 3rd September 2016
	Assignment 2
	*/

	//include 'createTables.php';
	//include 'insertTableData.php'; 

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

	if (isset($_POST['findCountry']))			//If the search country button has been clicked
	{
		$query = "SELECT countryName, countryFlagImage, countryPopulation FROM countryTableRio";
		$countryDisplay = $pdo->query($query);
		include 'RioCountryOutput.html.php';

		$query = "SELECT DISTINCT countryName FROM countryTableRio";
		$allCountries = $pdo->query($query);
	}

	//if the search screen is loaded for the first time
	else 		
	{
		$query = "SELECT DISTINCT countryName FROM countryTableRio";
		$allCountries = $pdo->query($query);

		include 'RioSearchCountry.html.php';
	}
?>