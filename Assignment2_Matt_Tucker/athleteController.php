<?php
	/*
	Name: Matt Tucker
	Date: 3rd September 2016
	Assignment 2
	*/

	include 'createTables.php';
	include 'insertTableData.php'; 

	if (isset($_POST['findAthlete']))			//If the search athlete button has been clicked
	{
		//Check if firstname has a value, if not make it a wildcard
		if(isset($_POST['FirstName']))
		{
			$fName = $_POST['FirstName'];
		}
		else
		{
			$fName = '%';
		}
		
		$lName = $_POST['LastName'];
		$sportChoice = $_POST['sport'];
		$countryChoice = $_POST['country'];
		$medalChoice = $_POST['medal'];


		$query = "SELECT athleteID, athleteImage, firstName, lastName, sport, event, medalName, countryName, countryFlagImage
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
			$query .= "WHERE ";

			if(!empty( $_POST['FirstName']))
			{
 				$query .= "firstName = ".$fName." ";
 			}
	 		if(!empty( $_POST['LastName']))
			{
	 			$query .= "AND lastName = ".$lName." ";
	 		}
	 		if(!empty( $_POST['LastName']))
			{
	 			$query .= "AND sport = ".$sportChoice." ";
	 		}
	 		if(!empty( $_POST['country']))
			{
	 			$query .= "AND countryName = ".$countryChoice." ";
	 		}
	 		if(!empty( $_POST['medal']))
			{
	 			$query .= "AND medalName = ".$medalChoice." ";
	 		}
		}		

 		$query .="ORDER BY lastName, firstName";

		$athleteResult = $pdo->query($query);

		include 'RioSearchAthlete.html.php';  
	}

	//If delete athlete button clicked
	else if (isset($_POST['deleteAthlete']))
	{
		$toDelete = $_POST['athleteDelete'];

		foreach ($toDelete as $delete)
		{
			$query = "DELETE FROM athleteEventTableRio	WHERE athleteID = $delete";
			$pdo->query($query);
			$query = "DELETE FROM athleteTableRio	WHERE athleteID = $delete";
			$pdo->query($query);
		}
	}

	//if the search screen is loaded for the first time
	else 		
	{
		include 'RioSearchAthlete.html.php';
	}