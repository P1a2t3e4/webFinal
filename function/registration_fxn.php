<?php
declare(strict_types=1);

// Include connection parameters
require_once '../settings/connection.php';

/**
 * Function to check if the input fields for registration are empty
 * 
 * @param string $firstName The first name entered by the user
 * @param string $lastName The last name entered by the user
 * @param string $gender The gender selected by the user
 * @param string $email The email entered by the user
 * @param string $phoneNumber The phone number entered by the user
 * @return bool True if any input field is empty, false otherwise
 */
function is_registration_input_empty(string $firstName, string $lastName, string $gender, string $email, string $phoneNumber): bool {
    if (empty($firstName) || empty($lastName) || empty($gender) || empty($email) || empty($phoneNumber)) {
        return true;
    }
    return false;
}

/**
 * Function to validate user registration
 * 
 * @param PDO $pdo The database connection
 * @param string $firstName The first name entered by the user
 * @param string $lastName The last name entered by the user
 * @param string $gender The gender selected by the user
 * @param string $email The email entered by the user
 * @param string $phoneNumber The phone number entered by the user
 * @return bool True if registration is successful, false otherwise
 */
function register_user(PDO $pdo, string $firstName, string $lastName, string $gender, string $email, string $phoneNumber): bool {
    try {
        $stmt = $pdo->prepare("INSERT INTO Users (FirstName, LastName, Gender, Email, PhoneNumber, UserType) VALUES (?, ?, ?, ?, ?, 'Student')");
        return $stmt->execute([$firstName, $lastName, $gender, $email, $phoneNumber]);
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}

?>
