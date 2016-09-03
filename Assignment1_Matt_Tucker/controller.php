<?php
	/*
	Name: Matt Tucker
	Date: 1st September 2016
	Assignment 1
	*/

	include 'createAthletes.php';
	if (isset($_POST['chooseSport']))			//If a sport has been selected do below...
	{
		//Select Query
		$choice = $_POST['sport'];
		if ($choice == "All Sports")			//If All Sports has been selected, do the below select
		{
			try
			{
			$selectString = "SELECT athleteImage, firstName, lastName, sport, event, medalName
						 	FROM athleteInfo LEFT JOIN athleteEventTable
							ON athleteInfo.athleteID = athleteEventTable.athleteID
						 	LEFT JOIN eventInfo
						 	ON athleteEventTable.eventID = eventInfo.eventID
						 	LEFT JOIN medalTable
						 	ON athleteEventTable.medalID = medalTable.medalID
						 	ORDER BY lastName, firstName";						 	

			$result = $pdo->query($selectString);		
			}
			catch(PDOException $e)
			{
				$error = 'Select Statement Error';
				include 'error.html.php';
				exit();
			}
		}
		else 								//If a single sport has been selected do the below select
		{
			try
			{
				$selectString = "SELECT athleteImage, firstName, lastName, sport, event, medalName
						 		FROM athleteInfo LEFT JOIN athleteEventTable
						 		ON athleteInfo.athleteID = athleteEventTable.athleteID
						 		LEFT JOIN eventInfo
						 		ON athleteEventTable.eventID = eventInfo.eventID
						 		LEFT JOIN medalTable
						 		ON athleteEventTable.medalID = medalTable.medalID
						 		WHERE sport = \"$choice\"
						 		ORDER BY lastName, firstName";

				$result = $pdo->query($selectString);
		
			}
			catch(PDOException $e)
			{
				$error = 'Select Statement Error';
				include 'error.html.php';
				exit();
			}
		}

		include 'output.html.php';

	}
	


	else 			//If the choose sport button has not been pressed, display the home screen
	{
		try
		{
			$selectString = "SELECT DISTINCT sport FROM eventInfo ORDER BY sport";

			$allSports = $pdo->query($selectString);
		
		}
		catch(PDOException $e)
		{
			$error = 'Select Statement Error';
			include 'error.html.php';
			exit();
		}
		include 'olympicForm.html.php';
	}
?>