<?php
include 'connection.php';

// Fetch job listings from the database
$sql = "SELECT * FROM Jobs WHERE Status='Open'";
$result = $conn->query($sql);

$jobListings = array();

if ($result->num_rows > 0) {
    // Fetch and store job listings in an array
    while ($row = $result->fetch_assoc()) {
        $jobListings[] = array(
            'id' => $row['JobID'],
            'title' => $row['Title'],
            'department' => $row['Department'],
            'type' => $row['Type']
        );
    }
}

// Return job listings as JSON response
header('Content-Type: application/json');
echo json_encode($jobListings);

$conn->close();
?>
