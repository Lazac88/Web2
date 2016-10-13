<?php
session_start();
	/*
	Name: Matt Tucker
	Date: 11/10/16
	Week 11 - Session Management
	*/

	include 'connect.inc.php';
	include 'functions.php';
	include 'connectToServer.php';
	
	

	if (isset($_POST['userName']))
	{
		$userName = clean_data($_POST['userName']);
	}
	else if (isset($_SESSION['userName']))
	{
		$userName = $_SESSION['userName'];
	}

	if (isset($_POST['password']))
	{
		$userPassword = clean_data($_POST['password']);
	}
	else if (isset($_SESSION['password']))
	{
		$userPassword = $_SESSION['password'];
	}
	//echo $userPassword;
	//echo $userName;

	if(!isset($userName))
	{
		include 'login.html.php';
		exit;
	}
	else
	{
		//work out if the user name is in the table
		$selectQuery = "SELECT * FROM userTable WHERE (userName = :name) ";
		$stmt = $pdo->prepare($selectQuery);
		$stmt->bindValue(':name', $userName);
		$stmt->execute();
		$row = $stmt->fetch();
		$count=$stmt->rowCount();

		//retrieve the number of rows that wull be returned
		if($count>0)
		{
			//Hash the password with its hash as the salt retuirns the same hash
						//from POST     //from database       //from database
			if(crypt($userPassword, $row['password']) === $row['password'])
			{
				$_SESSION['userName'] = $userName;
				$_SESSION['password'] = $userPassword;
			}
			else
			{
				echo("<h1>Password Wrong</h1>");
				include 'login.html.php';
				exit;
			}
		}
		else
		{
			echo("username is $userName and password is $userPassword<br>");
			echo("<h1>Illegal username and password given </h1>");
			exit;
		}
	}

