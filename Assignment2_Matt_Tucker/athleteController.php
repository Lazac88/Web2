<?php
	/*
	Name: Matt Tucker
	Date: 3rd September 2016
	Assignment 2
	*/

	if (isset($_POST['chooseSport']))			//If a sport has been selected do below...
	{
		$fName = $_POST['FirstName'];
		$lName = $_POST['LastName'];
		$sportChoice = $_POST['sport'];
		$countryChoice = $_POST['country'];
		$medalChoice = $_POST['medal'];


		$query = "SELECT athleteImage, firstName, lastName, sport, event, medalName
				  FROM athleteTable LEFT JOIN athleteEventTable
				  ON athleteTable.athleteID = athleteEventTable.athleteID
				  LEFT JOIN countryTable
				  ON  athleteTable.countryID = countryTable.countryID
				  LEFT JOIN eventTable
				  ON athleteEventTable.eventID = eventTable.eventID
				  LEFT JOIN medalTable
				  ON athleteEventTable.medalID = medalTable.medalID ";

		$query .= "WHERE "								//Need help here. What do I put as my first WHERE

		if(!empty( $_POST['FirstName']))
		{
 			$query .= "AND firstName = ".$fName." ";
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

 		$query .="ORDER BY lastName, firstName";

		$athleteResult = $pdo->query($query);	  
	}