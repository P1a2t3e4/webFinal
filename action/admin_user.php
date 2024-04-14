<?php
// Include the database connection file
include_once "../settings/connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phone_number"];
    $adminName = $_POST["admin_name"];
    $department = $_POST["department"];
    $password = $_POST["password"]; // Remember to hash the password before storing it in the database

    // Insert data into the Users table
    $sql = "INSERT INTO Users (FirstName, LastName, Gender, Email, PhoneNumber, UserType, RegistrationDate, PasswordHash, AdminName, Department) 
            VALUES ('$firstName', '$lastName', '$gender', '$email', '$phoneNumber', 'Admin', NOW(), '$password', '$adminName', '$department')";
    
    if (mysqli_query($conn, $sql)) {
        // Registration successful
        echo "Admin registration successful!";
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
