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
        <link rel="stylesheet" href="../Css/Contact.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

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

            <div class="contact-container">
                <form action="https://api.web3forms.com/submit" method="POST" class="contact-left">
                    <div class="contact-left-title">
                        <h2>Contact Us Here</h2>
                        <hr>
                    </div>
                        <input type="hidden" name="access_key" value="5eb6a59f-de8c-411f-a98f-075c1c51fe76">
                        <input type="text" name="name" placeholder="Your Name" class="contact-inputs" required>
                        <input type="email" name="name" placeholder="Your Email" class="contact-inputs" required>
                        <textarea name="message" placeholder="Your Message" class="contact-inputs" required></textarea>
                        <button type="submit">Submit <img src="img/arrow_icon.png" alt=""></button>
                </form>
                <div class="contact-right">

                <div class="contact-right">
                    <div class="Contact-detail">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <p>+6016-289 4746</p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <p>aimanhaikal312@gmail.com</p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-location"></i>
                            <p>195A, Jln Tun Razak, Hampshire Park, 50400 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p> 
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        <script src ='../Pages/Logout.js'></script>  
    </body>
</html>