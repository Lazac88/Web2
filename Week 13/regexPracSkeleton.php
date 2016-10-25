<!doctype html>
<html>
	<head>
	<title>Regular Expression Practical</title>
	<meta charset="UTF-8">
	 <style type = "text/css">
	body
	{
		background-color:blue;
		padding-left:10px;
	}
	fieldset
	{
		padding:10px;
	}

	 </style>
	</head>
	<body >
		
	<?php
	//----------------------------------------------
	// Build a simple registration form.
	// Use PCRE regular expressions to validate the
	// user-supplied data.
	//----------------------------------------------

	// grab page name for self-referential processing

	$self = htmlentities($_SERVER['PHP_SELF']);

	// if submitted, process the data
	if (isset($_POST['submitted']))
	{
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$phoneNumber = $_POST['phoneNumber'];
		$province = $_POST['province'];
		$password = $_POST['password'];

		
        //-------------------------------//
		// WRITE THE VALIDATION CODE HERE//
		$success = true;
		$firstNameCriteria = "(^[a-zA-Z]{2,}$)";
		$lastNameCriteria = "(^[a-zA-Z]+$)";
		$phoneNumberCriteria = "(^0\d-\d{3}-\d{4}$)";
		$provinceCriteria = "(^Otago$|^Southland$|^Canterbury$)";
		$passwordCriteria = "((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{6,20})";
		
		
		if(!preg_match($firstNameCriteria, $firstName))
		{
			echo "First name not valid<br>";
			$success = false;
		}
		
		if(!preg_match($lastNameCriteria, $lastName))
		{
			echo "Last name not valid<br>";
			$success = false;
		}
		if(!preg_match($phoneNumberCriteria, $phoneNumber))
		{
			echo "Phone Number not valid<br>";
			$success = false;
		}
		if(!preg_match($provinceCriteria, $province))
		{
			echo "Province not valid<br>";
			$success = false;
		}
		if(!preg_match($passwordCriteria, $password))
		{
			echo "Password not valid<br>";
			$success = false;
		}
		
		if($success)
		{
			echo "Registered Successfully";
		}
		
		//-------------------------------//
	
	}
	else
	{
		// if not yet submitted, show the data entry form

		// set form tag action property for self-reference
		echo("<form action = '$self' method = 'POST'>");
		echo("<h2>Please enter your registration information</h2>");

		// organise input fields in a table for good readability
		echo("<table >");

		// first name text box
		echo("<tr>");
		echo("<td>First Name</td><td><input type = 'text' name = 'firstName'</td>");
		echo("</tr>");
	
		// last name text box
		echo("<tr>");
		echo("<td>Last Name</td><td><input type = 'text' name = 'lastName'</td>");
		echo("</tr>");

		// phone number text box
		echo("<tr>");
		echo("<td>Phone Number</td><td><input type = 'text' name = 'phoneNumber'</td>");
		echo("</tr>");

		// province text box
		echo("<tr>");
		echo("<td>Province</td><td><input type = 'text' name = 'province'</td>");
		echo("</tr>");

		// password
		echo("<tr>");
		echo("<td>Password</td><td><input type = 'text' name = 'password'</td>");
		echo("</tr>");

		echo("</table>");

		echo("<p><input type = 'submit' name = 'submitted' value = 'Submit Information'></p>");

		echo("</form>");
	}
	?>

	</body>
</html>