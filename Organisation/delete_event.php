<?php
include("../Login/connect.php");

if (isset($_GET['id'])) {
    $eventID = $_GET['id']; // Get the ID of the event to delete

    // Delete query
    $query = "DELETE FROM event WHERE ID='$eventID'";

    if (mysqli_query($conn, $query)) {
        echo json_encode(['success' => true]); // Return success if deletion is successful
    } else {
        echo json_encode(['success' => false]); // Return failure message if deletion fails
    }
}
?>
