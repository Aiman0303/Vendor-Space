<?php 
include '../Login/connect.php';

if (isset($_POST['Signup'])) {
    // Retrieve form data
    $firstName = $_POST['Fname'];
    $lastName = $_POST['Lname'];
    $Organisation = $_POST['companyName'];
    $EventID = $_POST['EventID'];
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $password = md5($password);

    // save uploaded files
    $targetDir = "../Login/SSM/";

   
    if (isset($_FILES['ssm']) && $_FILES['ssm']['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($_FILES['ssm']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowedTypes = array('pdf', 'doc', 'docx', 'jpg', 'png');

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['ssm']['tmp_name'], $targetFilePath)) {
                $checkEmail = "SELECT * FROM user WHERE Event_ID = '$EventID' AND email = '$email'";
                $result = $conn->query($checkEmail);

                if ($result->num_rows > 0) {
                    echo "Email Address Already Exists!";
                } else {
                    $insertQuery = "INSERT INTO user (firstName, lastName, Org_name, Event_ID, email, password, ssm) 
                                    VALUES ('$firstName', '$lastName', '$Organisation', '$EventID', '$email', '$password', '$fileName')";
                    if ($conn->query($insertQuery) === TRUE) {
                        header("Location: ../Pages/Login.php");
                    } else {
                        echo "Your Email or Event ID already registered ";
                    }
                }
            } else {
                echo "Failed to move uploaded file. Please try again.";
            }
        } else {
            echo "Invalid file format. Allowed formats: PDF, DOC, DOCX, JPG, PNG.";
        }
    } else {
        
        if (isset($_FILES['ssm']['error'])) {
            echo "File upload error: " . $_FILES['ssm']['error'];
        } else {
            echo "No file uploaded.";
        }
    }
}

// Sign-in logic
if (isset($_POST['Signin'])) {
    $email = $_POST['email'];
    $password = $_POST['Password'];
    $password = md5($password); // Encrypt password

    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        if ($row['Status'] === 'Approved') {
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['EventID'] = $row['Event_ID'];
            header("Location: ../Organisation/Organizer.php");
            exit();
        } elseif ($row['Status'] === 'Pending') {
            echo "Your account is still pending approval.";
        } else { 
            echo "Your account has been rejected. Please contact support.";
        }
    } else {
        echo "Incorrect password. Please try again";
    }
}
?>
