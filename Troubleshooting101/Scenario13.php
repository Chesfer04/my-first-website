<!DOCTYPE html>
<html>

<head>
    <title>Update Specific Student Email</title>
</head>

<body>

    <h2>Update Student Email</h2>

    <!-- HTML Form -->
    <form action="Scenario13.php" method="post">
        Student ID: <input type="number" name="id" min="1"><br><br>
        New Email: <input type="email" name="email" required><br><br>
        <input type="submit" value="Update">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $newEmail = isset($_POST['email']) ? trim($_POST['email']) : "";

        /*
        I validated the POST inputs. intval() ensures the ID is numeric.
        trim() removes extra spaces from email. This prevents errors and blank updates.
        */

        if ($id > 0 && !empty($newEmail)) {

            // Wrong code:
            // $sql = "UPDATE students SET email='$newEmail'"; // missing WHERE
    
            // Corrected code with WHERE clause
            $sql = "UPDATE students SET email='$newEmail' WHERE student_id=$id";

            if (mysqli_query($conn, $sql)) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo "Email updated successfully for student ID $id.";
                } else {
                    echo "No student found with ID $id or email already set to this value.";
                }
            } else {
                echo "Error updating email: " . mysqli_error($conn);
            }

            /*
            I added a WHERE clause using the student's ID to ensure only the specific record
            is updated. This prevents all rows from being overwritten.
            */
        } else {
            echo "Please provide a valid student ID and email.";
        }
    }

    mysqli_close($conn);
    ?>

</body>

</html>