<?php
include 'connection.php';

// Fetch events from the database based on category
$category = $_GET['category']; // Get the selected category from the frontend

// Prepare SQL query based on the selected category
if ($category === 'all') {
    $sql = "SELECT * FROM Events";
} else {
    $sql = "SELECT * FROM Events INNER JOIN EventCategories ON Events.EventID = EventCategories.EventID INNER JOIN Categories ON EventCategories.CategoryID = Categories.CategoryID WHERE Categories.Name = '$category'";
}

$result = $conn->query($sql);

$events = array();

if ($result->num_rows > 0) {
    // Fetch and store events in an array
    while ($row = $result->fetch_assoc()) {
        $events[] = array(
            'id' => $row['EventID'],
            'title' => $row['Title'],
            'description' => $row['Description'],
            'date' => $row['Date'],
            'time' => $row['Time'],
            'location' => $row['Location'],
            'category' => $row['Name'], // Category name
            'imageUrl' => 'event_image_placeholder.jpeg' // Replace with actual image URL from database if available
        );
    }
}

// Return events as JSON response
header('Content-Type: application/json');
echo json_encode($events);

$conn->close();
?>
