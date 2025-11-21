<?php /*
$age = $_POST['age'];
$sql = "SELECT * FROM students WHERE age = $aeg"; */
?>


<?php
// Wrong code:
// $sql = "SELECT * FROM students WHERE age = $aeg";

$age = isset($_POST['age']) ? intval($_POST['age']) : 0;
$sql = "SELECT * FROM students WHERE age = $age";

/*
I corrected the variable name from $aeg to $age and sanitized it using intval().
This ensures the query uses the correct value and prevents undefined variable errors.
*/
?>