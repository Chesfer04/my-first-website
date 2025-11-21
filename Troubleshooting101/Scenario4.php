<?php /*
$conn = mysqli_connect("localhost","root","","class_db");
$first = $_POST['fname'];
$last = $_POST['lname'];
$sql = "INSERT INTO students (first_name,last_name) VALUES ('$first',
'$last')";
mysqli_query($conn, $sql);
echo "Inserted!"; */
?>

<!DOCTYPE html>
<html>

<head>
    <title>Insert New Student</title>
</head>

<body>

    <h2>Insert New Student</h2>

    <!-- HTML Form -->
    <form action="Scenario4.php" method="post">
        First Name: <input type="text" name="fname"><br><br>
        Last Name: <input type="text" name="lname"><br><br>
        <input type="submit" value="Insert">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Validate POST inputs
        $first = isset($_POST['fname']) ? trim($_POST['fname']) : "";
        $last = isset($_POST['lname']) ? trim($_POST['lname']) : "";

        /*
        I validated the POST inputs before using them.
        Instead of directly assigning $_POST values, I wrapped them in isset()
        to avoid undefined index errors, and used trim() to remove spaces.
        This ensures variables always exist and are not empty accidentally.
        */

        // Check that fields are not empty
        if (!empty($first) && !empty($last)) {
            $sql = "INSERT INTO students (first_name, last_name) VALUES ('$first', '$last')";
            mysqli_query($conn, $sql);
            echo "Inserted!";
        } else {
            echo "Please fill in both fields.";
        }

        /*
        I added a condition to check that both first name and last name
        are not empty before running the INSERT query. This prevents blank rows
        from being inserted into the database and avoids SQL errors.
        */
    }

    mysqli_close($conn);
    ?>

</body>

</html>