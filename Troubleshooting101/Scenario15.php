<!DOCTYPE html>
<html>

<head>
    <title>Paginate Students</title>
</head>

<body>

    <h2>Paginate Students</h2>

    <!-- Simple Pagination Links -->
    <a href="Scenario15.php?page=0">Page 1</a> |
    <a href="Scenario15.php?page=1">Page 2</a> |
    <a href="Scenario15.php?page=2">Page 3</a>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    // Wrong code:
// $page = $_GET['page'];
// $limit = 5;
// $offset = $page * $limit;
// $sql = "SELECT * FROM students LIMIT $offset, $limit";
    
    // Corrected code with validation
    $limit = 5;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 0;

    // Restrict page to a sensible range
    if ($page < 0)
        $page = 0;
    if ($page > 1000)
        $page = 1000; // arbitrary upper limit to prevent crashes
    
    $offset = $page * $limit;
    $sql = "SELECT * FROM students LIMIT $offset, $limit";

    /*
    I validated the 'page' GET parameter by casting it to an integer and restricting
    it to a safe range. This prevents extremely large numbers from crashing MySQL.
    The pagination now safely retrieves students in chunks of $limit.
    */

    $res = mysqli_query($conn, $sql);

    if ($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo "ID: " . $row['student_id'] . " - Name: " . $row['first_name'] . " - Age: " . $row['age'] . "<br>";
        }
    } else {
        echo "No students found for this page.";
    }

    mysqli_close($conn);
    ?>

</body>

</html>