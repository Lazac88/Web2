<?php
	
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


	//Insert Country Data
	try
	{
		$file = fopen("csvFiles/countryInfo.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			
  			$insertQuery = "INSERT INTO countryTableRio(countryName, countryFlagImage, countryPopulation) VALUES('$temp[0]', '$temp[1]', '$temp[2]')";
  				
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
		$file = fopen("csvFiles/athleteInfo.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			//Used for testing purposes below

  			//echo $temp[0];
  			//echo $temp[1];
  			//echo $temp[2];
  			//echo $temp[3];
  			//echo $temp[4];
  			$insertQuery = "INSERT INTO athleteTableRio(lastName, firstName, gender, athleteImage, countryID) VALUES('$temp[0]', '$temp[1]', '$temp[2]', '$temp[3]', $temp[4])";
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
		$file = fopen("csvFiles/eventSportInfo.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			$insertQuery = "INSERT INTO eventTableRio(sport, event) VALUES('$temp[0]', '$temp[1]')";
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
		$file = fopen("csvFiles/medalsList.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);
  			
  			$insertQuery = "INSERT INTO medalTableRio(medalName) VALUES('$temp[0]')";
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
		$file = fopen("csvFiles/athleteEventInfo.csv","r");

  		while(! feof($file))
  		{
  			$temp = fgetcsv($file);

  			$insertQuery = "INSERT INTO athleteEventTableRio(athleteID, eventID, medalID) 
  							VALUES('$temp[0]', '$temp[1]', '$temp[2]')";
  							echo $insertQuery;
			$pdo->exec($insertQuery);
  		}
		fclose($file);
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}
?>