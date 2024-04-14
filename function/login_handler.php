<?php
// Include connection parameters
require_once '../settings/connection.php';

// Function to validate login credentials
function validateLogin($email, $password) {
    global $pdo;

    try {
        // Prepare SQL statement to fetch user data
        $stmt = $pdo->prepare("SELECT UserID, PasswordHash FROM Users WHERE Email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify password
            if (password_verify($password, $user['PasswordHash'])) {
                // Password is correct, return user ID
                return $user['UserID'];
            }
        }

        // Invalid credentials
        return false;
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        // Input fields are empty
        echo "Please fill in all fields!";
        exit();
    }

    // Validate email format and domain
    $validDomain = '/@ashesi\.edu\.gh$/';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match($validDomain, $email)) {
        echo "Please enter a valid email address with the domain '@ashesi.edu.gh'";
        exit();
    }

    // Validate login credentials
    $userID = validateLogin($email, $password);
    if ($userID) {
        // Login successful, redirect to dashboard or homepage
        session_start();
        $_SESSION['user_id'] = $userID;
        header('Location: ../view/home.php');
        exit();
    } else {
        // Invalid credentials
        echo "Invalid email or password!";
        exit();
    }
}
?>
