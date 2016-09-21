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

	if (isset($_POST['addEvent']))			//If the add country button has been clicked
	{
		if($_POST['eventName'] != "" && $_POST['sportName'] != "")
		{
			$eName = $_POST['eventName'];
			$eName = clean_data($eName);
			$sName = $_POST['sportName'];
			$sName = clean_data($sName);

			$insertQuery = "INSERT INTO eventTableRio(sport, event) VALUES('$sName', '$eName')";
			$pdo->exec($insertQuery);
			$success = $eName;
			include 'EventSuccess.html.php';
		}
		else
		{
			include 'RioAddEvent.html.php';
		}
		
	}
	else
	{
		include 'RioAddEvent.html.php';
	}
?>