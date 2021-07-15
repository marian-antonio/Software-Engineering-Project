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
    <title>Admin - Assign Reviewers</title>
    <?php require_once "../includes/dbh.inc.php"; ?>
</head>
<body>
    <header>
        <a href="adminHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="adminHome.php">HOME</a></li>
            <li><a href="adminManage.php">MANAGE</a></li>
            <li><a href="adminReports.php">REPORTS</a></li>
            <li><a href="toAssignReviewer.php" style="background-color: white; color: black;" >ASSIGN REVIEWERS</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>

        <div class="second-nav">
            <ul class="breadcrumb">
                <li><a href="adminHome.php">Home</a></li>
                <li>Papers to Assign</li>
            </ul>
        </div>

        <div class="assign-reviewers" style="margin: 50px 100px;">
            <div class="page-content">

                <h1>Assign Reviewers</h1>
                <p>
                    Here, you can view all the papers that can be assigned to reviewers. Click the "Assign Reviewers" button
                    to select the paper in the same row, and you will be redirected to a new tab where you can assign reviewers
                    to the paper.                  
                </p>
            </div>
            <br>
            <div class="data-table">
                <table style="width: 90%; margin-left:20px">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th># of Reviewers</th>
                        <th>Assign Reviewers</th>
                    </tr>
                    <?php
                        $sql = "SELECT COUNT(review.paperID) TotalCount, paper.Title, paper.PaperID, author.FirstName, author.LastName 
                                FROM review RIGHT OUTER JOIN paper ON paper.PaperID = review.PaperID LEFT OUTER JOIN author ON paper.AuthorID = author.AuthorID
                                GROUP BY paper.Title;";

                        $result = $conn-> query($sql);

                        if($result->num_rows > 0){
                            while ($row = $result-> fetch_assoc()) : ?>
                            <tr>                               
                                <td> <?php echo $row["PaperID"];?></td> 
                                <td> <?php echo $row["Title"]; ?></td>
                                <td> <?php echo $row["FirstName"] ." ". $row["LastName"];?></td>
                                <td> <?php echo $row["TotalCount"];?></td>
                                <td>
                                    <?php
                                        if($row["TotalCount"] < 3){ ?>
                                            <form action="assignReviewers.php" method="post">
                                                <input type="hidden" name="paperID" value="<?php echo $row["PaperID"] ?>">
                                                <button name="assignReviewersButton">
                                                    Assign Reviewers
                                                </button>
                                            </form>
                                        <?php
                                        }
                                        else echo "<button title='Already has 3 reviewers assigned.' disabled> Assign Reviewers </button>";
                            echo "</td></tr>";
                            endwhile;
                        } else {
                            echo "<td> No papers have been submitted. </td>"; 
                        }?>
                </table>
            </div>
        </div>
    </main>
</body>
</html>