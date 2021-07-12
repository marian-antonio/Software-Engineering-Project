<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) and $_SESSION["userType"] == "author"))
        header("location: ../login.php?error=invalidAccess");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Author - Home</title>
    <?php 
        include "../includes/dbh.inc.php";
        include "../includes/functions.inc.php";
        $userID = $_SESSION["userID"];
        $location = "../authorPages/editAuthorAccount.php";
        $row = userExists($conn, $userID, $location, "author");
    ?>
</head>
<body>
  
    <header>
        <a href="authorHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="authorHome.php" style="background-color: white; color: black;">HOME</a></li>
            <li><a href="submitPaper.php">SUBMIT PAPER</a></a></li>
            <li><a href="authorAccount.php">YOUR ACCOUNT</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <!--Main page elements here-->
        <div class="second-nav">
            <ul class="breadcrumb">
                <li>Home</li>
            </ul>
        </div>
        
        <div class="container">
            <div class="page-content">
                <h1>Welcome, <?php echo $row['FirstName']?>!</h1>
                <p>
                    Here, you can choose to submit your paper,
                    view your current account information, and modify your account information.
                </p>
            </div>
            <div class="actions">
                <center><h1>What would you like to do?</h1></center>
                <ul class="multiple-buttons">
                    <li><a href="submitPaper.php"><button>Submit Paper</button></a></li>
                    <li><a href="authorAccount.php"><button>View Account Details</button></a></li>
                    <li><a href="editAuthorAccount.php"><button>Edit Account Details</button></a></li>
                </ul>
            </div>
        </div>
    </main>
</body>
</html>