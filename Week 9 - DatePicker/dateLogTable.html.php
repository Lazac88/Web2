<!DOCTYPE html>
<html>

<head>
	
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id= "contents">
	
	<table>
		<tr>
			<th>logID</th>
			<th>Date</th>			
		</tr>

		<?php
		foreach($result as $row)
		{
			echo "<tr>";			
			echo "<td>$row[logID]</td>";
			echo "<td>$row[logDate]</td>";			
			echo "</tr>";
		}

		?>

	</table>
	
	</div>
</body>
</html>