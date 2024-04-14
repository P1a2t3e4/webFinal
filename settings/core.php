<?php
// Include the database connection file
include 'connection.php';

// Function to create a new event
function createEvent($title, $description, $speaker, $date, $time, $location, $registrationDeadline, $maxCapacity, $createdBy) {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO Events (Title, Description, Speaker, Date, Time, Location, RegistrationDeadline, MaxCapacity, CreatedBy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssi", $title, $description, $speaker, $date, $time, $location, $registrationDeadline, $maxCapacity, $createdBy);

    // Execute the statement
    if ($stmt->execute()) {
        return $conn->insert_id; // Return the ID of the newly created event
    } else {
        return false; // Return false if the insertion fails
    }
}

// Function to retrieve event details by ID
function getEventById($eventId) {
    global $conn;

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM Events WHERE EventID = ?");
    $stmt->bind_param("i", $eventId);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the row
    $event = $result->fetch_assoc();

    return $event;
}



?>
