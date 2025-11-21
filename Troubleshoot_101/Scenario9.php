<?php /*
$id = $_POST['id'];
?>
<a href="view.php?id=3">View Student</a> */
?>

<?php
// Wrong code:
// $id = $_POST['id'];

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

/*
I replaced $_POST with $_GET because the link sends parameters via GET.
intval() ensures the ID is numeric and avoids undefined index errors.
*/
?>