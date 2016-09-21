<?php
/*
	Name: Matt Tucker
	Date: 3rd September 2016
	Assignment 2
	*/

	//Cleans inputted data
	function clean_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>