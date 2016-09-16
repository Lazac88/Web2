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


if (isset($_POST['chooseDate']))
{
	include 'DatePickerTest.html.php';
	
	$timeStamp = strtotime($_POST['datepicker']);
	
	$formattedDate = date('Y-m-d', $timeStamp);
	echo $formattedDate;
	//Insert eventTable Data
	try
	{
		$insertQuery = "INSERT INTO dateLog(logDate) VALUES('$formattedDate')";
		$pdo->exec($insertQuery);
  		
	}
	catch(Exception $e)
	{
		include 'error.html.php';
	}

	//Select all from dateLog Table
	try
		{
			$selectString = "SELECT * FROM dateLog";

			$result = $pdo->query($selectString);
		
		}
		catch(PDOException $e)
		{
			$error = 'Select Statement Error';
			include 'error.html.php';
			exit();
		}

	include 'dateLogTable.html.php';
}
else
{
	include 'DatePickerTest.html.php';	
}

?>