<?php 
    session_start();
    if(isset($_SESSION["userID"])){
        echo "<script>alert('Unauthorized Access.'); window.location = 'login.php';</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <script src="https://kit.fontawesome.com/e1b93c3ea7.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Password Recovery</title>
</head>
<body>
  
    <header>
        <a href="login.php" class="logo">
            <img src="images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="login.php">LOG IN</a></li>
            <li><a href="registration.php">CREATE A NEW ACCOUNT</a></li>
        </ul>
    </header>
    <main>
        <!--Main page elements here-->
        <div class="login-page" style="width: 70%;">
            <h1><big>Password Recovery</big></h1>
            <!-- shows errors -->
            <?php
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(strpos($fullUrl, "error=input")==true){
                    echo "<h3 style='color: red; text-align: center;'>" . "Please fix following errors:" . "</h3> <br>";

                    foreach ($_SESSION['error'] as $key=>$value){
                        echo "<ul id=\"input-errors\"> 
                            <li style='color: red; margin: 5px 30px;'> {$value} </li>
                        </ul>";
                    }
                }
                elseif(strpos($fullUrl, "error=unknown")==true)
                    echo "<h3 style='color: red; text-align: center;'>" . "Unknown Error" . "</h3> <br>";
                ?>
            <h1 style="font-size: 20px;">
                Please enter your email, your phone number, select your account type, and click 'Recover Password'. We will send your password to your email.
            </h1>
            <form action="includes/forgotPassword.inc.php" method="post">
                <div class="forgot-password" style="width: 50%; margin-left: auto; margin-right: auto;">
                 <label for="email">Email</label> 
                    <input type="email" id="email" name="emailAddress" placeholder="Enter Email Address" style="text-align: center;">
                    <div class="input-box">
                        <label for="phone">Phone Number</label> 
                        <input type="text" id="phone" name="phoneNumber" placeholder="Format: 123-456-7890" required
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Phone number must follow the format: 123-456-7890">
                    </div>
                    <div class="account-type">
                        <h2>Select Account Type:</h2>
                        <input type="radio" id="author" name="accountType" value="author">
                        <label for="author">Author</label>
                        <input type="radio" id="reviewer" name="accountType" value="reviewer">
                        <label for="reviewer">Reviewer</label>
                        <input type="radio" id="admin" name="accountType" value="admin">
                        <label for="admin">Admin</label>
                    </div>
                    <button type="submit" name="forgotPassword">Recover Password</button>
                    <p style="color: #16254c;padding: 10px; text-align: right; font-size: 16px;">
                        Remember your password? <a href="login.php">Click here to Log in</a>
                    </p>
                </div>
            </form>
        </div>
    </main>
</body>
</html>