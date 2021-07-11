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
            <li><a href="registration.html">CREATE A NEW ACCOUNT</a></li>
        </ul>
    </header>
    <main>
        <!--Main page elements here-->
        <div class="login-page" style="width: 70%;">
            <h1><big>Password Recovery</big></h1>
            <h1 style="font-size: 20px;">
                Please enter your email, select your account type, and click 'Recover Password'. We will send your password to your email.
            </h1>
            <div class="forgot-password" style="width: 40%; margin-left: auto; margin-right: auto;">
                <input type="email" id="email" name="emailAddress" placeholder="Enter Email Address" style="text-align: center;">
                <div class="account-type">
                    <h2>Select Account Type:</h2>
                    <input type="radio" id="author" name="accountType" value="author">
                    <label for="author">Author</label>
                    <input type="radio" id="reviewer" name="accountType" value="reviewer">
                    <label for="reviewer">Reviewer</label>
                    <input type="radio" id="admin" name="accountType" value="admin">
                    <label for="admin">Admin</label>
                </div>
                <button type="submit">Recover Password</button>
                <p style="color: #16254c;padding: 10px; text-align: right; font-size: 16px;">
                    Remember your password? <a href="login.php">Click here to Log in</a>
                </p>
            </div>
        </div>
    </main>
</body>
</html>