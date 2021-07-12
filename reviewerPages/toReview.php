<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) and $_SESSION["userType"] == "reviewer"))
        header("location: ../login.php?error=invalidAccess");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width", initial-scale=1">
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
                </div>
                <div class="data-table">
                    <table>
                        <tr>
                            <th>Review #</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Paper Title</th>
                            <th>Topics</th>
                            <th>File Download</th>
                            <th>Review Form</th>
                            <th>Completed</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>AuthorFirst1</td>
                            <td>AuthorLast1</td>
                            <td>Title1</td>
                            <td>Topic1.1, Topic1.2, Topic 1.3</td>
                            <td><a href="reviewPage.php">Paper#76.pdf</a></td>
                            <td><a href="reviewPage.php" target="_blank">Form #1</a></td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>AuthorFirst2</td>
                            <td>AuthorLast2</td>
                            <td>Title2</td>
                            <td>Topic2.1, Topic2.2, Topic 2.3</td>
                            <td><a href="reviewPage.php">Paper#24.pdf</a></td>
                            <td><a href="reviewPage.php" target="_blank">Form #2</a></td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>AuthorFirst3</td>
                            <td>AuthorLast3</td>
                            <td>Title3</td>
                            <td>Topic3.1, Topic3.2, Topic 3.3</td>
                            <td><a href="reviewPage.php">Paper#83.pdf</a></td>
                            <td><a href="reviewPage.php" target="_blank">Form #3</a></td>
                            <td>No</td>
                        </tr>
                        <p>
                            Note: To download papers, click on the links in the "File Download" column.
                            There are also links in the "Review Form" column that will redirect you to a new page
                            that will allow you to review each paper.
                        </p><br>
                    </table>
                </div>
            </div>
        </main>
    </main>
</body>
</html>