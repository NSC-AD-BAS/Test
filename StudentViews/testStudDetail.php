<?php
session_start();
//need to check if there's a search given in the first place
if(isset($_POST['student_id'])){
  // Include the search class
  require_once( dirname( __FILE__ ) . '/student_detailed.php' );
  
  //quick search to initialize the class
  include 'db_connect.php';
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $student_search_term = mysqli_query($conn, "SELECT * FROM students
											  WHERE StudentId = 1");
  // Test to check if we can just have a name to query the database
  $name = "Bob Ross";
  $student_id = $_POST['student_id'];
  // Instantiate a new instance of the search class
  // This is assuming that we are receiving the search 
  $student_search = new student_detailed($student_id);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Student Detail</title>
		<meta charset="utf-8">
	</head>
	<body>
	<?php echo "<h1>" . $student_search->displayFullName() . "</h1>" ?>
	<?php $student_search->displayStudDetails()?>
	<!--This query updates the database, probably best not to use it-->
	<!--<?php $name = "Bob Ross"; $student_search->setStudentName($name) ?> -->
	<?php $student_search->displayUserNotes() ?>
	<?php $student_search->displayFullName() ?>

	</body>
</html>