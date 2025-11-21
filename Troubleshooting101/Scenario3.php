<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$age = $_GET['age'];
$sql = "SELECT * FROM students WHERE age = $age"; // the $age should be a question mark (?)
$res = mysqli_query($conn, $sql); */
?>

<html>

<head>
    <title>Search Students by Age</title>
</head>

<body>

    <h2>Search Students by Age</h2>
    <!-- HTML FORM -->
    <form action="Scenario3.php" method="get">
        Age: <input type="text" name="age">
        <input type="submit" value="Search">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if (isset($_GET['age'])) {
        $age = $_GET['age'];

        // Prepared statement
        $stmt = mysqli_prepare($conn, "SELECT * FROM students WHERE age = ?"); // Fixed code
        mysqli_stmt_bind_param($stmt, "i", $age);
        mysqli_stmt_execute($stmt);

        $res = mysqli_stmt_get_result($stmt);

        if ($res && mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "ID: " . $row['student_id'] . " - Name: " . $row['first_name'] . " - Age: " . $row['age'] . "<br>";
            }
        } else {
            echo "No students found with age $age.";
        }
    }
    ?>

</body>

</html>