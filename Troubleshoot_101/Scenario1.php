<?php
/*$conn = mysqli_connect("localhost", "root", "", "class_db");
$id = $_POST['id'];  // DAPAT PO SIR GET YUNG POST
$sql = "SELECT * FROM students WHERE id = $id";  // KULANG NG student between WHERE and id po sir based on the database
$res = mysqli_query($conn, $sql);
$r = mysqli_fetch_assoc($res);
echo $r['first_name'];
*/
?>

<?php // FIXED
$conn = mysqli_connect("localhost", "root", "", "class_db");
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE student_id = $id";
$res = mysqli_query($conn, $sql);
$r = mysqli_fetch_assoc($res);
echo $r['first_name'];
?>