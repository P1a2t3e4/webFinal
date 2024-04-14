<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
session_start();

// Include connection parameters
require_once '../settings/connection.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "fodnivpeinrgaiprngkenferf";
    // Retrieve form data
    // $event_name = $_POST['title'];
    // $event_description = $_POST['description'];
    // $event_speaker = $_POST['speaker'];
    // $event_date = $_POST['date'];
    // $event_time = $_POST['time'];
    // $event_location = $_POST['location'];

    // // Assuming you have the user ID stored in session
    // $admin_id = $_SESSION['user_id'];

    // // Prepare SQL statement using prepared statements to prevent SQL injection
    // $stmt = $conn->prepare("INSERT INTO Events (Title, Description, Speaker, Date, Time, Location, CreatedBy) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // // Bind parameters
    // $stmt->bind_param("ssssssi", $event_name, $event_description, $event_speaker, $event_date, $event_time, $event_location, $admin_id);

    // // Execute the prepared statements
    // if ($stmt->execute()) {
    //     echo "Event created successfully.";
    // } else {
    //     echo "Error: " . $stmt->error;
    // }

    // // Close the statement
    // $stmt->close();
}
?>
