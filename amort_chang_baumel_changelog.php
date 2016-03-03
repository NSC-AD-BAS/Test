<?php
/*-------- CONFIG SECTION --------------*/
/* Supply parameters $username, $message,
and $password with the appropriate credentials to
be entered in log*/
$servername = "localhost";
$username = "root";
$password = "";
$message = "11 A first new log message";
$userid = 112;
$dbname = "prism";

function writeLog($servername, $username, $userid, $message, $password) {
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO change_log (UserId, Message)
	VALUES('" . $userid . "', '" . $message . "');";
	$result = mysqli_query($conn, $sql);

	if($result) {
		echo "Changelog update successful";
	}
	else {
		echo "Changelog update unsuccessful code: " . $result . "<br>The query: " . $sql;
	}
	
	mysqli_close($conn);
}

function viewLog($servername, $username, $password, $dbname) {
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT LogTime, UserId, Message FROM change_log ORDER BY LogTime;";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo "Time: " . $row["LogTime"] . ", User: " . $row["UserId"] . ", Change: " . $row["Message"] . "<br>";
		}
	}
	else {
		echo "0 results";
	}

	mysqli_close($conn);
}
?>