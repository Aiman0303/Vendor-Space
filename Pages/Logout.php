<?php
session_start();
session_destroy(); // Destroy all session data
header("Location: ../Pages/Home.php"); // Redirect to homepage
exit();
?>