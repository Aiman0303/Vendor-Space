<?php
session_start();
include("../Login/connect.php");
$isLoggedIn = isset($_SESSION['email']);

$sql = "SELECT * FROM event WHERE category='F&B'";
$all_event=$conn->query($sql);
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Space</title>
    <link rel="stylesheet" href="../Css/Fashion.css">
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
        <?php while($row = mysqli_fetch_assoc($all_event)){ ?>            
            <div class="container">
                <img src="<?php echo $row["poster"]; ?>" alt="Event Poster for <?php echo $row["event_name"]; ?>" class="image">
                <div class="info">
                    <div class="title"><?php echo $row["event_name"]; ?></div>
                    <div class="location"><b>Location: </b><?php echo $row["event_location"]; ?></div>
                    <div class="date"><b>Date: </b><?php echo $row["date"]; ?></div>
                    <div class="time"><b>From: </b><?php echo $row["event_start"]; ?> to <?php echo $row["event_end"]; ?></div>
                    <div class="price"><b>Price: RM </b><?php echo $row["price"]; ?> /day</div>
                </div>

                <div class="wrapper">
                    <a href="https://wa.me/<?php echo $row["contact"]; ?>" class="button" target="_blank" rel="noopener noreferrer">
                        <div class="icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <span>WhatsApp</span>
                    </a>
                    
                    <a href="https://instagram.com/<?php echo $row["Social_media"];?>" class="button" target="_blank" rel="noopener noreferrer">
                        <div class="icon">
                            <i class="fab fa-instagram"></i> 
                        </div>
                        <span>Instagram</span>
                    </a>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
    <script src ='../Pages/Logout.js'></script>               
</body>
</html>