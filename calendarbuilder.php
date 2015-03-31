<?php
	$q = $_GET['q'];
	$currentDay = date("d");
	$currentMonth = date("m");
	$currentYear = date("Y");
	$servername = "localhost";
	$username = "dakota_webuser";
	$password = "15Dakota20History";
	$dbname = "dakota_DCHSWeb";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	//parse incoming date
	$calendarArray = explode("-", $q);
	$buildYear = $calendarArray[0];
	$buildMonth = $calendarArray[1] + 1;
	$buildDay = $calendarArray[2];
	$startDay = date("w", mktime(0, 0, 0, $buildMonth, 1, $buildYear));
	//$startDay = date("w", $startDate);
	$dayCount = 1;

	switch ($startDay) {
		case 0:
			$dayCount = 1;
			break;
		case 1:
			$dayCount = 0;
			break;
		case 2:
			$dayCount = -1;
			break;
		case 3:
			$dayCount = -2;
			break;
		case 4:
			$dayCount = -3;
			break;
		case 5:
			$dayCount = -4;
			break;
		default:
			$dayCount = -5;
			break;
	}
	
	switch ($buildMonth) {
		case 2:
			if ($buildYear % 100 == 0) {
				if ($buildYear % 400 == 0) {
					$days = 29;
				}
				else {
					$days = 28;
				}
			}
			else if ($buildYear % 4 == 0) {
				$days = 29;
			}
			else {
				$days = 28;
			}
			break;
		case 4:
			$days = 30;
			break;
		case 6:
			$days = 30;
			break;
		case 9:
			$days = 30;
			break;
		case 11:
			$days = 30;
			break;
		default:
			$days = 31;
			break;
	}
	
	$dayOfWeek = 0;
	
	while ($dayCount <= $days)
	{
		echo "<tr>";

		while ($dayOfWeek < 7 && $dayCount <= $days)
		{
			if ($dayCount < 1)
			{
				echo "<td></td>";
			}
			else
			{
				if (!$conn) {
					die("Connection failed: " .  mysqli_connect_error());
				} 
				else {
					$sql="SELECT EventID, EventName, EventLocation, StartDate, StartTime, EndDate, EndTime FROM events WHERE StartDate = '".$buildYear."-".$buildMonth."-".$dayCount."'";
					$result = mysqli_query($conn, $sql);
					
					if ($dayCount == $currentDay && $buildMonth == $currentMonth && $buildYear == $currentYear)
					{
						echo "<td id=\"$dayCount\" class=\"today\">$dayCount<br>";
					}
					else
					{
						echo "<td id=\"$dayCount\" class=\"day\">$dayCount<br>";
					}
					
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							echo "<a href=\"EventDetail.html?eventid=".$row["EventID"]."\">".$row["EventName"]."</a><br>";
						}
					}
					echo "</td>";
				}
			}
			$dayCount = $dayCount + 1;
			$dayOfWeek = $dayOfWeek + 1;
		}
		if ($dayOfWeek == 7) {
			echo "</tr>";
			$dayOfWeek = 0;
		}
	}
	
	if ($dayOfWeek < 7 && $dayOfWeek != 0)
	{
		while ($dayOfWeek < 7)
		{
			echo "<td></td>";
			$dayOfWeek = $dayOfWeek + 1;
		}
		echo "</tr>";
	}
?>