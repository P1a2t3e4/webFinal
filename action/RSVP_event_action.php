<?php
session_start();
require_once '../settings/connection.php';

/**
 * Function to handle event RSVP
 * 
 * @param PDO $pdo The database connection
 * @param int $event_id The ID of the event
 * @param int $user_id The ID of the user
 * @param string $status The RSVP status ('going' or 'not going')
 * @return bool True if RSVP is successful, false otherwise
 */
function rsvp_event(PDO $pdo, int $event_id, int $user_id, string $status): bool {
    try {
        $stmt = $pdo->prepare("INSERT INTO Registrations (EventID, UserID, Status) VALUES (?, ?, ?)");
        return $stmt->execute([$event_id, $user_id, $status]);
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : null;
    $user_id = $_SESSION['user_id'];
    $status = isset($_GET['status']) ? $_GET['status'] : null; // going or not going 

    if ($event_id !== null && $status !== null && rsvp_event($pdo, $event_id, $user_id, $status)) {
        header('Location: ../view/home.php');
        exit();
    } else {
        echo "Error";
    }
}
?>
