
<!DOCTYPE html>
<html>
 <head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
<link rel="stylesheet" type="text/css" href="login.css">
</head>

<body>

	<div id="menu">
	<ul>
	<li><a href="index.html">Home</a></li>
	<li><a href="students.html">Students</a></li>
	<li><a href="organizations.html">Organizations</a></li>
	<li><a href="sysman.html">System Management</a></li>
	<li><a href="logout.html">Log Out</a></li>
	</ul>
	</div>


<div id="data">
<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "prism";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
die("connection failed: ".mysqli_connect_error());
}

$sql = "SELECT *  from org_detail";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {

while($row = mysqli_fetch_assoc($result)) {
echo "company: " . $row["Organization"] . "<br>";
echo "url: " . $row["URL"] . "<br>";
echo "Address: " . $row["Address 1"] . "<br>";
echo "Address 2: " . $row["Address 2"] . "<br>";
echo "city: " . $row["City"] . "<br>";
echo "state: " . $row["State"] . "<br>";
echo "Employee # : " . $row["Number of Employees"] . "<br>";
echo "Yearly Revenue: " . $row["Yearly Revenue"] . "<br>";
echo "Description : " . $row["Description"] . "<br>";
}
} else {
echo "0 results";
}
mysqli_close($conn);
?>

</body>
</html>