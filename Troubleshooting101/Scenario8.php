<!DOCTYPE html>
<html>

<head>
    <title>All Student Emails</title>
</head>

<body>

    <h2>All Student Emails</h2>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    // Query all students
    $res = mysqli_query($conn, "SELECT * FROM students");

    /*
    The original code only called mysqli_fetch_assoc() once:
    $row = mysqli_fetch_assoc($res);
    echo $row['email'];

    This only retrieves the first record. We need a while loop to fetch all rows.
    */

    // Corrected code: loop through all results
    if ($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo "ID: " . $row['student_id'] . " - Email: " . $row['email'] . "<br>";
        }
    } else {
        echo "No students found.";
    }

    /*
    I added a while loop to iterate through all rows returned by the query.
    This ensures that every student's email is displayed, not just the first one.
    Also added a check with mysqli_num_rows() to handle the case when no records exist.
    */

    mysqli_close($conn);
    ?>

</body>

</html>