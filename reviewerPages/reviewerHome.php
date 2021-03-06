<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "reviewer")))
        echo "<script>alert('Unauthorized Access.'); window.location = '../login.php';</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Reviewer - Home</title>
    <?php 
        include "../includes/dbh.inc.php";
        include "../includes/functions.inc.php";

        $deadlineQuery = "SELECT * FROM defaults;";
        $result = $conn-> query($deadlineQuery);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()) :
                if($row["EnabledReviewers"] == 0)
                    $_SESSION["submissionOff"] = TRUE;
            endwhile;
        }


        $userID = $_SESSION["userID"];
        $location = "../reviewerPages/reviewerAccount.php";
        $row = userExists($conn, $userID, $location, "reviewer");
    ?>
</head>
<body>
  
    <header>
        <a href="reviewerHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="reviewerHome.php" style="background-color: white; color: black;">
                HOME</a></li>
            <?php if(!isset($_SESSION["submissionOff"])){
                echo "<li><a href=\"toReview.php\">REVIEW A PAPER</a></a></li>";
            }?>
            <li><a href="reviewerAccount.php">YOUR ACCOUNT</a></li>
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
                    <h1>Welcome, <?php echo $row['FirstName']?>!</h1>
                    <p>
                    <?php if(!isset($_SESSION["submissionOff"])){
                        echo "Here, you can choose to download and review papers that were automatically assigned to you,
                        view your current account information, and modify your account information."; 
                    }
                    elseif(isset($_SESSION["submissionOff"])){
                        echo "Submissions are now closed. However, you may still view or modify your current account information";
                    }?>
                        
                    </p>
                </div>
                <div class="actions">
                    <center><h1>What would you like to do?</h1></center>
                    <ul class="multiple-buttons">
                        <?php if(!isset($_SESSION["submissionOff"])){
                            echo "<li><a href=\"toReview.php\"><button>Download and Review Papers</button></a></li>";  
                        } else{
                            echo "<li><a><button disabled style=\"background-color: grey; color: black;\"
                            title=\"Submissions are now closed.\"> 
                            Download and Review Papers </button></a></li>";
                        } ?>
                        <li><a href="reviewerAccount.php"><button>View Account Details</button></a></li>
                        <li><a href="editReviewerAccount.php"><button>Edit Account Details</button></a></li>
                    </ul>
                </div>
            </div>
        </main>
    </main>
</body>
</html>