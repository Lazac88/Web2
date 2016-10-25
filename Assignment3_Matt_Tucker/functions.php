<?php

/*
	Name: Matt Tucker
	Date: 11/10/16
	Week 11 - Session Management
*/

	//Cleans inputted data
	function clean_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	//Adds user to database
	function doInsert($name, $password, $email, $pdo)
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

		$insertQuery = "INSERT INTO tblUser (userName, userPassword, userEmail) VALUES ('$name', '$hash', '$email')";
		$pdo->exec($insertQuery);
	}
?>