<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "admin")))
        // header("location: ../login.php?error=invalidAccess");
        echo "<script>alert('Unauthorized Access. Please log in to your account first.'); window.location = '../../login.php';</script>";

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width" , initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style.css" type="text/css">
    <?php require_once "../../includes/dbh.inc.php"; ?>
    <title>Admin - Reviewers</title>
</head>

<body>
    <header>
        <a href="../adminHome.php" class="logo">
            <img src="../../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="../adminHome.php">HOME</a></li>
            <li><a href="../adminManage.php">ADMIN</a></li>
            <li><a href="../adminReports.php" style="background-color: white; color: black;">
                    REPORTS</a></li>
            <li><a href="../../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <main>
            <!--Main page elements here-->
            <div class="second-nav">
                <ul class="breadcrumb">
                    <li><a href="../adminHome.php">Home</a></li>
                    <li><a href="../adminReports.php">Reports</a></li>
                    <li>Reviewers</li>
                </ul>
            </div>

            <div class="reports-container">
                <div class="page-content">
                    <h1>Reviewers</h1>
                    <p>
                        This is an auto-generated report based on the current table of Reviewers.
                    </p>
                </div>

                <div class="data-table">
                    <div class="reports">
                        <table>
                            <tr>
                                <th>ReviewerID</th>
                                <th>First Name</th>
                                <th>MI</th>
                                <th>Last Name</th>
                                <th>Affiliation</th>
                                <th>Department</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>ZipCode</th>
                                <th>Phone</th>
                                <th>Email</th>

                            </tr>
                            <?php
                            // Create connection
                            $sql = "SELECT * from reviewer";
                            $result = $mysqli-> query($sql);

                            if($result->num_rows > 0){
                                while ($row = $result-> fetch_assoc()) : ?>
                            <tr>
                                <td><?php  echo $row["ReviewerID"]  ?></td>
                                <td><?php  echo $row["FirstName"]  ?></td>
                                <td><?php  echo $row["MiddleInitial"]  ?></td>
                                <td><?php  echo $row["LastName"]  ?></td>
                                <td><?php  echo $row["Affiliation"]  ?></td>
                                <td><?php  echo $row["Department"]  ?></td>
                                <td><?php  echo $row["Address"]  ?></td>
                                <td><?php  echo $row["City"]  ?></td>
                                <td><?php  echo $row["State"]  ?></td>
                                <td><?php  echo $row["ZipCode"]  ?></td>
                                <td><?php  echo $row["PhoneNumber"]  ?></td>
                                <td><?php  echo $row["EmailAddress"]  ?></td>

                            </tr>


                            <?php
                                endwhile;
                            }
                                $mysqli-> close();
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </main>
    </main>
</body>

</html>