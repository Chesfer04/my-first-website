<?php /*
$newEmail = $_POST['email'];
$sql = "UPDATE students SET email='$newEmail'";
mysqli_query($conn,$sql); */
?>


<?php
// Wrong code:
// $sql = "UPDATE students SET email='$newEmail'";

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$newEmail = isset($_POST['email']) ? trim($_POST['email']) : "";

$sql = "UPDATE students SET email='$newEmail' WHERE student_id=$id";

/*
I added a WHERE clause using the student ID to update only the intended record.
intval() sanitizes the ID, and trim() cleans the email input.
*/
mysqli_query($conn, $sql);
?>