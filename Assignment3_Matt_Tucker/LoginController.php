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

	if(isset($_POST['Register']))
	{
		include 'RegisterPage.html.php';
	}
	else
	{
		include 'LandingPage.html.php';
	}

?>
