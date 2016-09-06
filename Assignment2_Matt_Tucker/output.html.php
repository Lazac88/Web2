<!DOCTYPE html>
<html>
<!--
	Name: Matt Tucker
	Date: 1st September 2016
	Assignment 1
-->
<head>
	<title>Athletes</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id= "contents">
	<img alt="Rio Banner" src="images/rio.jpg" />
	<table>
		<tr>
			<th>Picture</th>
			<th>FirstName</th>
			<th>LastName</th>
			<th>Sport</th>
			<th>Event</th>
			<th>Medal</th>
		</tr>

		<?php
		foreach($result as $row)
		{
			echo "<tr>";
			echo "<td><img src='photos/$row[athleteImage]' /></td>";
			echo "<td>$row[firstName]</td>";
			echo "<td>$row[lastName]</td>";
			echo "<td>$row[sport]</td>";
			echo "<td>$row[event]</td>";
			echo "<td>$row[medalName]</td>";
			echo "</tr>";
		}

		?>

	</table>
	<br>
	<br>
	<form action= 'controller.php' method='POST'>
	<button class="btnSpace" type='submit' name='returnSelect' value='returnSelect'>Back to Athletes</button>
	</form>
	
	</div>
</body>
</html>