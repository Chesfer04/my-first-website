<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$sql = "DELETE FROM students WHERE id = " . $_GET['id'];
mysqli_query($conn, $sql); */
?>


<?php
$conn = mysqli_connect("localhost", "root", "", "class_db");

// Wrong code:
// $sql = "DELETE FROM students WHERE id = " . $_GET['id'];
// mysqli_query($conn, $sql);

if (isset($_GET['id'])) {
    $student_id = intval($_GET['id']);
    $sql = "DELETE FROM students WHERE student_id = $student_id";
    mysqli_query($conn, $sql);

    /*
    I replaced 'id' with 'student_id' (actual column name) and used intval() to sanitize input.
    This prevents SQL injection and ensures only the intended student is deleted.
    */
}
?>