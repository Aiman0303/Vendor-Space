<?php
include '../Login/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['Event_ID']) && isset($_POST['action'])) {
        $Event_ID = $_POST['Event_ID']; // Assuming the form sends 'Event_ID' for events
        $action = $_POST['action']; // Action could be 'approve' or 'reject'

        // Map action to the correct status
        if ($action === 'approve') {
            $status = 'Approved';
        } elseif ($action === 'reject') {
            $status = 'Rejected';
        } else {
            echo "Invalid action.";
            exit;
        }

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE user SET Status=? WHERE Event_ID=?");
        $stmt->bind_param("si", $status, $Event_ID); // "si" means string and integer

        if ($stmt->execute()) {
            header("Location: registered_org.php"); // Redirect after update
            exit;
        } else {
            echo "Error updating event: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Invalid request.";
    }
} else {
    echo "Invalid request method.";
}
?>