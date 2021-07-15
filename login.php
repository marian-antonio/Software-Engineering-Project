<?php 
    session_start();
    if(isset($_SESSION["userID"])){
        if ($_SESSION["userType"] == "author")
            header("location: ../authorPages/authorHome.php");
        elseif ($_SESSION["userType"] == "reviewer")
            header("location: ../reviewerPages/reviewerHome.php");
        elseif ($_SESSION["userType"] == "admin")
            header("location: ../adminPages/adminHome.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/e1b93c3ea7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Log in</title>
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
        <div class="login-page">
            <h1>Log In to Your Account</h1>
            <p style="text-align: justify;">If you have already created an account for your specific role, enter your email and password,
                select your account type, and then click the 'Log In' button. 
                <br><br>
                If you need to create an account as an author or a reviewer, click the 'Create a New Account' button at the bottom of the page.
                <br>
                <br>
                <?php
                    if (isset($_GET["registration"])){
                        if ($_GET["registration"] == "success"){
                            echo "<h3 style='color: red; text-align: center;'>" . "Registration successful. Log in to proceed." . "</h3> <br>";
                        }
                    }
                ?>
            </p>
            <form action="includes/login.inc.php" method="post">
                <!-- Shows errors and successful registration/password recovery -->
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

                    elseif(strpos($fullUrl, "reviewerRegistration=success")==true)
                        echo "<h3 style='color: green; text-align: center;'>" . "Reviewer Account Created, Please Log In" . "</h3> <br>";
                    
                    elseif(strpos($fullUrl, "authorRegistration=success")==true)
                        echo "<h3 style='color: green; text-align: center;'>" . "Author Account Created, Please Log In" . "</h3> <br>";

                    elseif(strpos($fullUrl, "recoverPassword=success")==true)
                        echo "<h3 style='color: green; text-align: center;'>" . "Password successfully reset" . "</h3> <br>";

                    elseif(strpos($fullUrl, "error=invalidCredentials")==true)
                        echo "<h3 style='color: red; text-align: center;'>" . "Credentials are incorrect" . "</h3> <br>";
                    elseif(strpos($fullUrl, "error=selectType")==true)
                        echo "<h3 style='color: red; text-align: center;'>" . "Please select the account type you are logging in as." . "</h3> <br>";
                
                ?>

                <div class="input-label"> Email </div>
                <input type="email" name="emailAddress" placeholder ="Email Address" required pattern=".+\.[a-zA-Z]+"
                    title="Please enter a valid email address.">

                <div class="input-label"> Password </div>                
                <input type="password" name="password" placeholder="Password" required pattern="[^\s]+"
                    title="Password must not contain spaces.">
                
                <p><a href="forgotPassword.php">Forgot Password? Click here to retrieve it.</a></p>

                <div class="account-type">
                    <h2>Select what are logging in as:</h2>
                    <input type="radio" id="author" name="accountType" value="author">
                    <label for="author">Author</label>
                    <input type="radio" id="reviewer" name="accountType" value="reviewer">
                    <label for="reviewer">Reviewer</label>
                    <input type="radio" id="admin" name="accountType" value="admin">
                    <label for="admin">Admin</label>
                </div>
                <p style="text-align: justify;">
                    (NOTE: If you would like to be an author AND a reviewer, you will need to register for each role separately)
                </p>
                <button type="submit" name="loginButton">LOG IN</button>
                <hr>    
            </form>
            <h1>Don't have an account yet?</h1>
            <a href="registration.php"><button>CREATE A NEW ACCOUNT</button></a>
        </div>
    </main>
</body>
</html>