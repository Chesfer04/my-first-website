<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$email = $_POST['emial']; // misspelled
$sql = "SELECT * FROM students WHERE email='$email'";
$res = mysqli_query($conn, $sql); */
?>


<?php
$conn = mysqli_connect("localhost", "root", "", "class_db");

// Wrong code:
// $email = $_POST['emial']; // misspelled

$email = isset($_POST['email']) ? trim($_POST['email']) : "";

/*
I fixed the typo by changing 'emial' to 'email' to match the form field.
I also added isset() to avoid undefined index errors and trim() to remove spaces.
*/
$sql = "SELECT * FROM students WHERE email='$email'";
$res = mysqli_query($conn, $sql);
?>