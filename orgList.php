<!DOCTYPE html>
<html>
 <head>
<link rel="stylesheet" type="text/css" href="prism.css">
</head>

<body>
	
	<div id="menu">
	<ul>
	<li><a href="index.html">Home</a></li>
	<li><a href="students.html">Students</a></li>
	<li><a href="orgList.php">Organizations</a></li>
	<li><a href="sysman.html">System Management</a></li>
	<li><a href="logout.html">Log Out</a></li>
	</ul>
	</div>

<div id="data"> 

<table>
	<th>Organization</th><th>Number of Employees</th><th>City</th>

<?php
$servername="localhost";
$username="root";
$password ="root";
$dbname="prism";

//create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);
//check connection
if (!$conn){
	die("Connection failed: " .mysqli_connect_error());
}
$sql = "SELECT DISTINCT Organization, `Number of Employees`, City, URL FROM org_detail 
	ORDER BY Organization";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)> 0){


//output data of each row

	while($row= mysqli_fetch_assoc($result) ){
		$varName=$row["Organization"];
		echo "<tr><td><a href='orgDetailsView.php?orgId=$varName'>" .$row["Organization"]. "</a></td> 
		<td>" .$row['Number of Employees']. "</td><td>" .$row["City"]. "</td>";
	}
} else { 
	echo "0 results";
}

mysqli_close($conn);
?>

</table>
</div>
</body>
</html> 
