<?php
// Include connection parameters
require_once '../settings/connection.php';

/**
 * Function to check if the input fields for registration are empty
 * 
 * @param string $username The username entered by the user
 * @param string $email The email entered by the user
 * @param string $password The password entered by the user
 * @return bool True if any input field is empty, false otherwise
 */
function is_registration_input_empty(string $username, string $email, string $password): bool {
    if (empty($username) || empty($email) || empty($password)) {
        return true;
    }
    return false;
}

/**
 * Function to check if the username is already taken
 * 
 * @param PDO $pdo The database connection
 * @param string $username The username entered by the user
 * @return bool True if the username is already taken, false otherwise
 */
function is_username_taken(PDO $pdo, string $username): bool {
    $stmt = $pdo->prepare("SELECT UserID FROM Users WHERE Username = ?");
    $stmt->execute([$username]);
    return $stmt->fetch() !== false;
}

/**
 * Function to check if the email is already registered
 * 
 * @param PDO $pdo The database connection
 * @param string $email The email entered by the user
 * @return bool True if the email is already registered, false otherwise
 */
function is_email_registered(PDO $pdo, string $email): bool {
    $stmt = $pdo->prepare("SELECT UserID FROM Users WHERE Email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch() !== false;
}

/**
 * Function to validate user registration
 * 
 * @param PDO $pdo The database connection
 * @param string $username The username entered by the user
 * @param string $email The email entered by the user
 * @param string $password The password entered by the user
 * @return bool True if registration is successful, false otherwise
 */
function register_user(PDO $pdo, string $username, string $email, string $password): bool {
    try {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO Users (Username, Email, PasswordHash, UserType) VALUES (?, ?, ?, 'Student')");
        return $stmt->execute([$username, $email, $hashed_password]);
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}

/**
 * Function to validate login credentials
 * 
 * @param PDO $pdo The database connection
 * @param string $email The email entered by the user
 * @param string $password The password entered by the user
 * @return int|bool Returns the user ID if login is successful, false otherwise
 */
function validate_login(PDO $pdo, string $email, string $password) {
    try {
        $stmt = $pdo->prepare("SELECT UserID, PasswordHash FROM Users WHERE Email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['PasswordHash'])) {
            return $user['UserID'];
        }

        return false;
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>
