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
    <title>Registration</title>
</head>
<body>
    <header>
        <a href="login.php" class="logo">
            <img src="images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li>Already have an account? <a href="login.php">CLICK HERE TO LOG IN</a></li>
        </ul>
    </header>

    <main>
        <div class="registration-buttons-container">
            <h1>Would you like to register to be an Author or a Reviewer?</h1>
            <p>
                Registering as an <b>author</b> will allow you to submit your paper to the Annual Conference that is occuring next Fall.
                Registering as a <b>reviewer</b> will allow you to review the aforementioned papers.
                (NOTE: If you would like to be an author AND a reviewer, you will need to register for each role separately.) 

            </p>
            <ul class="registration-buttons">
                <li><a href="authorRegistration.php"><button>AUTHOR</button></a></li>
                <li><a href="reviewerRegistration.php"><button>REVIEWER</button></a></li>
            </ul>
        </div>

    </main>

</body>