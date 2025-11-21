<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$age = $_GET['age'];
$sql = "SELECT * FROM students WHERE age = $age";
$res = mysqli_query($conn, $sql); */
?>

<?php
$conn = mysqli_connect("localhost", "root", "", "class_db");

// Wrong code:
// $age = $_GET['age'];
// $sql = "SELECT * FROM students WHERE age = $age";

// Corrected code using prepared statement:
$age = isset($_GET['age']) ? intval($_GET['age']) : 0;
$stmt = mysqli_prepare($conn, "SELECT * FROM students WHERE age = ?");
mysqli_stmt_bind_param($stmt, "i", $age);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);

/*
I used intval() to sanitize the GET input and a prepared statement to prevent SQL injection.
This ensures only students with the specified age are returned safely.
*/
?>