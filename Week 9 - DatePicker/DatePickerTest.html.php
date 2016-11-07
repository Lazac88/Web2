

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

</head>
<body>
 
	<?php
		$self = htmlentities($_SERVER['PHP_SELF']);
		echo "<form action= $self method='POST'>"
	?>
		<p>Date: <input type="text" name="datepicker" id="datepicker"></p>
 		<button type='submit' name='chooseDate' value='chooseDate'>Add Date</button>
</form>	
 
</body>
</html>