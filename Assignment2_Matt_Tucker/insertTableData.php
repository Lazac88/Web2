<?php
	//Insert Country Data
	try
	{
		$file = fopen("countryList.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			
  			$insertQuery = "INSERT INTO countryTable(countryName, countryFlagImage, countryPopulation) 
  							VALUES('$temp[0]', '$temp[1]', '$temp[2]')";
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}

	//Insert athleteTable Data
	try
	{
		$file = fopen("athletesList.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			//Used for testing purposes below

  			//echo $temp[0];
  			//echo $temp[1];
  			//echo $temp[2];
  			//echo $temp[3];
  			//echo $temp[4];
  			$insertQuery = "INSERT INTO athleteInfo(lastName, firstName, gender, athleteImage, countryID) VALUES('$temp[0]', '$temp[1]', '$temp[2]', '$temp[3]', $temp[4])";
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}

	//Insert eventTable Data
	try
	{
		$file = fopen("sportsEventsList.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			$insertQuery = "INSERT INTO eventInfo(sport, event) VALUES('$temp[0]', '$temp[1]')";
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}

	//Insert medalTable Data
	try
	{
		$file = fopen("medalsList.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);
  			
  			$insertQuery = "INSERT INTO medalTable(medalName) VALUES('$temp[0]')";
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}

	//Insert athleteEventTable Data
	try
	{
		$file = fopen("athleteEventMedal.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			$insertQuery = "INSERT INTO athleteEventTable(athleteID, eventID, medalID) 
  							VALUES('$temp[0]', '$temp[1]', '$temp[2]')";
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}
?>