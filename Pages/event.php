<?php
session_start();
include("../Login/connect.php");
$isLoggedIn = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vendor Space</title>
        <link rel="stylesheet" href="../Css/event.css">
    </head>
    <body>
        <div class="banner">
            <div class="navibar">
                <img src="../img/logo.png" alt="Logo" class="Logo">
                <h3>
                    <?php
                    if ($isLoggedIn) {
                        $email = $_SESSION['email'];
                        $query = mysqli_query($conn, "SELECT * FROM user WHERE user.email='$email'");
                        if ($row = mysqli_fetch_array($query)) {
                            echo "Welcome " . $row['firstName'] . " " . $row['lastName'];
                        }
                    }
                    ?>
                </h3>
                <ul>
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="event.php">Event</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                    <?php if ($isLoggedIn): ?>
                    <button id="logoutButton">Sign Out</button>
                    <?php else: ?>
                    <a href="../Pages/Login.php">
                        <button id="loginButton">Sign In</button></a>
                    <?php endif; ?>
                    
                </ul>
            </div>
        

        <div class="container">
            <div class="category-box">
                <div class="category-title">FOOD & BEVERAGES</div>
                <a href="../Pages/F&B.php">
                    <img src="../img/f&b.jpg" alt="event 1">
                </a>
            </div>

            <div class="category-box">
                <div class="category-title">CAR BOOT SALE</div>
                <a href="../Pages/Carboot.php">
                    <img src="../img/img2.avif" alt="event 1">
                </a>
            </div>
            
            <div class="category-box">
                <div class="category-title">CONCERT FESTIVAL</div>
                <a href="../Pages/Concert.php">
                    <img src="../img/img3.jpg" alt="event 1">
                </a>
            </div>
            
            <div class="category-box">
                <div class="category-title">FASHION SHOW</div>
                <a href="../Pages/Fashion.php">
                    <img src="../img/img4.jpg" alt="event 1">
                </a>
            </div>
        </div>
    </div>
    <script src ='../Pages/Logout.js'></script>   
    </body>
</html>