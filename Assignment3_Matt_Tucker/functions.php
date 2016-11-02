<?php

/*
	Name: Matt Tucker
	Date: 11/10/16
	Week 11 - Session Management
*/
	//Put secret code here to hide from nosey people
	$secret = "motivateme";

	//Cleans inputted data
	function clean_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//Adds user to database
	function doInsert($fName, $lName, $email, $height, $password, $pdo)
	{
		//A higher "cost" is more secure but consumes more processing power
		$cost = 10;

		//Create a random salt
		$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');

		//Prefix information about the hash so PHP knows how to verify it later.
		//"$2a$" Means we are using the Blowfish algorithm. The following two digits are the the cost parameter.
		$salt = sprintf("$2a$%02d$", $cost) . $salt;
		//echo("$salt <br>");
		//Hash the password with the salt
		$hash = crypt($password, $salt);
		//echo("$hash <br>");

		$insertQuery = "INSERT INTO tblUser (firstName, lastName, email, height, userPassword) VALUES ('$fName', '$lName', '$email', '$height', '$hash')";
		$pdo->exec($insertQuery);
	}

	function findActivities($pdo)
	{
		$selectString = "SELECT * FROM tblActivity";
		$activityResult = $pdo->query($selectString);
		return $activityResult;
	}

	function addActivity($accName, $colour, $pdo)
	{
		$insertQuery = "INSERT INTO tblActivity (activityName, activityColour) VALUES ('$accName', '$colour')";
		$pdo->exec($insertQuery);
	}
?>