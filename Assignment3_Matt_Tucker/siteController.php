<?php
session_start();
	/*
	Name: Matt Tucker
	Date: 16th November 2016
	Assignment 3
	*/

	include 'connect.inc.php';
	include 'connectToServer.php';
	include 'functions.php';
	
	//Declared here to stop an error on first visit to the add activity page
	$actNameErr = $accName = "";
	//console.log($_SESSION['userID'] ;
	if(!isset($_SESSION['userID']))
	{ //if login in session is not set
    	header("Location: LoginController.php");
    	exit();
    }
    
    else if(isset($_POST['logoutBtn']))			//If logout button pushed
    {
    	// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy();

		header("Location: LoginController.php");	//Redirect to LoginController
	    exit();
    }

    else if(isset($_POST['backActivityBtn']))		//Back button on addActivity Page
    {
    	$activityResult = findActivities($pdo);
	    include 'enterWorkout.html.php';
	    exit();
    }
    
    else if(isset($_POST['submitActivityButton']))	//Submit Activity Button on addActivity Page
    {	
    	$actNameErr = "";
    	$actName = "";
    	$colourCode = "";

    	$dataCorrect = true;

    	//Define regular expressions
		$activityNameCriteria = "(^[a-zA-Z]{2,15}$)";

    	if(!isset($_POST['activityName']))
    	{
    		$actNameErr = "Please input an activty name up to 15 characters. No special characters.";
    		$dataCorrect = false;
    	}
    	else
    	{
    		$actName = clean_data($_POST["activityName"]);
    		$colourCode = $_POST["colourName"];
    		//Converts string to all lowercase
    		$actName = strtolower($actName);
    		//Converts first letter of string to uppercase
    		$actName = ucfirst($actName);
			//If post not empty and data clean, check to see if first name matches first name criteria
			if(!preg_match($activityNameCriteria, $actName))
			{
				$actNameErr = "Activity name not valid. Must have 2-15 alphabetical characters<br>";
				$dataCorrect = false;
			}

			$activityResult = findActivities($pdo);
			foreach ($activityResult as $row) 
			{	
				$name = $row['activityName'];			
				//$comparision = strcmp($name, $accName);
				if($name == $actName)
				{
					$actNameErr = "Activity Already Exists";
					$dataCorrect = false;
				}
			}	
    	}
    	if($dataCorrect)
		{
			addActivity($actName, $colourCode, $pdo);
			$activityResult = findActivities($pdo);
	    	include 'enterWorkout.html.php';
	    	exit();
		}
		else
		{
			include 'addActivity.html.php';
			exit();
		}
    	
    }

    else if (isset($_POST['submitWorkoutBtn']))			//If submit workout button is pushed
    {
    	$userID = $_SESSION['userID'];
    	$activityID = $_POST['activityResult'];    	
    	$workoutDate = $_POST['datepicker'];
    	$workoutDate = strtotime($workoutDate);			//Convert from string to time
    	$workoutDate = date('Y-m-d', $workoutDate);  	//Convert into correct format
    	$workoutDuration = $_POST['workoutDuration'];
    	$workoutComment = $_POST['workoutComment'];
    	$workoutComment = clean_data($workoutComment);

    	addWorkout($userID, $activityID, $workoutDate, $workoutDuration, $workoutComment, $pdo);
    	include 'homePage.html.php';
    	exit();

    }

    elseif (isset($_POST['submitWeightBtn'])) 
    {
    	$userID = $_SESSION['userID'];
    	$weight = $_POST['weight'];
    	$weightDate = $_POST['datepicker'];
    	$weightDate = strtotime($weightDate);			//Convert from string to time
    	$weightDate = date('Y-m-d', $weightDate);  	//Convert into correct format
    	$heightQuery = findHeight($pdo, $userID);
    	$heightCM = 0.00;
    	foreach ($heightQuery as $row) 
			{				
				$heightCM = $row['height'];
			}
    	$heightM = $heightCM / 100; 					//Convert Height To Meters
    	//BMI equals weight(kg)/height(m)
    	$BMI =  $weight / ($heightM * $heightM);
    	
    	addWeight($userID, $weightDate, $weight, $BMI, $pdo);

    	$BMIResults = findBMI($pdo, $userID);
    	include 'trackWeight.html.php';
    	exit();

    }


    //Checks to see if any links have been clicked and redirects to the correct page
    //Set $_GET['link'] to -1 on completion so it doesn't trigger an if in the future
    else if(isset($_GET['link']))
    {
    	$link=$_GET['link'];
	    if ($link == '1')
	    {
	        include 'homePage.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '2')
	    {
	    	//Call a function to find all activity entries for current user
			$activityResult = findActivities($pdo);
	        include 'enterWorkout.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '3')
	    {
	    	$userID = $_SESSION['userID'];
	       	$workoutResults = findWeekWorkouts($pdo, $userID);
	       	$activityResults = findWeekActivities($pdo, $userID);
	       	$workoutResultsMonth = findMonthWorkouts($pdo, $userID);
	        include 'userGraphs.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '4')
	    {
	    	$userID = $_SESSION['userID'];
	    	$userResults = findAllUserWorkouts($pdo, $userID);
	    	$allTimeResults = findAllTimeWorkouts($pdo, $userID);
	    	include 'userData.html.php';
	    	$_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '5')
	    {
	    	$userID = $_SESSION['userID'];
	    	$BMIResults = findBMI($pdo, $userID);
	    	include 'trackWeight.html.php';
	    	$_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '6')
	    {
	    	$friendTotals = findFriendTotals($pdo);
	        include 'friendsData.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '7')
	    {
	        $activityResult = findActivities($pdo);
	    	$userResult = findUsers($pdo);
	    	$workoutResult = findWorkouts($pdo);
	    	$BMIResult = findAllBMI($pdo);
	        include 'rawData.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '8')
	    {
	        include 'addActivity.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
    } 
    else 								//Go to calendar page
    {
    	//echo ("<h1>Hit else</h1>");
    	include 'homePage.html.php';
    	exit();
    }



?>