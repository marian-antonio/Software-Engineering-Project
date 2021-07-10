<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width" , initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style.css" type="text/css">
    <title>Admin - Reviews Comments Repor</title>
</head>

<body>
    <header>
        <a href="../adminHome.html" class="logo">
            <img src="../../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="../adminHome.html">HOME</a></li>
            <li><a href="../adminMaintain.html">ADMIN</a></li>
            <li><a href="../adminReports.html" style="background-color: white; color: black;">
                    REPORTS</a></li>
            <li><a href="">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <main>
            <!--Main page elements here-->
            <div class="second-nav">
                <ul class="breadcrumb">
                    <li><a href="../adminHome.html">Home</a></li>
                    <li><a href="../adminReports.html">Reports</a></li>
                    <li>Reviews Comments Repor</li>
                </ul>
            </div>

            <div class="reports-container">
                <div class="page-content">
                    <h1>Reviews Comments Report</h1>
                    <p>
                        This is an auto-generated for Reviewers Comments for each Review.
                    </p>
                </div>

                <div class="data-table">
                    <div class="reports">
                        <table>
                            <tr>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Initial</th>
                                <th>Email Address</th>
                                <th>File Name</th>
                                <th>Paper Title</th>
                                <th>Content Comments</th>
                                <th>Written Document Comments</th>
                                <th>Potential For Oral Presentation Comments</th>
                                <th>Overall Rating Comments</th>
                            </tr>


                            <?php
                            // Create connection
                            $mysqli = new mysqli('127.0.0.1:3306', 'root', 'donkeys', 'CPMS') or die($mysqli->error());
                            $sql = "SELECT  reviewer.LastName, 
                                            reviewer.FirstName, 
                                            reviewer.MiddleInitial, 
                                            reviewer.EmailAddress, 
                                            paper.Filename, 
                                            paper.Title, 
                                            review.ContentComments, 
                                            review.WrittenDocumentComments, 
                                            review.PotentialForOralPresentationComments, 
                                            review.OverallRatingComments 
                                    from review 
                                    INNER JOIN paper ON paper.PaperID = review.PaperID 
                                    INNER JOIN reviewer ON reviewer.ReviewerID = review.ReviewerID;";

                            $result = $mysqli-> query($sql) or die($mysqli->error());


                            while ($row = $result-> fetch_assoc()) : ?>
                            <tr>
                                <td><?php  echo $row["LastName"]  ?></td>
                                <td><?php  echo $row["FirstName"]  ?></td>
                                <td><?php  echo $row["MiddleInitial"]  ?></td>
                                <td><?php  echo $row["EmailAddress"]  ?></td>
                                <td><?php  echo $row["Filename"]  ?></td>
                                <td><?php  echo $row["Title"]  ?></td>
                                <td><?php  echo $row["ContentComments"]  ?></td>
                                <td><?php  echo $row["WrittenDocumentComments"]  ?></td>
                                <td><?php  echo $row["PotentialForOralPresentationComments"]  ?></td>
                                <td><?php  echo $row["OverallRatingComments"]  ?></td>
                            </tr>


                            <?php
                                endwhile;
                            
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