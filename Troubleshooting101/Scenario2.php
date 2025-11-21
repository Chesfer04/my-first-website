<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$fname = $_POST['fname']; 
$sql = "SELECT * FROM students WHERE first_name = $fname"; // Missing apostrophe in the $fname, it should be '$fname'"
$res = mysqli_query($conn, $sql);
*/
?>

<!DOCTYPE html>
<html>

<head>
    <title>Search Student</title>
</head>

<body>

    <h2>Search Student by First Name</h2>

    <!-- HTML Form -->
    <form action="Scenario2.php" method="post">
        First Name: <input type="text" name="fname">
        <input type="submit" value="Search">
    </form>

    <?php
    // PHP Code
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if (isset($_POST['fname'])) {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $sql = "SELECT * FROM students WHERE first_name = '$fname'"; // Fixed Code
        $res = mysqli_query($conn, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "ID: " . $row['student_id'] . " - Name: " . $row['first_name'] . "<br>";
            }
        } else {
            echo "No student found with first name '$fname'.";
        }
    }

    mysqli_close($conn);
    ?>

</body>

</html>