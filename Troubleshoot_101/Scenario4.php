<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$first = $_POST['fname'];
$last = $_POST['lname'];
$sql = "INSERT INTO students (first_name,last_name) VALUES ('$first','$last')";
mysqli_query($conn, $sql);
echo "Inserted!"; */
?>


<?php
$conn = mysqli_connect("localhost", "root", "", "class_db");

// Wrong code:
// $first = $_POST['fname'];
// $last = $_POST['lname'];

$first = isset($_POST['fname']) ? trim($_POST['fname']) : "";
$last = isset($_POST['lname']) ? trim($_POST['lname']) : "";

/*
I added isset() to check if POST fields exist and trim() to remove spaces.
This prevents empty or undefined values from being inserted into the database.
*/

if (!empty($first) && !empty($last)) {
    $sql = "INSERT INTO students (first_name,last_name) VALUES ('$first','$last')";
    mysqli_query($conn, $sql);
    echo "Inserted!";
} else {
    echo "Please provide both first and last names.";
}
?>