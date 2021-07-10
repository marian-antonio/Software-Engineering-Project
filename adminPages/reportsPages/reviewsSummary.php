<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width" , initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style.css" type="text/css">
    <title>Admin - Reviews Summary</title>
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
                    <li>Reviews Summary</li>
                </ul>
            </div>

            <div class="reports-container">
                <div class="page-content">
                    <h1>Reviews Summary</h1>
                    <p>
                        This is an auto-generated report based on the overall reviews per paper.
                    </p>
                </div>

                <div class="data-table">
                    <div class="reports">
                        <table>
                            <tr>
                                <th>Paper Title</th>
                                <th>Appropriateness of Topic</th>
                                <th>Timeliness of Topic</th>
                                <th>Supportive Evidence</th>
                                <th>Technical Quality</th>
                                <th>Scope of Coverage</th>
                                <th>Citation of Previous Work</th>
                                <th>Originality</th>
                                <th>Organization of Paper</th>
                                <th>Clarity of Main Message</th>
                                <th>Mechanics</th>
                                <th>Suitability for Presentation</th>
                                <th>Potential Interest in Topic</th>
                                <th>Overall Rating</th>
                                <th>File Name</th>
                                <th>Weighted Score</th>
                            </tr>
                            <tr>
                                <td>Paper Title</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>5.00</td>
                                <td>Filename.pdf</td>
                                <td>5.00</td>
                            </tr>
                            <?php
                            // Create connection
                            $mysqli = new mysqli('127.0.0.1:3306', 'root', 'donkeys', 'CPMS') or die($mysqli->error());
                            $sql = "SELECT  paper.Title, 
                                            review.AppropriatenessOfTopic,
                                             review.TimelinessOfTopic,
                                              review.SupportiveEvidence,
                                               review.TechnicalQuality,
                                                review.ScopeOfCoverage,
                                                 review.CitationOfPreviousWork,
                                                  review.Originality,
                                                   review.OrganizationOfPaper,
                                                    review.ClarityOfMainMessage,
                                                     review.Mechanics,
                                                      review.SuitabilityForPresentation,
                                                       review.PotentialInterestInTopic,
                                                        review.OverallRating,
                                                         paper.Filename
                                    from review 
                                    INNER JOIN paper ON paper.PaperID = review.PaperID;";
                            $result = $mysqli-> query($sql);

                            if($result->num_rows > 0){
                                while ($row = $result-> fetch_assoc()) : ?>
                            <tr>
                                <td><?php  echo $row["Title"]  ?></td>
                                <td><?php  echo $row["AppropriatenessOfTopic"]  ?></td>
                                <td><?php  echo $row["TimelinessOfTopic"]  ?></td>
                                <td><?php  echo $row["SupportiveEvidence"]  ?></td>
                                <td><?php  echo $row["TechnicalQuality"]  ?></td>
                                <td><?php  echo $row["ScopeOfCoverage"]  ?></td>
                                <td><?php  echo $row["CitationOfPreviousWork"]  ?></td>
                                <td><?php  echo $row["Originality"]  ?></td>
                                <td><?php  echo $row["OrganizationOfPaper"]  ?></td>
                                <td><?php  echo $row["ClarityOfMainMessage"]  ?></td>
                                <td><?php  echo $row["Mechanics"]  ?></td>
                                <td><?php  echo $row["SuitabilityForPresentation"]  ?></td>
                                <td><?php  echo $row["PotentialInterestInTopic"]  ?></td>

                                <td><?php  echo $row["OverallRating"]  ?></td>
                                <td><?php  echo $row["Filename"]  ?></td>

                                <td> </td>


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