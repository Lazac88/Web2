<?php
	/*
	Name: Matt Tucker
	Date: 3rd September 2016
	Assignment 2
	*/

	include 'connect.inc.php';
	include 'connectToServer.php';
	include 'functions.php';

	if(isset($_POST['Login']))
	{
		include 'LoginPage.html.php';
	}

	else if(isset($_POST['Register']))
	{
		include 'RegisterPage.html.php';
	}
	else
	{
		include 'LandingPage.html.php';
	}

	if(isset($_POST['RegisterButton']))
	{
		//Define regular expressions
		$firstNameCriteria = "(^[a-zA-Z]{2,}$)";
		$lastNameCriteria = "(^[a-zA-Z]+$)";
		$heightCriteria = "(^[0-9]{2,3}$)";
		$passwordCriteria = "((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})";
		//Define variables and set to empty values
		$fNameErr = $lNameErr = $emailErr = $heightErr = $passwordErr = $secretCodeErr = "";
		$fName = $lName = $email = $height = $password = "";
		$dataCorrect = true;

		//Check first name for empty post
		if (empty($_POST["fName"]))
		{
			$fNameErr = "First Name is Required";
			$dataCorrect = false;
		}
		else
		{
			$fName = clean_data($_POST["fName"]);
			//If post not empty and data clean, check to see if first name matches first name criteria
			if(!preg_match($firstNameCriteria, $fName))
			{
				$fNameErr = "First name not valid. Must be 2 or more alphabetical characters<br>";
				$dataCorrect = false;
			}
		}

		//Check last name for empty post
		if (empty($_POST["lName"]))
		{
			$lNameErr = "Last Name is Required";
			$dataCorrect = false;
		}
		else
		{
			$lName = clean_data($_POST["lName"]);
			//If post not empty and data clean, check to see if last name matches last name criteria
			if(!preg_match($lastNameCriteria, $lName))
			{
				$lNameErr = "Last name not valid. Must be 1 or more alphabetical characters<br>";
				$dataCorrect = false;
			}
		}

		//Check email for empty post
		if (empty($_POST["email"]))
		{
			$emailErr = "Email is Required";
			$dataCorrect = false;
		}
		else
		{
			$email = clean_data($_POST["email"]);
			//If post not empty and data clean, check to see if the email is a correct format
			if (!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				$emailErr = "Email Not Valid<br>";
				$dataCorrect = false;
			}
		}

		//Check height for empty post
		if (empty($_POST["height"]))
		{
			$heightErr = "Height is Required";
			$dataCorrect = false;
		}
		else
		{
			$height = clean_data($_POST["height"]);
			//If post not empty and data clean, check to see if height matches height criteria
			if(!preg_match($heightCriteria, $height))
			{
				$heightErr = "Height not valid. Must be in cm and a whole number<br>";
				$dataCorrect = false;
			}
		}

		//Check password for empty post
		if (empty($_POST["password1"]))
		{
			$passwordErr = "Password fields required";
			$dataCorrect = false;
		}
		else
		{
			//Check if passwords don't match
			if(!$_POST["password1"] == $_POST["password2"])
			{
				$passwordErr = "Passwords Do Not Match";
				$dataCorrect = false;
			}
			//If passwords do match...
			else
			{
				$password = $_POST["password1"];
				//If passwords match, check to see if password matches password criteria
				if(!preg_match($passwordCriteria, $password))
				{
					$passwordErr = "Password not valid. Can only contain alphanumeric characters and the following special characters: @ # $ % <br>";
					$dataCorrect = false;
				}
			}
			
		}

		//Check password for empty post
		if (empty($_POST["secretCode"]))
		{
			$secretCodeErr = "Secret required";
			$dataCorrect = false;
		}
		else
		{
			if(!$_POST["secretCode"] == $secret)	//$secret on function page
			{
				$secretCodeErr = "Secret code incorrect";
				$dataCorrect = false;
			}
		}
		if($dataCorrect)
		{
			//add person to database
			//start session
			//send to home page
		}
		else
		{
			include 'RegisterPage.html.php';
			exit();
		}

	}

?>
