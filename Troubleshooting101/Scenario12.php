<!DOCTYPE html>
<html>

<head>
    <title>View Student by ID</title>
</head>

<body>

    <h2>View Student by ID</h2>

    <!-- HTML Form -->
    <form action="Scenario12.php" method="get">
        Student ID: <input type="number" name="id" min="1">
        <input type="submit" value="View">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if (isset($_GET['id'])) {

        // Wrong code:
        // $sql = "SELECT * FROM students WHERE id = '$id'"; // id is int
    
        // Corrected code: cast id to int and remove quotes
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM students WHERE student_id = $id"; // use actual column name
    
        /*
        I removed the quotes around the numeric ID and cast it to int using intval().
        This improves efficiency and ensures proper numeric comparison in SQL.
        Also, I replaced 'id' with 'student_id' to match the table column.
        */

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
    }

    mysqli_close($conn);
    ?>

</body>

</html>