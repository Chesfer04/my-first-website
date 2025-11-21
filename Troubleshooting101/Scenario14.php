<!DOCTYPE html>
<html>

<head>
    <title>Insert New Student</title>
</head>

<body>

    <h2>Insert New Student</h2>

    <!-- HTML Form -->
    <form action="Scenario14.php" method="post">
        First Name: <input type="text" name="first_name"><br><br>
        Last Name: <input type="text" name="last_name"><br><br>
        Email: <input type="email" name="email"><br><br>
        <input type="submit" value="Insert">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Wrong code:
        // $data = $_POST;
        // $sql = "INSERT INTO students (first_name, last_name, email)
        // VALUES ($data[first_name], $data[last_name], $data[email])";
    
        // Corrected code:
        $first = isset($_POST['first_name']) ? trim($_POST['first_name']) : "";
        $last = isset($_POST['last_name']) ? trim($_POST['last_name']) : "";
        $email = isset($_POST['email']) ? trim($_POST['email']) : "";

        /*
        I corrected the array indexing by accessing $_POST with proper keys:
        $_POST['first_name'], $_POST['last_name'], $_POST['email'].
        I also wrapped values in quotes to prevent SQL syntax errors and used trim()
        to remove extra spaces.
        */

        if (!empty($first) && !empty($last) && !empty($email)) {
            $sql = "INSERT INTO students (first_name, last_name, email)
                VALUES ('$first', '$last', '$email')";

            if (mysqli_query($conn, $sql)) {
                echo "Student inserted successfully!";
            } else {
                echo "Error inserting student: " . mysqli_error($conn);
            }
        } else {
            echo "Please fill in all fields.";
        }
    }

    mysqli_close($conn);
    ?>

</body>

</html>