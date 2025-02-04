<?php
session_start();
include("../Login/connect.php");
$isLoggedIn = isset($_SESSION['email']);
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Space</title>
    <link rel="stylesheet" href="../Css/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
                <li><a href="Organizer.php">Home</a></li>
                <li><a href="eventOrg.php">Event</a></li>
                <li><a href="profileOrg.php">Profile</a></li>
                <?php if ($isLoggedIn): ?>
                    <button id="logoutButton">Sign Out</button>
                <?php else: ?>
                    <a href="../Pages/Login.php"><button id="loginButton">Sign In</button></a>
                <?php endif; ?>
            </ul>
        </div>

        <div class="Home">
            <div>
                <a href="../Pages/Create.php">
                    <button type="button" onclick="createEvent()">CREATE EVENT</button></a>

                <a href="eventOrg.php">
                    <button type="button" onclick="createEvent()">FIND EVENT</button></a>
            </div>

            <h1>UPCOMING EVENT</h1>
        </div>
        <div class="slider">
            <div class="slides active">
                <img src="../img/1.png" alt="Event 1">
            </div>
            <div class="slides">
                <img src="../img/2.png" alt="Event 2">
            </div>
            <div class="slides">
                <img src="../img/3.avif" alt="Event 3">
            </div>
            <!-- Add more slides as needed -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
            <script src="../Home/upcoming.js"></script>
        </div>

        <!--best event-->
        <div class="best-event">
            <h1>BEST EVENT</h1>

            <div class="polaroid-container">
                <div class="polaroid">
                    <img src="../img/img4.png" alt="Image 1">
                    <p>Food Festival</p>
                </div>
                <div class="polaroid">
                    <img src="../img/img5.png" alt="Image 2">
                    <p>Food Mania</p>
                </div>
                <div class="polaroid">
                    <img src="../img/img6.png" alt="Image 3">
                    <p>KL Fashion Week (KLFW)</p>
                </div>
                <div class="polaroid">
                    <img src="../img/sneakerlah.jpg" alt="Image 3">
                    <p>Sneakerlah 2024</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="wrapper">
                <div class="wrapper-holder">
                    <div id="slider-img-1"></div>
                    <div id="slider-img-2"></div>
                    <div id="slider-img-3"></div>
                    <div id="slider-img-4"></div>
                </div>
            </div>
            <div class="wrapper-container">         
                <div class="wrapper-2">
                    <div class="wrapper-holder-2">
                        <a href="eventOrg.php" id="slider-img-5"></a>
                    </div>
                </div>
    
                <div class="wrapper-3">
                    <div class="wrapper-holder-3">
                        <div id="slider-img-6"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--footer!-->
        <footer>
            <div class="main">
                <div class="footer-align">
                    <p>&copy; 2025 Vendor Space. All rights reserved.</p>
                    <div class="social-media">

                        <a href="https://www.instagram.com/amnnhkl/" target="_blank" aria-label="Instagram">
                        <i class="fab fa-instagram"></i></a>

                        <a href="https://www.tiktok.com/@aimanhaikall" target="_blank" aria-label="TikTok">
                        <i class="fab fa-tiktok"></i></a>

                    </div>
                </div>
            </div>
    </div>        
        </footer>

    <script src ='../Pages/Logout.js'></script>
</body>
</html>
