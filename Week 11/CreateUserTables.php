<?php

	/*
	Name: Matt Tucker
	Date: 11/10/16
	Week 11 - Session Management
	*/

	include 'functions.php';
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

	//Delete Tables
	try
	{
		$dropQuery = "DROP TABLE IF EXISTS userTable";
		$pdo->exec($dropQuery);

	}
	catch(PDOException $e)
	{
		$error = 'Deleting Tables Failed';
		include 'error.html.php';
		exit();
	}

	//Create the counrtry table in the database
	try
	{
		$createQuery = "CREATE TABLE userTable
						(
							userID INT(6) NOT NULL AUTO_INCREMENT,
							userName VARCHAR(20) NOT NULL,
							password VARCHAR(100) NOT NULL,
							UNIQUE (userName),

							PRIMARY KEY(userID)
						)";
		$pdo->exec($createQuery);
	}
	catch(PDOException $e)
	{
		$error = 'Creating the user table failed';
		include 'error.html.php';
		exit();
	}

	//Insert users and passwords
	try
	{
		doInsert("Matt", "abc", $pdo);
		doInsert("test", "test", $pdo);
	}
	catch(Exception $e)
	{
		$error = "Inserting users failed";
		include 'error.html.php';
	}