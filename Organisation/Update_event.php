<?php
include("../Login/connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventID = $_POST['ID']; // Get the ID from the form
    $event_name = $_POST['event_name'];
    $event_location = $_POST['event_location'];
    $date = $_POST['date'];
    $date_end = $_POST['date_end'];
    $event_start = $_POST['event_start'];
    $event_end = $_POST['event_end'];
    $price = $_POST['price'];
    $contact = $_POST['contact'];
    $category = $_POST['category'];
    $social_media = $_POST['Social_media'];

    $query = "UPDATE event SET 
                event_name='$event_name',
                event_location='$event_location',
                date='$date',
                date_end='$date_end',
                event_start='$event_start',
                event_end='$event_end',
                price='$price',
                contact='$contact',
                category='$category',
                Social_media='$social_media'
                WHERE ID='$eventID'";

    if (mysqli_query($conn, $query)) {
        header("Location: profileOrg.php"); 
    } else {
        echo "Error updating event: " . mysqli_error($conn);
    }
}
?>
