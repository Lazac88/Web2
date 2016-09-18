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

	if (isset($_POST['findAthlete']))			//If the search athlete button has been clicked
	{		
		$fName= $_POST['FirstName'];
		$lName = $_POST['LastName'];

		$sportChoice = $_POST['sport'];
		if($sportChoice == 'All Sports')
		{
			$sportChoice = '%';
		}

		$countryChoice = $_POST['country'];		
		if($countryChoice == 'All Countries')
		{
			$countryChoice = '%';
		}

		$medalChoice = $_POST['medal'];		
		if($medalChoice == 'All Medals')
		{
			$medalChoice = '%';
		}
				


		$query = "SELECT athleteTableRio.athleteID, athleteImage, firstName, lastName, sport, event, medalName, countryName, countryFlagImage
				  FROM athleteTableRio LEFT JOIN athleteEventTableRio
				  ON athleteTableRio.athleteID = athleteEventTableRio.athleteID
				  LEFT JOIN countryTableRio
				  ON  athleteTableRio.countryID = countryTableRio.countryID
				  LEFT JOIN eventTableRio
				  ON athleteEventTableRio.eventID = eventTableRio.eventID
				  LEFT JOIN medalTableRio
				  ON athleteEventTableRio.medalID = medalTableRio.medalID ";

		
		if(sizeof($_POST) > 1)
		{
			$query .= "WHERE athleteTableRio.athleteID >= '0' ";

			if(!empty( $_POST['FirstName']))
			{
	 			$query .= "AND firstName LIKE \"$fName\" ";
	 		}
 			if(!empty( $_POST['LastName']))
			{
	 			$query .= "AND lastName LIKE \"$lName\" ";
	 		}
	 		if(!empty( $_POST['sport']))
			{
	 			$query .= "AND sport LIKE \"$sportChoice\" ";
	 		}
	 		if(!empty( $_POST['country']))
			{
	 			$query .= "AND countryName LIKE \"$countryChoice\" ";
	 		}
	 		if(!empty( $_POST['medal']))
			{
	 			$query .= "AND medalName LIKE \"$medalChoice\" ";
	 		}
		}		
		$query .="ORDER BY lastName, firstName";
 		//echo $query;


		$athleteResult = $pdo->query($query);

		//Query to populate search function
		$query = "SELECT DISTINCT sport FROM eventTableRio";
		$allSports = $pdo->query($query);

		$query = "SELECT DISTINCT countryName FROM countryTableRio";
		$allCountries = $pdo->query($query);

		$query = "SELECT DISTINCT medalName FROM medalTableRio";
		$allMedals = $pdo->query($query);

		include 'RioAthleteOutput.html.php';
	}

	//If delete athlete button clicked
	else if (isset($_POST['deleteAthlete']))
	{
		$toDelete = $_POST['deleteList'];

		foreach ($toDelete as $delete)
		{
			$query = "DELETE FROM athleteEventTableRio	WHERE athleteID = $delete";
			$pdo->query($query);
			$query = "DELETE FROM athleteTableRio	WHERE athleteID = $delete";
			$pdo->query($query);
		}

		$query = "SELECT DISTINCT sport FROM eventTableRio";
		$allSports = $pdo->query($query);

		$query = "SELECT DISTINCT countryName FROM countryTableRio";
		$allCountries = $pdo->query($query);

		$query = "SELECT DISTINCT medalName FROM medalTableRio";
		$allMedals = $pdo->query($query);
		include 'RioSearchAthlete.html.php';
	}

	//if the search screen is loaded for the first time
	else 		
	{
		$query = "SELECT DISTINCT sport FROM eventTableRio";
		$allSports = $pdo->query($query);

		$query = "SELECT DISTINCT countryName FROM countryTableRio";
		$allCountries = $pdo->query($query);

		$query = "SELECT DISTINCT medalName FROM medalTableRio";
		$allMedals = $pdo->query($query);

		include 'RioSearchAthlete.html.php';
	}