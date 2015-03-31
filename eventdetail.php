<!DOCTYPE html>
<html>
<body>

<?php
	$q = intval($_GET['q']);
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

	$sql="SELECT EventID, EventName, EventLocation, StartDate, StartTime, EndDate, EndTime, EventDescription FROM events WHERE EventID = '".$q."'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
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
			echo "<h1>". $row["EventName"]. "</h1><br><h6>" .date('l, F d, Y g:i A', mktime($StartHour, $StartMin, 0, $StartMonth, $StartDay, $StartYear))."";
			if ($StartDate != $row["EndDate"]){
				if($row["EndDate"] != NULL) {
				$EndDate = $row["EndDate"];
				$EDateArray = explode("-", $EndDate);
				$EndMonth = $EDateArray[1];
				$EndDay = $EDateArray[2];
				$EndYear = $Edaterray[0];
				$ETimeArray = explode(":", $EndTime);
				$EndHour = $ETimeArray[0];
				$EndMin = $ETimeArray[1];
				echo " - ".date('l, F d, Y g:i A', mktime($EndHour, $EndMin, 0, $EndMonth, $EndDay, $EndYear)). "";
				}
			}
			echo "<br>At: ".$row["EventLocation"]."</h6><br><h7>".$row["EventDescription"]."</h7><br>";
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