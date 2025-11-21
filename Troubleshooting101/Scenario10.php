<!DOCTYPE html>
<html>

<head>
    <title>Search Students by Age</title>
</head>

<body>

    <h2>Search Students by Age</h2>

    <!-- HTML Form -->
    <form action="Scenario10.php" method="post">
        Age: <input type="number" name="age" min="1">
        <input type="submit" value="Search">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Wrong code:
        // $sql = "SELECT * FROM students WHERE age = $aeg"; // wrong variable
    
        // Corrected code:
        $age = isset($_POST['age']) ? intval($_POST['age']) : 0;

        /*
        I corrected the variable name from $aeg to $age to match the POST input.
        intval() ensures the age is an integer and prevents SQL injection or syntax errors.
        */

        if ($age > 0) {
            $sql = "SELECT * FROM students WHERE age = $age";
            $res = mysqli_query($conn, $sql);

            if ($res && mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "ID: " . $row['student_id'] . " - Name: " . $row['first_name'] . " - Age: " . $row['age'] . "<br>";
                }
            } else {
                echo "No students found with age $age.";
            }
        } else {
            echo "Please enter a valid age.";
        }
    }

    mysqli_close($conn);
    ?>

</body>

</html>