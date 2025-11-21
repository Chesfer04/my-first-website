<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$res = mysqli_query($conn,"SELECT * FROM students");
$row = mysqli_fetch_assoc($res);
echo $row['email']; */
?>


<?php
$conn = mysqli_connect("localhost", "root", "", "class_db");

// Wrong code:
// $row = mysqli_fetch_assoc($res);
// echo $row['email'];

$res = mysqli_query($conn, "SELECT * FROM students");
if ($res && mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo $row['email'] . "<br>";
    }

    /*
    I added a while loop to fetch all rows from the query result.
    This ensures all student emails are displayed, not just the first record.
    */
}
?>