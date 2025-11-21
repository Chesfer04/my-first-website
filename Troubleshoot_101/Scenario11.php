<?php /*
<form method="GET" action="save.php">
<input name="email">
</form>
$email = $_POST['email']; */
?>


<?php
// Wrong code:
// $email = $_POST['email'];

$email = isset($_POST['email']) ? trim($_POST['email']) : "";

/*
I changed the form method to POST to match the PHP superglobal.
isset() prevents undefined index errors, and trim() removes extra spaces.
*/
?>