<?php
// Include database connection
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
        $query = 'INSERT INTO rsvps (event_id, user_id, status) VALUES (:event_id, :user_id, :status)';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':event_id', $event_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    } catch (PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>
