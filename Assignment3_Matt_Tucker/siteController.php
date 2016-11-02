<?php
session_start();
	/*
	Name: Matt Tucker
	Date: 3rd September 2016
	Assignment 2
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

    else if(isset($_POST['backActivityBtn']))
    {
    	$activityResult = findActivities($pdo);
	    include 'enterWorkout.html.php';
	    exit();
    }
    
    else if(isset($_POST['submitActivityButton']))
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
				$name = $row[activityName];			
				$comparision = strcmp($name, $accName);
				if($comparision != 0)
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
	        include 'userGraphs.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '4')
	    {
	        include 'friendsData.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '5')
	    {
	        include 'rawData.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
	    if ($link == '6')
	    {
	        include 'addActivity.html.php';
	        $_GET['link'] = -1;
	        exit();
	    }
    } 
    else
    {
    	//echo ("<h1>Hit else</h1>");
    	include 'homePage.html.php';
    	exit();
    }



?>