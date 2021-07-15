<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "admin")))
        echo "<script>alert('Unauthorized Access.'); window.location = '../login.php';</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Admin - Home</title>
</head>
<body>
    <header>
        <a href="adminHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="adminHome.php">HOME</a></li>
            <li><a href="adminManage.php">
                MANAGE</a></li>
            <li><a href="adminReports.php" style="background-color: white; color: black;">REPORTS</a></li>
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
                    <li>Reports</li>
                </ul>
            </div>
            
            <div class="container">
                <div class="page-content">
                    <h1>Reports</h1>
                    <p>
                                              
                    </p>
                </div>
                <div class="actions">
                    <center><h1>What would you like to do?</h1></center>                 
                    <ul class="multiple-buttons">
                        <li><a href="reportsPages/authorsReport.php"><button>Generate Authors Report</button></a></li>
                        <li><a href="reportsPages/reviewersReport.php"><button>Generate Reviewers Report</button></a></li>
                        <li><a href="reportsPages/commentsReport.php"><button>Generate Comments Report</button></a></li>
                        <li><a href="reportsPages/reviewsSummary.php"><button>Generate Reviews Summary Report</button></a></li>
                    </ul>
                    
                </div>
            </div>
        </main>
    </main>
</body>
</html>