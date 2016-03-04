<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<?php $posname = $_GET["posname"]; ?>
<title><?php echo $posname; ?></title>
<style type="text/css">
.auto-style1 {
    text-align: right;
}
</style>
</head>

<body style="width: 610px; height: 700px">
<?php
$ID = $_GET["id"];
$ORGN = $_GET["orgName"];

$server = "45.40.164.16";
$username="prismroot";
$password="root!4ROOT";
$database="prismroot";
$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Unable to select database" . mysql_connect_error());
}
$sql="SELECT * FROM internships WHERE InternshipId = $ID";
$result=mysqli_query($conn, $sql);
$num=mysqli_num_rows($result); 


//if($num < 1 ) {
//echo "0 results";
//}else {
        $i=0;
		while($row = mysqli_fetch_assoc($result)) {
		$intshpid = $row['InternshipId'];
		$pos = $row['PositionTitle'];
		$desc = $row['Description'];
		$orgid = $row['OrganizationId'];
        $state = $row['LocationState'];
        $zip = $row['LocationZip'];
        $posted = $row['DatePosted'];
		$sdate = $row['AppStartDate'];
		$edate = $row['AppEndDate'];
        $wsdate = $row['StartDate'];
    	$wedate = $row['EndDate'];
		$slots = $row['SlotsAvailable'];
		$last = $row['LastUpdated'];
		
		$i++;
}

$sql2="SELECT * FROM organizations WHERE OrganizationId = $orgid";
$result2=mysqli_query($conn, $sql2);
$num=mysqli_num_rows($result2);
        $i=0;
    	while($row = mysqli_fetch_assoc($result2)) {
		$orgn = $row['OrganizationName'];
        $i++;
    	}
mysqli_close($conn);


$pid = $ID-1;
$nid = $ID+1;
$prev= "Internship_Detail.php?id=$pid";
$next= "Internship_Detail.php?id=$nid";

$orgPage= "Organization_detail.php?id=$orgid";

?>
<h1><?php echo $pos; ?></h1>
<div>
	<table style="width: 100%" cellspacing="1">
		<tr>
			<td style="width: 145px" class="auto-style1">Organization: </td>
			<td>
			<a href='<?php echo $orgPage; ?>'><?php echo $orgn ?></a> 
			&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 145px" class="auto-style1">Position Title: </td>
			<td>
			<?php echo $pos; ?>
			&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 145px" class="auto-style1">Posted Date: </td>
			<td>
			<?php echo $posted; ?>
			&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 145px" class="auto-style1">Start & End Date: </td>
			<td>
			<?php echo $sdate." to ". $edate ?>
			&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 145px" valign="top" class="auto-style1">Location:</td>
			<td>
            <?php echo $state."  ". $zip ?>
			&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 145px" valign="top" class="auto-style1">Description:</td>
			<td>
			<?php echo $desc; ?> 
			&nbsp;</td>
		</tr>
		<tr>
			<td style="width: 145px" class="auto-style1">&nbsp;last updated: </td>
			<td> 
			<form action="" method="post" name="last updated" style="width: 146px">
<?php echo $last; ?>
</form>
			</td>
		</tr>
	</table>
</div>
<p>
<form method="post">
	<input name="prev_button" type="button" value="prev" onClick="location.href='<?php echo $prev ?>'" />
    <input name="next_button" type="button" value="next" onClick="location.href=' <?php echo $next ?> '" />&nbsp;&nbsp;&nbsp;
	<input name="list_view" style="width: 96px" type="button" value="list view" onClick="location.href=' http://electronat.com/internship_list.php '"/></form>
</p>

</body>

</html>
