<?php

function get_student_lists($query)
{
    include 'db_connect.php';
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $results = mysqli_query($conn, $query);
    mysqli_close($conn);
    if ($results == FALSE) {
        return array();
    } else {
        $arr = array();
        while ($row = $results->fetch_assoc()) {
            $arr[] = $row;
        }
        $results->free();
        return $arr;
    }
}

function print_student_list($results)
{
    echo "<h2>" . count($results) . " rows returned." . "</h2>";
    echo "<table>";
    echo "<tr><td>Student Name</td><td>SID</td><td>Cohort</td><td>Internship</td><td>Notes</td>></tr>";
    foreach ($results as $student) {
        echo "<tr>";
        echo "<td>".$student['Student Name'] . "</td><td>" . $student['SID'] . "</td><td>" . $student['Cohort'] . "</td><td>" . $student['Internship'] . "</td><td>" . $student['Notes'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>";
}

?>

<html>
<head>
    <title>PHP Test</title>
</head>
<body>

<?php
// Query string to use to get a list of students
$query = "SELECT * FROM student_list WHERE `Program Status` LIKE 'Active'";

$student_list = get_student_lists($query);
print_student_list($student_list);
?>

</body>
</html>