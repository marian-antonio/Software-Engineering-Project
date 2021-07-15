<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "reviewer")))
        echo "<script>alert('Unauthorized Access.'); window.location = '../login.php';</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once "../includes/dbh.inc.php";
        $reviewerID = $_SESSION["userID"];
    ?>
    <script src="https://kit.fontawesome.com/e1b93c3ea7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Reviewer - Reviews Dashboard</title>
</head>
<body>
  
    <header>
        <a href="reviewerHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="reviewerHome.php">HOME</a></li>
            <li><a href="toReview.php" style="background-color: white; color: black;">
                REVIEW A PAPER</a></li>
            <li><a href="reviewerAccount.php">YOUR ACCOUNT</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <main>
            <!--Main page elements here-->
            <div class="second-nav">
                <ul class="breadcrumb">
                    <li><a href="reviewerHome.php">Home</a></li>
                    <li>Reviews Dashboard</li>
                </ul>
            </div>
            
            <div class="container">
                <div class="page-content">
                    <h1>Papers to review</h1>
                    <p>
                        Note: To download papers, click on the links in the "File Download" column.
                        There are also links in the "Review Form" column that will redirect you to a new page
                        that will allow you to review each paper.
                    </p><br>
                </div>
                <div class="data-table">
                    <table>
                        <tr>
                            <th>#</th>
                            <th>Author</th>
                            <th>Paper Title</th>
                            <th>Topics</th>
                            <th>Author Notes</th>
                            <th>File Download</th>
                            <th>Review Form</th>
                            <th>Completed</th>
                        </tr>

                        <?php
                            $sql = "SELECT * FROM review LEFT OUTER JOIN paper ON review.PaperID = paper.PaperID LEFT
                                JOIN author ON paper.AuthorID = author.AuthorID WHERE review.ReviewerID = $reviewerID;";

                            $result = $conn-> query($sql);
                            $num = 0;
                            if($result->num_rows > 0){
                                while ($row = $result-> fetch_assoc()) : 
                                    $num++;
                        ?>      
                                <tr>                               
                                    <td> <?php echo $num; ?> </td> 
                                    <td> <?php echo $row["FirstName"] ." ". $row["LastName"];?></td>
                                    <td> <?php echo $row["Title"]; ?> </td>
                                    <td> <?php echo $row["Title"];?> </td>
                                    <td> <?php echo stripslashes($row["NotesToReviewers"]);?> </td>
                                    <td> 
                                        <?php 
                                            echo 
                                            "<a href=\"../includes/downloadFile.inc.php?fileName=".$row["Filename"]."\">
                                                <i class=\"fas fa-file-download\"></i> ".$row["Filename"];
                                        ?>
                                        </a>
                                    </td>
                                    <td> 
                                        <?php
                                            if($row["Complete"] == 0){
                                                echo "<a href=\"reviewPage.php?id=".$row["ReviewID"]."\">
                                                    <i class=\"fas fa-external-link-alt\"></i> Review Form #".$num." </a></td>";
                                            } else{
                                                echo "Review Form #".$num;
                                            }
                                        ?></td>
                                    <td> <?php echo ($row["Complete"] == 1 ? "Yes":"No");?> </td>
                                </tr>

                            <?php
                                endwhile;
                            } else {
                                echo "<td> No papers have been assigned to you yet. </td>";}       
                            ?>
                    </table>
                </div>
            </div>
        </main>
    </main>
</body>
</html>