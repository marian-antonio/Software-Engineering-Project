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
            <li>Don't have an account yet? <a href="registration.html">CREATE A NEW ACCOUNT</a></li>
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
                <div class="input-label">
                    Email
                </div>
                <input type="email" name="emailAddress" placeholder ="Email Address">
                <div class="input-label">
                    Password
                </div>                
                
                <input type="password" name="password" placeholder="Password">
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
            <a href="registration.html"><button>CREATE A NEW ACCOUNT</button></a>
        </div>
    </main>
</body>
</html>