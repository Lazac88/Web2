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

	//console.log($_SESSION['userID'] ;
	if(!isset($_SESSION['userID']))
	{ //if login in session is not set
    	header("Location: LoginController.php");
    	exit();
    }
    
    //Checks to see if any links have been clicked and redirects to the correct page
    //Set $_GET['link'] to -1 on completion so it doesn't trigger an if in the future
    if(isset($_GET['link']))
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
    }
	    
     


    else if(isset($_POST['somethingHere']))
    {

    }
    else
    {
    	include 'homePage.html.php';
    	exit();
    }



?>