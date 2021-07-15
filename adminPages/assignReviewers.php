<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "admin") && isset($_POST["assignReviewersButton"])))
        echo "<script>alert('Unauthorized Access.'); window.location = 'toAssignReviewer.php';</script>";
    $paperID = $_POST['paperID'];
?>
    
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Admin - Assign Reviewers</title>
    <?php 
        require_once "../includes/dbh.inc.php"; 
        require_once '../includes/functions.inc.php';
        $location = "assignReviewers.php";
    ?>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
            <li><a href="toAssignReviewer.php" style="background-color: white; color: black;">ASSIGN REVIEWERS</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>

    <div class="second-nav">
        <ul class="breadcrumb">
            <li><a href="adminHome.php">Home</a></li>
            <li><a href="toAssignReviewer.php">Papers to Assign</a></li>
            <li>Assign Reviewers</li>
        </ul>
    </div>
    <form action="../includes/assignReviewer.inc.php" method="post">
    <div class="outside-container">
        <div class="page-content">
            <h1>Assign Reviewers</h1>
            <p>
                Here, you can assign up to three reviewers for each paper.
                In the first section, you will see the details of the paper,
                including the author's name and the topics that they listed.
                In the second section, you will be able to select up to three (3)
                reviewers for the paper by clicking the checkbox under the 'Assign'
                column. The checkboxes will be clickable until you have selected
                your three reviewers, but you can always deselect the checkbox if you would like to
                select a different reviewer. Once you are done, click the 'Submit' button
                at the bottom of the page and you will be redirected back to the 'Papers to Assign' page.
            </p>
            <br>  
        </div>


        <div class="paper-reviewer-info">
            <div class="paper-information">
                <?php 
                    $sql = "SELECT paper.*, author.FirstName, author.LastName FROM paper JOIN author WHERE paper.PaperID=$paperID and paper.AuthorID = author.AuthorID;";
                    $result = $conn-> query($sql);
                    $row = $result-> fetch_assoc();
                ?>
                <div class="account-details">
                    <h1> Paper Details </h1>
                    <table>
                        <tr><th></th> <th></th></tr>
                        <tr>
                            <td>Paper ID</td>
                            <td><?php echo $row["PaperID"]; ?></td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td><?php echo $row["FirstName"] . " " . $row["LastName"]; ?></td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><?php echo $row["Title"]; ?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">Relevant Topics</td>  
                            <td>
                                <?php
                                    $topicsArray = array("AnalysisOfAlgorithms", "Applications", "Architecture", "ArtificialIntelligence", 
                                        "ComputerEngineering", "Curriculum", "DataStructures", "DatabasesColumn", "DistanceLearning",
                                        "DistributedSystems", "EthicalSocietalIssues", "FirstYearComputing", "GenderIssues", "GrantWriting", 
                                        "GraphicsImageProcessing", "HumanComputerInteraction", "LaboratoryEnvironments", "Literacy", 
                                        "MathematicsInComputing", "Multimedia", "NetworkingDataCommunications", "NonMajorCourses", 
                                        "ObjectOrientedIssues", "OperatingSystems","ParallelsProcessing", "Pedagogy", "ProgrammingLanguages", 
                                        "Research", "Security", "SoftwareEngineering","SystemsAnalysisAndDesign", "UsingTechnologyInTheClassroom", 
                                        "WebAndInternetProgramming", "OtherDescription");

                                    foreach($topicsArray as $topic){
                                        if($row[$topic] == 1 || $topic == "OtherDescription"){
                                            if($row[$topic] == NULL || $row[$topic] == " "){
                                                continue;
                                            }
                                            $topic = preg_replace('/(?<!\ )[A-Z]/', ' $0', $topic);
                                            echo "<ul id=\"preferred-topics\"> 
                                                    <li style=\"margin: 5px;\">
                                                        {$topic}
                                                    </li>
                                                </ul>";
                                        }
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <input type="hidden" name="paperID" value=<?php echo $row["PaperID"]?>>
                </div>
            </div>



            <div class="reviewer-selection">
                <h1 style="margin: 20px 0;">List of Reviewers</h1>
                <p style="font-size: 20px; text-align: justify;">
                    This table shows all the reviewers that are currently registered to review papers.
                    It contains information about the reviewer's preferred topics and the current number 
                    of papers assigned for them to review.
                    Select up to three candidates then click the 'submit' at the bottom.            
                </p>
                <br>  
                <div class="data-table">
                    
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Preferred Topics</th>
                            <th>No. Papers Assigned</th>
                            <th>Assign</th>
                        </tr>
                        <?php
                            $sql = "SELECT COUNT(review.reviewerID) TotalCount, review.ReviewID, reviewer.*
                                    FROM review RIGHT OUTER JOIN reviewer ON reviewer.ReviewerID = review.ReviewerID GROUP BY reviewer.reviewerID;";

                            $result = $conn-> query($sql);
                            if($result->num_rows > 0){
                                while ($row = $result-> fetch_assoc()) : ?>
                                <tr>                               
                                    <td> <?php echo $row["ReviewerID"];?></td> 
                                    <td> <?php echo $row["FirstName"] ." ". $row["LastName"];?></td>
                                    <td>
                                        <?php
                                        $topicsArray = array("AnalysisOfAlgorithms", "Applications", "Architecture", "ArtificialIntelligence", 
                                        "ComputerEngineering", "Curriculum", "DataStructures", "DatabasesColumn", "DistancedLearning",
                                        "DistributedSystems", "EthicalSocietalIssues", "FirstYearComputing", "GenderIssues", "GrantWriting", 
                                        "GraphicsImageProcessing", "HumanComputerInteraction", "LaboratoryEnvironments", "Literacy", 
                                        "MathematicsInComputing", "Multimedia", "NetworkingDataCommunications", "NonMajorCourses", 
                                        "ObjectOrientedIssues", "OperatingSystems","ParallelProcessing", "Pedagogy", "ProgrammingLanguages", 
                                        "Research", "Security", "SoftwareEngineering","SystemsAnalysisAndDesign", "UsingTechnologyInTheClassroom", 
                                        "WebAndInternetProgramming", "OtherDescription");

                                        $temp_i = 1;
                                        foreach($topicsArray as $topic){
                                            if($row[$topic] == 1 || $topic == "OtherDescription"){
                                                if($row[$topic] == NULL){
                                                    continue;
                                                }
                                                $topic = preg_replace('/(?<!\ )[A-Z]/', ' $0', $topic);
                                                echo (($temp_i == 1 )?  " " . $topic : ", " . $topic);
                                                $temp_i -= 1;
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td> <?php echo $row["TotalCount"];?></td>
                                    <td>
                                        <input type="hidden" name="reviewerID" value="<?php echo $row["ReviewerID"]; ?>">
                                        <input type="checkbox" name="selectedReviewers" value="<?php echo $row["ReviewerID"]; ?>">
                                    </td>
                            <?php
                                echo "</td></tr>";
                                endwhile;
                            } else {
                                echo "<td> No reviewers available. </td>"; 
                            }?>
                    </table>
                    <p class="reviewerLabel" hidden></p>
                    <p><input name="reviewerIDs" type="hidden" id="reviewerIDs"></p>
                    <button type="submit" name="assignReviewersSubmit">Submit</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    </main>
    <script>
        var checkCount = 0;
        var maxChecks = 3;
        $(document).ready(function() {
            $(':checkbox[name=selectedReviewers]').change(function(){
                checkCount = $(':checked').length;
                if (checkCount >= maxChecks)
                    $(':checkbox[name=selectedReviewers]').not(':checked').attr('disabled', true);
                else
                    $(':checkbox[name=selectedReviewers]:disabled').attr('disabled', false);
                if (this.checked)
                    $("p.reviewerLabel").append('<reviewerLabel>' + this.value + ' </reviewerLabel>');
                else
                    $("p.reviewerLabel").find(':contains(' + this.value + ')').remove();
                $('input[name="reviewerIDs"]').val($("p.reviewerLabel").text());
            });
        });
    </script>
</body>
</html>