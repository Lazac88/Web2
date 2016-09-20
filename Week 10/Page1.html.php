<?php
	session_start();
	/*Session Lab
	  Matt Tucker
	  Week 10 */
	  
	//If they have clicked the colour button, change the stored value in $_SESSION
	if(isset($_POST['submitColour']))
	{
		$_SESSION['userColor'] = $_POST['colorName'];
		$newColor = $_SESSION['userColor']; //gets current colour. First time = null(white)
	}
	else if (isset($_SESSION['userColor']))
	{
		$newColor = $_SESSION['userColor'];
	}
	else
	{
		$newColor = null;
	}
	
	include 'showColorForm.html.php';
?>