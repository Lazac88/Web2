<?php

/*
	Name: Matt Tucker
	Date: 16/11/16
	Assignment 3
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

		$insertQuery = "INSERT INTO tblUser (firstName, lastName, email, height, userPassword) VALUES (:fName, :lName, :email, :height, :hash)";
		$preparedStatement = $pdo->prepare($insertQuery);

		$preparedStatement->bindParam(":fName", $cFName);
		$preparedStatement->bindParam(":lName", $cLName);
		$preparedStatement->bindParam(":email", $cEmail);
		$preparedStatement->bindParam(":height", $cHeight);
		$preparedStatement->bindParam(":hash", $hash);

		$cFName = clean_data($fName);
		$cLName = clean_data($lName);
		$cEmail = clean_data($email);
		$cHeight = clean_data($height);

		$preparedStatement->execute();
	}

	function findActivities($pdo)
	{
		$selectString = "SELECT * FROM tblActivity";
		$activityResult = $pdo->query($selectString);
		return $activityResult;
	}

	function findHeight($pdo, $userID)
	{
		$selectString = "SELECT height FROM tblUser WHERE userID='$userID'";
		$heightResult = $pdo->query($selectString);
		return $heightResult;
	}

	function findUsers($pdo)
	{
		$selectString = "SELECT * FROM tblUser";
		$userResult = $pdo->query($selectString);
		return $userResult;
	}

	function findWorkouts($pdo)
	{
		$selectString = "SELECT * FROM tblWorkout";
		$workoutResult = $pdo->query($selectString);
		return $workoutResult;
	}

	function findWeekWorkouts($pdo, $userID)
	{		
		$selectString = "SELECT workoutDate, sum(workoutMinutes) as minutes FROM tblWorkout WHERE userID='$userID' AND workoutDate > DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY(workoutDate)";
		$workoutResult = $pdo->query($selectString);
		return $workoutResult;
	}

	function findMonthWorkouts($pdo, $userID)
	{		
		$selectString = "SELECT workoutDate, sum(workoutMinutes) as minutes FROM tblWorkout WHERE userID='$userID' AND workoutDate > DATE_SUB(NOW(), INTERVAL 1 MONTH) GROUP BY(workoutDate)";
		$workoutResult = $pdo->query($selectString);
		return $workoutResult;
	}

	function findAllTimeWorkouts($pdo, $userID)
	{		
		$selectString = "SELECT activityName, sum(workoutMinutes) as minutes FROM tblActivity LEFT JOIN tblWorkout on tblActivity.activityID = tblWorkout.activityID WHERE userID = '$userID' GROUP BY(activityName)";
		$activityResult = $pdo->query($selectString);
		return $activityResult;
	}

	function findWeekActivities($pdo, $userID)
	{
		$selectString = "SELECT activityName, sum(workoutMinutes) as minutes FROM tblActivity LEFT JOIN tblWorkout on tblActivity.activityID = tblWorkout.activityID WHERE userID = '$userID' AND workoutDate > DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY(activityName)";
		$activityResult = $pdo->query($selectString);
		return $activityResult;
	}

	function findAllUserWorkouts($pdo, $userID)
	{
		$selectString = "SELECT * FROM tblActivity LEFT JOIN tblWorkout on tblActivity.activityID = tblWorkout.activityID WHERE userID = '$userID' 
			ORDER BY(workoutDate) DESC";
		$userResults = $pdo->query($selectString);
		return $userResults;
	}

	function findFriendTotals($pdo)
	{
		$selectString = "SELECT firstName, sum(workoutMinutes) as minutes from tblUser LEFT JOIN tblWorkout ON tblUser.userID = tblWorkout.userID GROUP BY firstName";
		$friendTotals = $pdo->query($selectString);
		return $friendTotals;
	}

	function findBMI($pdo, $userID)
	{
		$selectString = "SELECT bmiDate, weight, bmi FROM tblBMI WHERE userID='$userID'";
		$BMIResult = $pdo->query($selectString);
		return $BMIResult;
	}

	function findAllBMI($pdo)
	{
		$selectString = "SELECT * FROM tblBMI";
		$BMIResult = $pdo->query($selectString);
		return $BMIResult;
	}

	function addActivity($accName, $colour, $pdo)
	{
		$insertQuery = "INSERT INTO tblActivity (activityName, activityColour) VALUES (:accName, :colour)";
		$preparedStatement = $pdo->prepare($insertQuery);

		$preparedStatement->bindParam(":accName", $cAccName);
		$preparedStatement->bindParam(":colour", $colour);

		$cAccName = clean_data($accName);

		$preparedStatement->execute();
	}

	function addWorkout($userID, $activityID, $workoutDate, $workoutDuration, $workoutComment, $pdo)
	{
		$insertQuery = "INSERT INTO tblWorkout (userID, activityID, workoutDate, workoutMinutes, workoutComments) VALUES (:userID, :activityID, :workoutDate, :workoutDuration, :workoutComment )";
		$preparedStatement = $pdo->prepare($insertQuery);

		$preparedStatement->bindParam(":userID", $cUserID);
		$preparedStatement->bindParam(":activityID", $activityID);
		$preparedStatement->bindParam(":workoutDate", $workoutDate);
		$preparedStatement->bindParam(":workoutDuration", $cWorkoutDuration);
		$preparedStatement->bindParam(":workoutComment", $cWorkoutComment);		

		$cUserID = clean_data($userID);
		$cWorkoutDuration = clean_data($workoutDuration);
		$cWorkoutComment = (string)$workoutComment;
		$cWorkoutComment = clean_data($cWorkoutComment);
		//echo ("<h1>$cWorkoutComment</h1>");
		$preparedStatement->execute();
	}

	function addWeight($userID, $bmiDate, $weight, $bmi, $pdo)
	{
		$insertQuery = "INSERT INTO tblBMI (userID, bmiDate, weight, bmi) VALUES ('$userID', '$bmiDate', '$weight', '$bmi')";
		$pdo->exec($insertQuery);
	}
?>