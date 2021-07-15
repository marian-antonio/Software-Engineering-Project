<?php 
    session_start();
    if(!isset($_SESSION['forgotPassword'])){
        echo "<script>alert('Unauthorized Access.'); window.location = 'login.php';</script>";
    }
    else{
        unset($_SESSION['forgotPassword']);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/e1b93c3ea7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Password Recovery</title>
</head>
<body>
 
    <header>
        <a href="login.php" class="logo">
            <img src="images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li>Don't have an account yet? <a href="registration.php">CREATE A NEW ACCOUNT</a></li>
        </ul>
    </header>
    <main>
    <div class="login-page" style="width: 70%;">
          <h1><big>Password Recovery</big></h1>
             <h1 style="font-size: 20px;">
             Please enter your new password.
         </h1>
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
         <form action="includes/recoverPassword.inc.php" method="post">
                <div class="forgot-password" style="width: 50%; margin-left: auto; margin-right: auto;">
                <div class="input-box">
                        <label for="password">Password</label> 
                        <input type="password" name="password" placeholder="Password" required pattern="[^\s]{1,5}" 
                            title="Password should be between 1-5 characters and have no spaces." style="margin-bottom:0;">
                            <br><br>
                        <label for="confirmPassword">Confirm Password</label> 
                        <input type="password" name="confirmPassword" placeholder="Confirm Password" required pattern="[^\s]{1,5}" 
                            title="Password should be between 1-5 characters and have no spaces.">
                    </div>
                    <button type="submit" name="recoverPassword">Recover Password</button>
                    <p style="color: #16254c;padding: 10px; text-align: right; font-size: 16px;">
                        Remember your password? <a href="login.php">Click here to Log in</a>
                    </p>
                </div>
            </form>
    </div>
    </main>
</body>
</html>