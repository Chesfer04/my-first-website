<?php /*
$page = $_GET['page'];
$limit = 5;
$offset = $page * $limit;
$sql = "SELECT * FROM students LIMIT $offset, $limit"; */
?>

<?php
// Wrong code:
// $page = $_GET['page'];
// $offset = $page * $limit;
// $sql = "SELECT * FROM students LIMIT $offset, $limit";

$limit = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
if ($page < 0)
    $page = 0;

$offset = $page * $limit;
$sql = "SELECT * FROM students LIMIT $offset, $limit";

/*
I validated the 'page' GET parameter by casting it to int and restricting it to 0 or higher.
This prevents invalid input from crashing MySQL and ensures safe pagination.
*/
?>