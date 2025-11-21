<!DOCTYPE html>
<html>

<head>
    <title>Search Student by Email</title>
</head>

<body>

    <h2>Search Student by Email</h2>

    <!-- HTML Form -->
    <form action="Scenario5.php" method="post">
        Email: <input type="text" name="email">
        <input type="submit" value="Search">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Wrong code:
        // $email = $_POST['emial']; // misspelled
    
        // Corrected code:
        $email = isset($_POST['email']) ? trim($_POST['email']) : "";

        /*
        I fixed the typo by changing 'emial' to 'email', which matches the form field name.
        I also added isset() to check if the POST value exists and trim() to remove extra spaces.
        This prevents the "Undefined index" error and ensures $email is properly set before using it in the SQL query.
        */

        if (!empty($email)) {
            $sql = "SELECT * FROM students WHERE email='$email'";
            $res = mysqli_query($conn, $sql);

            if ($res && mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "ID: " . $row['student_id'] . " - Name: " . $row['first_name'] . " - Email: " . $row['email'] . "<br>";
                }
            } else {
                echo "No student found with email '$email'.";
            }
        } else {
            echo "Please enter an email.";
        }
    }

    mysqli_close($conn);
    ?>

</body>

</html>