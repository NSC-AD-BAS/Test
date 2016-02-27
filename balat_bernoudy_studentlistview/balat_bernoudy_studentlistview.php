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
    return $results;
}

function format_student_list($results)
{
    $formatted_results = "<ul>";
    $formatted_rows = array();
    while ($row = mysqli_fetch_assoc($results)) {
        $formatted_rows[] = array('<li>StudentId: ' . $row["StudentId"] . ' Name: ' . $row["FullName"] . '</li>');
        //' Contact: ' . $row["ContactInfo"] . " Program Status: " . $row["ProgramStatus"] . " Cohort: " . $row["Cohort"] . "</li>");
    }
    $formatted_results = $formatted_results . "</ul>";
    return $formatted_rows;
}

//function from php file that inserts formatted data


?>

<html>
<head>
    <title>PHP Test</title>
</head>
<body>

<?php
// Query string to use to get a list of students
$query =
    "SELECT StudentId, FullName, ContactInfo, ProgramStatus, Cohort FROM students as s
                  JOIN users as u ON u.UserId = s.UserId
                  WHERE u.TypeId = 1";

$student_list = get_student_lists($query);
// Check results
if ($student_list == FALSE) {
    // print error message
    echo "<div class='error'>0 results found</div>";
} else {
    echo mysqli_num_rows($student_list) . " results</br>";
    implode(" ", format_student_list($student_list));
}
?>

</body>
</html>