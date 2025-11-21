<!DOCTYPE html>
<html>

<head>
    <title>View Student Details</title>
</head>

<body>

    <h2>View Student Details</h2>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    // Wrong code:
// $id = $_POST['id']; // link sends GET, not POST
    
    // Corrected code:
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    /*
    I replaced $_POST with $_GET because the link uses a GET parameter.
    intval() ensures the ID is treated as an integer to prevent malicious input.
    This prevents "Undefined index" errors and safely retrieves the student.
    */

    if ($id > 0) {
        $sql = "SELECT * FROM students WHERE student_id = $id";
        $res = mysqli_query($conn, $sql);

        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            echo "ID: " . $row['student_id'] . "<br>";
            echo "Name: " . $row['first_name'] . " " . $row['last_name'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "Age: " . $row['age'] . "<br>";
        } else {
            echo "No student found with ID $id.";
        }
    } else {
        echo "No student ID provided.";
    }

    mysqli_close($conn);
    ?>

</body>

</html>