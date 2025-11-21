<!DOCTYPE html>
<html>

<head>
    <title>Update Student Email</title>
</head>

<body>

    <h2>Update Student Email</h2>

    <!-- HTML Form -->
    <form action="Scenario7.php" method="post">
        Student ID: <input type="number" name="id" min="1"><br><br>
        New Email: <input type="text" name="email"><br><br>
        <input type="submit" value="Update">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Validate POST inputs
        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $email = isset($_POST['email']) ? trim($_POST['email']) : "";

        /*
        I validated the POST inputs. intval() ensures $id is an integer.
        trim() removes extra spaces from the email. This prevents undefined index
        warnings and ensures the variables are properly set before using them.
        */

        if ($id > 0 && !empty($email)) {
            // Wrong code:
            // $sql = "UPDATE students SET email=$email WHERE id=$id";
    
            // Corrected code with quotes around email and error checking
            $sql = "UPDATE students SET email='$email' WHERE student_id=$id";

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
            I added quotes around the email value in the SQL query to prevent syntax errors.
            I also added error checking: mysqli_query() is checked for failure, and mysqli_affected_rows()
            ensures that the update actually changed a row. This prevents the script from incorrectly
            printing "Updated!" if the query fails.
            */
        } else {
            echo "Please provide a valid student ID and email.";
        }
    }

    mysqli_close($conn);
    ?>

</body>

</html>