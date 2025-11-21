<!DOCTYPE html>
<html>

<head>
    <title>Delete Student</title>
</head>

<body>

    <h2>Delete Student by ID</h2>

    <!-- HTML Form -->
    <form action="Scenario6.php" method="get">
        Student ID: <input type="number" name="id" min="1">
        <input type="submit" value="Delete">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if (isset($_GET['id'])) {

        // Wrong code:
        // $sql = "DELETE FROM students WHERE id = " . $_GET['id'];
        // mysqli_query($conn, $sql);
    
        // Corrected code using the actual column name 'student_id'
        $student_id = intval($_GET['id']); // convert input to integer to prevent SQL injection
        $sql = "DELETE FROM students WHERE student_id = $student_id";
        if (mysqli_query($conn, $sql)) {
            echo "Student with ID $student_id deleted successfully.";
        } else {
            echo "Error deleting student: " . mysqli_error($conn);
        }

        /*
        I replaced 'id' with the correct column name 'student_id' from the database.
        intval() ensures the input is a valid integer, preventing malicious input like '0 OR 1=1'.
        This safely deletes only the student with the specified ID.
        */
    }

    mysqli_close($conn);
    ?>

</body>

</html>