
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Space</title>
    <link rel="stylesheet" href="../Css/Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    
</head>
<body>
    <div class="banner">
        <div class="navibar">
            <img src="../img/logo.png" alt="Logo" class="Logo">
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="event.php">Event</a></li>
                <li><a href="Contact.php">Contact</a></li>
                
            </ul>
        </div>
        <!--Sign Up-->
        <div class="container" id="SignUp" style="display:none;">
        
            <h1 class="form-title">Register</h1>
            <form method="post" action="../Login/Register.php" enctype="multipart/form-data">

                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="Fname" id="Fname" placeholder="First Name" required>
                    <label for="Fname">First Name</label>
                </div> 

                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="Lname" id="Lname" placeholder="Last Name" required>
                    <label for="Lname">Last Name</label>
                </div>

                <div class="input-group">
                    <i class="fas fa-briefcase"></i>
                    <input type="text" name="companyName" id="companyName" placeholder="Organization Name" required>
                    <label for="companyName">Organization Name</label>
                </div>

                <div class="input-group">
                    <i class="fas fa-id-badge"></i>
                    <input type="text" name="EventID" id="EventID" placeholder="Event ID" required>
                    <label for="EventID">Event ID</label>
                </div>

                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                    <label for="Email">Email Address</label>
                </div>

                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="Password" name="Password" id="Password" placeholder="Password" required>
                    <label for="Password">Password</label>
                </div>

                <div class="input-group">
                    <i class="fas fa-file"></i>
                    <input type="file" name="ssm" id="ssm" placeholder="SSM Certificate" required>
                    <label for="ssm">SSM Certificate</label>
                </div>

            <input type="submit" class="button" value="Sign Up" name="Signup">

        </form>
        <p class="or">
            ------------ Or ------------</p>
            <div class="links">
                <p>Already have organizer account?</p>
                <button id="SignInBtn">Sign In</button>
            </div>  
        </div>
</div>
    <!--Sign In-->
    
    <div class="container" id="SignIn">
    
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="../Login/Register.php">
            

           <div class="input-group">
            <i class="fas fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Email Address" required>
            <label for="Lname">Email Address</label>
           </div>

           <div class="input-group">
            <i class="fas fa-lock"></i>
            <input type="Password" name="Password" id="Password" placeholder="Password" required>
            <label for="Password">Password</label>
           </div>
           

           <input type="submit" class="button" value="Sign In" name="Signin">

        </form>
        <p class="or">------------ Or ------------</p>  

            <div class="links">
                <p>Don't have an organizer account?</p>
                <button id="SignUpBtn">Sign Up</button>
            </div> 
    </div>
    
    <script src="../Login/script.js"></script>
</body>
</html>