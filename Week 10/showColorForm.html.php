<!DOCTYPE html>
<html>
	<head>
		<title>Form Handling with Sessions</title>
		<meta charset='UTF-8'>
		
		<style type = 'text/css'>
		body
		{
			background-color: <?php echo ($newColor); ?>;
		}
		</style>
	</head>
	
	<body>
		<?php $self = $_SERVER['PHP_SELF'];
			echo("<form action='$self' method='POST'>");
		?>
		
		<p>Type an html colour name:</p><input type='text' name='colorName'/>
		<input type='submit' name='submitColour' value='Change the colour'/>
		</form>
		
		<p><a href='Page2.html.php'>Go to page 2</a></p>
	</body>
</html>