<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "admin")))
        echo "<script>alert('Unauthorized Access.'); window.location = '../login.php';</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <li><a href="adminHome.php" style="background-color: white; color: black;">HOME</a></li>
            <li><a href="adminManage.php">MANAGE</a></li>
            <li><a href="adminReports.php">REPORTS</a></li>
            <li><a href="toAssignReviewer.php">ASSIGN REVIEWERS</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <main>
            <div class="second-nav">
                <ul class="breadcrumb">
                    <li>Home</li>
                </ul>
            </div>
            
            <div class="container">
                <div class="page-content">
                    <h1>Welcome, Admin!</h1>
                    <p>
                        Here, you can generate reports on the author, reviewers, and their reviews.
                        You can also assign reviewers to papers and enable or disable paper and review submissions.
                        The manage buttons allow you to add, modify, or delete data from the corresponding data tables.
                    </p>
                </div>
                <div class="actions">
                    <center><h1>What would you like to do?</h1></center>                 
                    <ul class="multiple-buttons">
                        <li><a href="adminReports.php"><button>Generate Reports</button></a></li>
                        <li><a href="adminManage.php"><button>Manage Tables</button></a></li>
                        <li><a href="toAssignReviewer.php"><button>Assign Reviewers</button></a></li>
                        <li><a href="submissionControl.php"><button>Enable/Disable Submissions</button></a></li>
                    </ul>
                </div>
            </div>
        </main>
    </main>
</body>
</html>