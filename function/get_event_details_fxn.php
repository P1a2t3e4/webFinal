<?php
// Include connection parameters
include 'settings/connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');




// Function to get all events
function getAllEvents() {
    global $conn; // Access the database connection inside the function

    // Prepare SQL statement to select all events
    $sql = "SELECT * FROM Events";

    // Execute SQL statement
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result) {
        // Fetch all rows from the result set
        $events = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $events; // Return the array of events
    } else {
        return []; // Return an empty array if there are no events or an error occurred
    }
}


?>
