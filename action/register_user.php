<?php
include 'connection.php'; // Include the connection file

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $userType = mysqli_real_escape_string($conn, $_POST['userType']);

    // Validate input fields
    $errors = [];

    if (empty($username) || empty($email) || empty($password)) {
        $errors["empty_input"] = "Please fill in all fields!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["invalid_email"] = "Please enter a valid email!";
    }

    // Check if username is taken
    $sql = "SELECT * FROM Users WHERE Username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $errors["username_taken"] = "Username already taken!";
    }

    // Check if email is already registered
    $sql = "SELECT * FROM Users WHERE Email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $errors["email_registered"] = "Email already registered!";
    }

    // If there are errors, redirect back to register page with errors
    if ($errors) {
        $_SESSION['errors_register'] = $errors;
        header('Location: ../view/register.php');
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO Users (Username, PasswordHash, Email, UserType) VALUES ('$username', '$hashed_password', '$email', '$userType')";
    if ($conn->query($sql) === TRUE) {
        // Registration successful
        $_SESSION['registration_success'] = true;
        header("Location: register_success.php");
        exit();
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header('Location: ../view/register.php');
    exit();
}
$conn->close();
?>
