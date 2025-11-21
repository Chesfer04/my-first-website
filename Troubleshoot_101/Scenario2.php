<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$fname = $_POST['fname'];
$sql = "SELECT * FROM students WHERE first_name = $fname";
$res = mysqli_query($conn, $sql); */
?>


<?php
$conn = mysqli_connect("localhost", "root", "", "class_db");

// Wrong code:
// $fname = $_POST['fname'];
// $sql = "SELECT * FROM students WHERE first_name = $fname";

// Corrected code:
$fname = isset($_POST['fname']) ? trim($_POST['fname']) : "";
$sql = "SELECT * FROM students WHERE first_name = '$fname'";

/*
I added isset() to avoid undefined index errors and trim() to remove spaces.
I also wrapped $fname in quotes so the SQL works correctly when searching by first name.
*/
$res = mysqli_query($conn, $sql);
?>