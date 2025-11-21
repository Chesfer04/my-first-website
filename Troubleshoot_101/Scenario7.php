<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$id = $_POST['id'];
$email = $_POST['email'];
$sql = "UPDATE students SET email=$email WHERE id=$id";
$res = mysqli_query($conn, $sql);
echo "Updated!"; */
?>


<?php
$conn = mysqli_connect("localhost", "root", "", "class_db");

// Wrong code:
// $sql = "UPDATE students SET email=$email WHERE id=$id";
// $res = mysqli_query($conn, $sql);
// echo "Updated!";

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$email = isset($_POST['email']) ? trim($_POST['email']) : "";

if ($id > 0 && !empty($email)) {
    $sql = "UPDATE students SET email='$email' WHERE student_id=$id";
    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "Email updated successfully for student ID $id.";
        } else {
            echo "No student found with ID $id or email already set to this value.";
        }
    } else {
        echo "Error updating email: " . mysqli_error($conn);
    }

    /*
    Added quotes around email, validated POST inputs, and checked query success.
    This prevents SQL errors and avoids printing "Updated!" incorrectly.
    */
}
?>