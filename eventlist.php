<!DOCTYPE html>
<html>
<body>

<?php
	$q = $_GET['q'];
	$servername = "localhost";
	$username = "dakota_webuser";
	$password = "15Dakota20History";
	$dbname = "dakota_DCHSWeb";

	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " .  mysqli_connect_error());
	} 
	else {

	$sql="SELECT EventID, EventName, EventLocation, StartDate, StartTime, EndDate, EndTime FROM events WHERE EndDate = 'NULL' OR EndDate >= '".$q."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		echo "<table><tr><th>Event</th><th>Date and Time</th><th>Location</th></tr>";
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$StartDate = $row["StartDate"];
			$SDateArray = explode("-", $StartDate);
			$StartMonth = $SDateArray[1];
			$StartDay = $SDateArray[2];
			$StartYear = $SDateArray[0];
			$StartTime = $row["StartTime"];
			$STimeArray = explode(":", $StartTime);
			$StartHour = $STimeArray[0];
			$StartMin = $STimeArray[1];
			echo "<tr><td><a href=\"EventDetail.html?eventid=".$row["EventID"]."\">". $row["EventName"]. "</a></td><td>".date('l, F d, Y g:i A', mktime($StartHour, $StartMin, 0, $StartMonth, $StartDay, $StartYear)). "";
			if($row["EndDate"] != NULL && $row["StartDate"] != $row["EndDate"]) {
				$EndDate = $row["EndDate"];
				$EDateArray = explode($delimeter, $EndDate);
				$EndMonth = $EDateArray[1];
				$EndDay = $EDateArray[2];
				$EndYear = $Edaterray[0];
				$ETimeArray = explode(":", $EndTime);
				$EndHour = $ETimeArray[0];
				$EndMin = $ETimeArray[1];
				echo " - ".date('l, F d, Y g:i A', mktime($EndHour, $EndMin, 0, $EndMonth, $EndDay, $EndYear)). "";
			}
			echo "</td><td>".$row["EventLocation"]."</td></tr>";
		}
		echo "</table>";
	} else {
		echo "0 results";
	} 
	}
mysqli_close($conn);
?>

</body>
</html>