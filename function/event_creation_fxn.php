<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

// Include connection parameters
require_once '../settings/connection.php';

// Function to create a new event
function createEvent($title, $description, $speaker, $date, $time, $location, $registrationDeadline, $maxCapacity, $createdBy) {
    global $pdo;

    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO Events (Title, Description, Speaker, Date, Time, Location, RegistrationDeadline, MaxCapacity, CreatedBy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind parameters
        $stmt->execute([$title, $description, $speaker, $date, $time, $location, $registrationDeadline, $maxCapacity, $createdBy]);

        // Check if the event was created successfully
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// Function to check if input fields for creating an event are empty
function isInputEmpty($event_name, $event_date, $event_time, $event_location, $event_description, $event_image) {
    if (empty($event_name) || empty($event_date) || empty($event_time) || empty($event_location) || empty($event_description) || empty($event_image)) {
        return true;
    }
    return false;
}

// Function to check if there is a scheduling conflict with an existing event
function isEventConflict($pdo, $event_date, $event_time) {
    // Implement your logic here to check for conflicts
}

// Function to insert event into the database
function createEventWithChecks($event_name, $event_date, $event_time, $event_location, $event_description, $event_image) {
    global $pdo;

    // Check if input fields are empty
    if (isInputEmpty($event_name, $event_date, $event_time, $event_location, $event_description, $event_image)) {
        $_SESSION['errors_create_event'] = "Please fill in all fields!";
        header('Location: ../view/home.php');
        exit();
    }

    // Check for event conflicts
    if (isEventConflict($pdo, $event_date, $event_time)) {
        // Handle conflict
    }

    // Create the event
    if (createEvent($event_name, $event_description, '', $event_date, $event_time, $event_location, '', 0, 0)) {
        $_SESSION['success_create_event'] = "Event created successfully";
    } else {
        $_SESSION['errors_create_event'] = "Error creating event";
    }

    // Redirect to home page
    header('Location: ../view/home.php');
    exit();
}
?>
