<?php
include '../settings/connection.php'; // Adjust the path according to your file structure
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check whether the user is a student
    $sql = "SELECT * FROM students WHERE Email='$email'";
    $result = $conn->query($sql);

    var_dump($result);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $row['psw'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['User_id'];
            $_SESSION['user_email'] = $row['Email'];
            header("Location: event_calender.php");
            exit();
        }
    }

    // Check if user is admin
    $sql2 = "SELECT * FROM admins WHERE Email='$email'";
    $result2 = $conn->query($sql2);
    var_dump($result2);
    if ($result2->num_rows > 0) {
        echo "hello";
        $row = $result2->fetch_assoc();
        var_dump($row);
        // Verify password
        echo $row['psw'];

        $new =password_hash($password,PASSWORD_DEFAULT);
        echo $new;

        $result3 = password_verify($password, $row['psw']);
var_dump($result3); // Output the result using var_dump

       
        if (password_verify($password, $row['psw'])) {
            // Password is correct, set session variables
            echo "hello2";
            $_SESSION['user_id'] = $row['admin_id'];
            $_SESSION['user_email'] = $row['Email'];
            header("Location: ../admin/dashboard.php");
            exit();
        }
    }

    // If the user is not registered as either student or admin, redirect to the register page
    //header("Location:../register.php");
    //exit();
}

$conn->close();
?>

?>
