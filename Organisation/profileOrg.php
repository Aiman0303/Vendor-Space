<?php
session_start();
include("../Login/connect.php");
$isLoggedIn = isset($_SESSION['email']);
$EventID = $_SESSION['EventID'];

// Initialize event counts
$categories = ['F&B', 'Carboot', 'Concert', 'Fashion'];
$eventCounts = array_fill_keys($categories, 0);

foreach ($categories as $category) {
    $query = "SELECT COUNT(*) as count FROM event WHERE category='$category' AND Event_ID='$EventID'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $eventCounts[$category] = $row['count'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Space</title>
    <link rel="stylesheet" href="../Css/profileOrg.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
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

        <main class="main-container">
            <div class="main-title"><h1>TOTAL EVENT</h1></div>
            <div class="main-cards">
                <?php 
                
                $iconMapping = [
                    'f&b' => 'fastfood',       
                    'carboot' => 'directions_car', 
                    'concert' => 'music_note', 
                    'fashion' => 'checkroom',  
                ];

                foreach ($eventCounts as $category => $count): 
                    $icon = $iconMapping[strtolower($category)] ?? 'event';?>
                    <div class="card">
                        <div class="card-inner">
                            <h3><?php echo strtoupper($category); ?> EVENT</h3>
                            <span class="material-icons-outlined"><?php echo $icon; ?></span>
                        </div>
                        <h1><?php echo $count; ?></h1>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>



        <div class="content-event">
            <div class="recent-event">
                <h2>EVENT DASHBOARD</h2>
                
                <table>
                    <tr> 
                        <th>Name</th>
                        <th>Location</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Time Start</th>
                        <th>Time End</th>
                        <th>Price</th>
                        <th>Contact</th>
                        <th>Category</th>
                        <th>Social Media</th>
                        <th>Option</th>
                    </tr>
                    <?php
                        $query = "SELECT * FROM event WHERE Event_ID='$EventID'";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                        <td>{$row['event_name']}</td>
                                        <td>{$row['event_location']}</td>
                                        <td>{$row['date']}</td>
                                        <td>{$row['date_end']}</td>
                                        <td>{$row['event_start']}</td>
                                        <td>{$row['event_end']}</td>
                                        <td>{$row['price']}</td>
                                        <td>{$row['contact']}</td>
                                        <td>{$row['category']}</td>
                                        <td>{$row['Social_media']}</td>
                                        <td>
                                            <button onclick=\"openEditModal('{$row['ID']}')\" class='btn'>Edit</button>
                                            <button onclick=\"openDeleteModal('{$row['ID']}')\" class='btn'>Delete</button>
                                        </td>
                                    </tr>";
                        }
                    ?>

                </table>
            </div>
        </div>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Event</h2>
            <form id="editForm" action="update_event.php" method="POST">
                <input type="hidden" id="ID" name="ID">
                
                <label for="event_name">Event Name:</label>
                <input type="text" id="event_name" name="event_name"><br>
                
                <label for="event_location">Event Location:</label>
                <input type="text" id="event_location" name="event_location"><br>
                
                <label for="date">Start Date:</label>
                <input type="date" id="date" name="date"><br>
                
                <label for="date_end">End Date:</label>
                <input type="date" id="date_end" name="date_end"><br>
                
                <label for="event_start">Start Time:</label>
                <input type="time" id="event_start" name="event_start"><br>
                
                <label for="event_end">End Time:</label>
                <input type="time" id="event_end" name="event_end"><br>
                
                <label for="price">Price:</label>
                <input type="number" id="price" name="price"><br>
                
                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact"><br>
                
                <label for="category">Category:</label>
                <select id="category" name="category">
                <option value="F&B">Food and Baverage</option>
                    <option value="Carboot">Car Booth Sale</option>
                    <option value="Concert">Concert</option>
                    <option value="Fashion">Fashion</option>
                </select><br>
                
                <label for="Social_media">Social Media:</label>
                <input type="text" id="Social_media" name="Social_media"><br>
                
                <button type="submit">Update Event</button>
            </form>

        </div>
    </div>

    <script src='event.js'></script>
    <script src ='../Pages/Logout.js'></script>
    
</body>
</html>
