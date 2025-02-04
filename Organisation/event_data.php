<?php
include("../Login/connect.php");

if (isset($_GET['id'])) {
    $eventID = $_GET['id'];
    $query = "SELECT * FROM event WHERE ID='$eventID'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    }
}
?>
