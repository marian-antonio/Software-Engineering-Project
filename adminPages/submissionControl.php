
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
    <title>Admin - Toggle Submissions</title>
    <?php require_once "../includes/dbh.inc.php";
        require_once "../includes/functions.inc.php";?>
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
        <div class="second-nav">
            <ul class="breadcrumb">
                <li><a href="adminHome.php">HOME</a></li>
                <li>TOGGLE SUBMISSIONS</li>
            </ul>
        </div>
        
        <div class="container">
            <div class="page-content">
                <h1>Enable/Disable Submissions</h1>
                <p>
                    Here, you can set if authors can still submit papers
                    or if reviewers can still review papers.                    
                </p>
            </div>

            <form action="../includes/enableDisableSubmissions.inc.php" method="post" id="reviewForm">
            <div class="data-table">
                <div class="reports">
                    
                    <table style="width: 50%; margin: 5% 25%;">
                        <tr>
                            <th>Type</th>
                            <th>ON</th>
                            <th>OFF</th>
                        </tr>
                        <?php
                    
                            $sql = "SELECT * from defaults";
                            $result = $mysqli-> query($sql);
                            if($result->num_rows > 0){
                                while ($row = $result-> fetch_assoc()) :
                                    $paperValue = $row['EnabledAuthors'];
                                    $reviewValue = $row['EnabledReviewers'];
                        ?>

                            <tr>
                                <td>Papers Submissions</td>
                                <td style="width: max-content;">
                                    <input type="radio" id="paperToggleOn" name="paperToggle" value="1"
                                        <?php echo isChecked($paperValue);  // bit 1 ?>>
                                    <label for="paperToggleOn" style="display: inline-block;">ON</label>
                                </td>
                                <td style="width: max-content;">
                                    <input type="radio" id="paperToggleOFF" name="paperToggle" value="0"
                                        <?php echo isChecked(!$paperValue); // opposite of bit 1?>>
                                    <label for="paperToggleOFF" style="display: inline-block;">OFF</label>
                                </td>
                                

                            </tr>
                            <tr>
                                <td>Review Submissions</td>
                                <td style="width: max-content;">
                                    <input type="radio" id="reviewToggleOn" name="reviewToggle" value="1"
                                        <?php echo isChecked($reviewValue); // bit 1?>>
                                    <label for="reviewToggleOn" style="display: inline-block;">ON</label>
                                </td>
                                <td style="width: max-content;">
                                    <input type="radio" id="reviewToggleOFF" name="reviewToggle" value="0"
                                        <?php echo isChecked(!$reviewValue); // opposite of bit 1 ?>>
                                    <label for="reviewToggleOFF" style="display: inline-block;">OFF</label>
                                </td>
                            </tr>
                        <?php
                                endwhile;
                            }
                            $mysqli-> close();
                        ?>

                    </table>
                    <div class="submit-button"><button type="submit" name="submitToggleResult">Save</button></div>
                </div>
            </div>
        </form>
        </div>
    </main>
    <script></script>
</body>
</html>