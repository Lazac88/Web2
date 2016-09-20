<?php
	session_start();
	
	$newColor = $_SESSION['userColor'];   //gets the stored current colour value
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Session Test</title>
		<meta charset='UTF-8'>
		
		<style type = 'text/css'>
		body
		{
			background-color: <?php echo ($newColor); ?>;
		}
		</style>
	</head>
	
	<body>
		<h1>Is the background colour changed?</h1>
		
		<p><a href='Page1.html.php'>Go back to page 1</a>
	</body>
</html>