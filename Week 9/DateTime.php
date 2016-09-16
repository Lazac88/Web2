<?php

$todayStamp = time();

$formattedTime = date('d/m/y', $todayStamp);
echo $formattedTime;

echo "<br>";

$formattedTime = date('l, jS F Y', $todayStamp);
echo $formattedTime;

echo "<br>";

$timeArray = getDate($todayStamp);

echo "<table>
		<tr>
			<th>Key</th>
			<th>Value</th>
		</tr>";

foreach($timeArray as $key=>$value)
{
	echo "<tr>
			<td>$key</td>
			<td>$value</td>
		 </tr>";
}

echo "</table>";
echo "<br>";


$myBirthday = mktime(0,0,0,7,18,1988);

echo ("My birthday unformatted: <h1>$myBirthday</h1>");
echo "<br>";

$formattedBday = date('l, jS F Y', $myBirthday);
echo ("My birthday formatted: <h1>$formattedBday</h1>");
echo "<br>";

$formattedBday = date('l', $myBirthday);
echo ("My birthday day: <h1>$formattedBday</h1>");
echo "<br>";

$yest = strtotime("yesterday");
$formattedYest = date('l, jS F Y', $yest);
echo ("Yesterdays date: <h1>$formattedYest</h1>");
echo "<br>";

function findYearFromNowDay()
{
	$next = getDate(strtotime("+1 year"));
	return $next['weekday'];
}

$yearDay = findYearFromNowDay();
echo ("This day next year: <h1>$yearDay</h1>");
echo "<br>";

$startOfTerm = mktime(0,0,0, 7,18,2016);

$difference = $todayStamp - $startOfTerm;

$numDays = ceil(abs($difference) / 86400);
echo ("Days since start of term: <h1>$numDays</h1>");
?>