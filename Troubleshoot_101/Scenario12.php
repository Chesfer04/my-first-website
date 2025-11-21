<?php /*
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id = '$id'"; */
?>


<?php
// Wrong code:
// $sql = "SELECT * FROM students WHERE id = '$id'";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM students WHERE student_id = $id";

/*
Removed quotes around numeric ID and cast to integer using intval().
Also replaced 'id' with the correct column name 'student_id'.
*/
?>