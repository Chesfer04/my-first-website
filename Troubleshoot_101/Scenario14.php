<?php /*
$data = $_POST;
$sql = "INSERT INTO students (first_name, last_name, email)
VALUES ($data[first_name], $data[last_name], $data[email])"; */
?>


<?php
// Wrong code:
// $sql = "INSERT INTO students (first_name, last_name, email)
// VALUES ($data[first_name], $data[last_name], $data[email])";

$first = isset($_POST['first_name']) ? trim($_POST['first_name']) : "";
$last = isset($_POST['last_name']) ? trim($_POST['last_name']) : "";
$email = isset($_POST['email']) ? trim($_POST['email']) : "";

$sql = "INSERT INTO students (first_name, last_name, email)
        VALUES ('$first', '$last', '$email')";

/*
I fixed array indexing to use $_POST['key'] correctly and wrapped values in quotes.
trim() removes spaces. This prevents undefined index and SQL syntax errors.
*/
?>