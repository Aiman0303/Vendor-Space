<?php
session_start();
include '../Login/connect.php';

// Check if the user is logged in
if (!isset($_SESSION['EventID'])) {
    echo "<script>alert('You must log in first.')</script>";
    header("Location: ../Pages/Login.php"); // Redirect to login page
    exit;
}

$EventID = $_SESSION['EventID']; // Retrieve EventID from session

if (isset($_POST['submit'])) {
    // Retrieve other form values
    $eventname = $_POST['eventname'];
    $eventlocation = $_POST['eventlocation'];
    $eventdate = $_POST['eventdate'];
    $eventstart = $_POST['eventstart'];
    $eventend = $_POST['eventend'];
    $price = $_POST['price'];
    $contact = $_POST['contact'];
    $category = $_POST['categories'];
    $dateEnd = $_POST['dateEnd'];
    $instagram = $_POST['instagram'];

    // Handle file upload
    $upload_dir = "../Event/image/";
    $product_image = $upload_dir . $_FILES["poster"]["name"];
    $upload_file = $upload_dir . basename($_FILES["poster"]["name"]);
    $imageType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));
    $check = $_FILES["poster"]["size"];
    $upload_ok = 0;

    if (file_exists($upload_file)) {
        echo "<script>alert('The file already exists.')</script>";
        $upload_ok = 0;
    } else {
        $upload_ok = 1;
        if ($check !== false) {
            $upload_ok = 1;
            if (in_array($imageType, ['jpg', 'jpeg', 'png'])) {
                $upload_ok = 1;
            } else {
                echo '<script>alert("Please change the image format.")</script>';
                $upload_ok = 0;
            }
        } else {
            echo '<script>alert("The photo size is 0. Please change the photo.")</script>';
            $upload_ok = 0;
        }
    }

    if ($upload_ok == 0) {
        echo '<script>alert("Sorry, your file didn\'t upload. Please try again.")</script>';
    } else {
        move_uploaded_file($_FILES["poster"]["tmp_name"], $upload_file);

        // Insert into database
        $sql = "INSERT INTO event (event_name, event_location, date, date_end, event_start, event_end, price, contact, category, Social_media, Event_ID, poster)
                VALUES ('$eventname', '$eventlocation', '$eventdate', '$dateEnd', '$eventstart', '$eventend', '$price', '$contact', '$category', '$instagram', '$EventID', '$product_image')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Your event was uploaded successfully.')</script>";
            header("Location: ../Pages/create.php");
        } else {
            echo "<script>alert('Error: " . $conn->error . "')</script>";
        }
    }
}
?>

