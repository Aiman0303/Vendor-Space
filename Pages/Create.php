<?php
session_start();
include("../Login/connect.php");
$isLoggedIn = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Space</title>
    <link rel="stylesheet" href="../Css/Create.css">
</head>
<body>
    <div class="banner">
        <div class="navibar">
            <img src="../img/logo.png" alt="Logo" class="Logo">
            <h1>
                <?php
                if ($isLoggedIn) {
                    $email = $_SESSION['email'];
                    $query = mysqli_query($conn, "SELECT * FROM user WHERE user.email='$email'");
                    if ($row = mysqli_fetch_array($query)) {
                        echo "Welcome " . $row['Org_name'];
                    }
                }
                ?>
            </h1>
            <ul>
                <li><a href="../Organisation/Organizer.php">Home</a></li>
                <li><a href="../Organisation/eventOrg.php">Event</a></li>
                <li><a href="../Organisation/profileOrg.php">Profile</a></li>
                <?php if ($isLoggedIn): ?>
                    <button id="logoutButton">Sign Out</button>
                <?php else: ?>
                    <a href="../Pages/Login.php">
                        <button id="loginButton">Sign In</button></a>
                <?php endif; ?>
            </ul>
        </div>
        
        <div id="upload_container">
            <form action="../Event/register.php" method="POST" enctype="multipart/form-data">
                <label for="eventname">Event Name:</label>
                <input type="text" name="eventname" id="eventname" placeholder="Event Name" required>
        
                <label for="eventlocation">Event Location:</label>
                <input type="text" name="eventlocation" id="eventlocation" placeholder="Event Location" required>
        
                <label for="date">Event start Date:</label>
                <input type="date" name="eventdate" id="eventdate" required>

                <label for="date">Event end Date:</label>
                <input type="date" name="dateEnd" id="dateEnd" required>
        
                <label for="eventstart">Event Start Time:</label>
                <input type="time" name="eventstart" id="eventstart" required>
        
                <label for="eventend">Event End Time:</label>
                <input type="time" name="eventend" id="eventend" required>
        
                <label for="price">Price/Day (RM):</label>
                <input type="number" name="price" id="price" placeholder="Price/day">
        
                <label for="contact">Contact Number:</label>
                <input type="tel" name="contact" id="contact" placeholder="Contact No" required pattern="[0-9]{10,15}" title="Enter a valid phone number">

                <label for="instagram">Social media:</label>
                <input type="text" name="instagram" id="instagram" placeholder="Social media Instagram">


                <label for="cat">Categories:</label>
                <select id="cat" name="categories">
                    <option value="F&B">Food and Baverage</option>
                    <option value="Carboot">Car Booth Sale</option>
                    <option value="Concert">Concert</option>
                    <option value="Fashion">Fashion</option>
                </select>

                <label for="imageUpload">Poster Image:</label>
                <input type="file" name="poster" id="poster" required>
        
                <input type="submit" value="Upload" name="submit">
            </form>

        </div>
    </div>
    <script src ='../Pages/Logout.js'></script> 
</body>
</html>
