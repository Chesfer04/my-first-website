<!DOCTYPE html>
<html>

<head>
    <title>Save Student Email</title>
</head>

<body>

    <h2>Save Student Email</h2>

    <!-- Fixed HTML form: changed method to POST to match PHP -->
    <form method="POST" action="Scenario11.php">
        Email: <input type="email" name="email" required>
        <input type="submit" value="Save">
    </form>

    <hr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "class_db");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Wrong code:
        // $email = $_POST['email']; // would be undefined if form used GET
    
        // Corrected code:
        $email = isset($_POST['email']) ? trim($_POST['email']) : "";

        /*
        I fixed the mismatched method by changing the HTML form method from GET to POST.
        I also wrapped $_POST['email'] in isset() and trim() to prevent undefined index
        warnings and remove extra spaces from the input.
        */

        if (!empty($email)) {
            $sql = "INSERT INTO students (email) VALUES ('$email')";
            if (mysqli_query($conn, $sql)) {
                echo "Email saved successfully!";
            } else {
                echo "Error saving email: " . mysqli_error($conn);
            }
        } else {
            echo "Please enter an email.";
        }
    }

    mysqli_close($conn);
    ?>

</body>

</html>