<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "admin")))
        echo "<script>alert('Unauthorized Access.'); window.location = '../../login.php';</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Admin - Manage</title>
</head>
<body>
    <header>
        <a href="adminHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="adminHome.php">HOME</a></li>
            <li><a href="adminManage.php" style="background-color: white; color: black;">
                MANAGE</a></li>
            <li><a href="adminReports.php">REPORTS</a></li>
            <li><a href="toAssignReviewer.php">ASSIGN REVIEWERS</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <main>
            <!--Main page elements here-->
            <div class="second-nav">
                <ul class="breadcrumb">
                    <li><a href="adminHome.php">Home</a></li>
                    <li>Manage</li>
                </ul>
            </div>
            
            <div class="container">
                <div class="page-content">
                    <h1>Welcome, Admin!</h1>
                    <p>
                        
                    </p>
                </div>
                <div class="actions">
                    <center><h1>What would you like to do?</h1></center>                 
                    <ul class="multiple-buttons">
                        <li><a href="managePages\manageAuthor.php"><button>Manage Authors</button></a></li>
                        <li><a href="managePages\manageReviewers.php"><button>Manage Reviewers</button></a></li>
                        <li><a href="managePages\managePapers.php"><button>Manage Papers</button></a></li>
                        <li><a href="managePages\manageReviews.php"><button>Manage Reviews </button></a></li>
                    </ul>
                </div>
            </div>
        </main>
    </main>
</body>
</html>