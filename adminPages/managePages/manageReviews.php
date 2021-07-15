<!DOCTYPE html>
<html>
<?php
   
    session_start();

    // Create connection
    include "../../includes/dbh.inc.php";
    include "../../includes/functions.inc.php";
    
    //Initialize variables
    $row2=null;

// Adds data to table
if(isset($_POST["save"])){

    $ReviewID = $_POST["ReviewID"];
    $PaperID = $_POST["PaperID"];
    $ReviewerID = $_POST["ReviewerID"];
    $AppropriatenessOfTopic = $_POST["appropriatenessOfTopic"];
    $TimelinessOfTopic = $_POST["timelinessOfTopic"];
    $SupportiveEvidence = $_POST["supportiveEvidence"];
    $TechnicalQuality = $_POST["technicalQuality"];
    $ScopeOfCoverage = $_POST["scopeOfCoverage"];

    $CitationOfPreviousWork = $_POST["citationOfPreviousWork"];
    $Originality = $_POST["originality"];
    $ContentComments = $_POST["contentComments"];
    $OrganizationOfPaper = $_POST["organizationOfPaper"];
    $ClarityOfMainMessage = $_POST["clarityOfMessage"];
    $Mechanics = $_POST["mechanics"];
    $WrittenDocumentComments = $_POST["writtenDocumentComments"];
    $SuitabilityForPresentation = $_POST["suitabilityForPresentation"];
    $PotentialInterestInTopic = $_POST["potentialInterestInTopic"];
    $PotentialForOralPresentationComments = $_POST["potentialForOralPresentationComments"];
    $OverallRating = $_POST["overallRating"];
    $OverallRatingComments = $_POST["overallRatingComments"];
    $ComfortLevelTopic = $_POST["ComfortLevelTopic"];
    $ComfortLevelAcceptability = $_POST["ComfortLevelAcceptability"];
    $Complete = $_POST["Complete"];


    $sql = "INSERT INTO `cpms`.`review`(
                        `ReviewID`,
                        `PaperID`,
                        `ReviewerID`,
                        `AppropriatenessOfTopic`,
                        `TimelinessOfTopic`,
                        `SupportiveEvidence`,
                        `TechnicalQuality`,
                        `ScopeOfCoverage`,
                        `CitationOfPreviousWork`,
                        `Originality`,
                        `ContentComments`,
                        `OrganizationOfPaper`,
                        `ClarityOfMainMessage`,
                        `Mechanics`,
                        `WrittenDocumentComments`,
                        `SuitabilityForPresentation`,
                        `PotentialInterestInTopic`,
                        `PotentialForOralPresentationComments`,
                        `OverallRating`,
                        `OverallRatingComments`,
                        `ComfortLevelTopic`,
                        `ComfortLevelAcceptability`,
                        `Complete`)
                        VALUES (
                        '$ReviewID',
                        '$PaperID',
                        '$ReviewerID',
                        '$AppropriatenessOfTopic',
                        '$TimelinessOfTopic',
                        '$SupportiveEvidence',
                        '$TechnicalQuality',
                        '$ScopeOfCoverage',
                        '$CitationOfPreviousWork',
                        '$Originality',
                        '$ContentComments',
                        '$OrganizationOfPaper',
                        '$ClarityOfMainMessage',
                        '$Mechanics',
                        '$WrittenDocumentComments',
                        '$SuitabilityForPresentation',
                        '$PotentialInterestInTopic',
                        '$PotentialForOralPresentationComments',
                        '$OverallRating',
                        '$OverallRatingComments',
                        '$ComfortLevelTopic',
                        '$ComfortLevelAcceptability',
                        '$Complete');";

    $result = $mysqli->query($sql) or die($mysqli->error());


    $_SESSION["message"] = "Record has been saved!";
    $_SESSION["msg_type"] = "success";

}


//Updates table with new data
if(isset($_POST["update"])){

    $ReviewID = $_POST["ReviewID"];
    $PaperID = $_POST["PaperID"];
    $ReviewerID = $_POST["ReviewerID"];
    $AppropriatenessOfTopic = $_POST["appropriatenessOfTopic"];
    $TimelinessOfTopic = $_POST["timelinessOfTopic"];
    $SupportiveEvidence = $_POST["supportiveEvidence"];
    $TechnicalQuality = $_POST["technicalQuality"];
    $ScopeOfCoverage = $_POST["scopeOfCoverage"];

    $CitationOfPreviousWork = $_POST["citationOfPreviousWork"];
    $Originality = $_POST["originality"];
    $ContentComments = $_POST["contentComments"];
    $OrganizationOfPaper = $_POST["organizationOfPaper"];
    $ClarityOfMainMessage = $_POST["clarityOfMessage"];
    $Mechanics = $_POST["mechanics"];
    $WrittenDocumentComments = $_POST["writtenDocumentComments"];
    $SuitabilityForPresentation = $_POST["suitabilityForPresentation"];
    $PotentialInterestInTopic = $_POST["potentialInterestInTopic"];
    $PotentialForOralPresentationComments = $_POST["potentialForOralPresentationComments"];
    $OverallRating = $_POST["overallRating"];
    $OverallRatingComments = $_POST["overallRatingComments"];
    $ComfortLevelTopic = $_POST["ComfortLevelTopic"];
    $ComfortLevelAcceptability = $_POST["ComfortLevelAcceptability"];
    $Complete = $_POST["Complete"];



    $sql = "UPDATE `cpms`.`review`
            SET
                    `ReviewID` = '$ReviewID',
                    `PaperID` = '$PaperID',
                    `ReviewerID` = '$ReviewerID',
                    `AppropriatenessOfTopic` = '$AppropriatenessOfTopic',
                    `TimelinessOfTopic` = '$TimelinessOfTopic',
                    `SupportiveEvidence` = '$SupportiveEvidence',
                    `TechnicalQuality` = '$TechnicalQuality',
                    `ScopeOfCoverage` = '$ScopeOfCoverage',
                    `CitationOfPreviousWork` = '$CitationOfPreviousWork',
                    `Originality` = '$Originality',
                    `ContentComments` = '$ContentComments',
                    `OrganizationOfPaper` = '$OrganizationOfPaper',
                    `ClarityOfMainMessage` = '$ClarityOfMainMessage',
                    `Mechanics`= '$Mechanics',
                    `WrittenDocumentComments`= '$WrittenDocumentComments',
                    `SuitabilityForPresentation`= '$SuitabilityForPresentation',
                    `PotentialInterestInTopic`= '$PotentialInterestInTopic',
                    `PotentialForOralPresentationComments`= '$PotentialForOralPresentationComments',
                    `OverallRating`= '$OverallRating',
                    `OverallRatingComments`= '$OverallRatingComments',
                    `ComfortLevelTopic`= '$ComfortLevelTopic',
                    `ComfortLevelAcceptability`= '$ComfortLevelAcceptability',
                    `Complete`= '$Complete'
            WHERE `ReviewID` = '$ReviewID';";
    $result = $mysqli->query($sql) or die($mysqli->error());


    $_SESSION["message"] = "Record has been Updated!";
    $_SESSION["msg_type"] = "success";

    
}

//Edit Updates Form Fields with values from selected row
  if(isset($_POST['editID'])){

    $userID = ($_POST['editID']);

    $sql = "SELECT * 
            FROM    `cpms`.`review`
            WHERE `ReviewID` = '$userID';";

    $result = $mysqli->query($sql) or die($mysqli->error());

    if($result->num_rows > 0){
        $row2 = $result -> fetch_array(MYSQLI_ASSOC);
    }
    else{
        $result = false;
    }

    $_SESSION["message"] = "Record has been selected, Click View to view the Form!";
    $_SESSION["msg_type"] = "success";
  }

//Deletes selected row
  if(isset($_POST['deleteID'])){
    $ReviewID = $_POST['deleteID'];
    $sql = ("DELETE FROM `review`
    WHERE ReviewID = '$ReviewID' ;") ;
    $result = $mysqli->query($sql) or die($mysqli->error());


    $_SESSION['message'] = "Record has been Deleted!";
    $_SESSION['msg_type'] = "danger";


  }

?>

<!--Header -->

<head>
    <meta name="viewport" content="width=device-width" , initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/e1b93c3ea7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../style.css" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin - Manage Reviews</title>
</head>

<!--Body -->

<body>
    <header>
        <a href="../adminHome.html" class="logo">
            <img src="../../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="../adminHome.html">HOME</a></li>
            <li><a href="../adminManage.html" style="background-color: white; color: black;">
                    ADMIN</a></li>
            <li><a href="../adminReports.html">REPORTS</a></li>
            <li><a href="">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <main>
            <!--Main page elements here-->
            <div class="second-nav">
                <ul class="breadcrumb">
                    <li><a href="../adminHome.html">Home</a></li>
                    <li><a href="../adminManage.html">Manage</a></li>
                    <li>Manage Reviews</li>
                </ul>
            </div>

            <div class="reports-container">
                <div class="page-content">
                    <h1>Table Maintenance - Reviews</h1>
                    <p>
                        This is a table of all the reviews the reviewers have submitted for each paper.
                        Here, you can manually add new reviews, edit the current data fields, or
                        delete it entirely. Under the "actions" column click Select to select the row you would like
                        to edit, Then, click View to view the form to edit that row. To delete a row simply click the
                        Delete button.
                    </p>
                </div>

                <!-- Message Display-->
                <?php 
                    if (isset($_SESSION["message"])): 
                ?>

                <div class="alert alert-<?=$_SESSION["msg_type"]?>">

                    <?php
                        echo $_SESSION["message"];
                        unset( $_SESSION["message"]);
                    ?>

                </div>

                <?php endif ?>

                <!-- Table For Data -->
                <div class="data-table">
                    <div class="reports">
                        <table>
                            <tr>
                                <th>Actions</th>
                                <th>ReviewID</th>
                                <th>PaperID</th>
                                <th>ReviewerID</th>
                                <th>Appropriateness of Topic</th>
                                <th>Timeliness of Topic</th>
                                <th>Supportive Evidence</th>
                                <th>Technical Quality</th>
                                <th>Scope of Coverage</th>
                                <th>Citation of Previous Work</th>
                                <th>Originality</th>
                                <th>Content Comments</th>
                                <th>Organization of Paper</th>
                                <th>Clarity of Main Message</th>
                                <th>Mechanics</th>
                                <th>Written Document Comments</th>
                                <th>Suitability for Presentation</th>
                                <th>Potential Interest in Topic</th>
                                <th>Potential for Oral Presentation Comments</th>
                                <th>Overall Rating</th>
                                <th>Overall Rating Comments</th>
                                <th>ComfortLevelTopic</th>
                                <th>ComfortLevelAcceptabilitye</th>
                                <th>Complete</th>
                            </tr>

                            <?php
                                $sql = "SELECT * from review";
                                $result = $mysqli-> query($sql);

                                if($result->num_rows > 0){
                                    while ($row = $result-> fetch_assoc()) : 
                            ?>
                            <tr>
                                <td style="word-spacing: 5px; text-align: center;">
                                    <form action="manageReviews.php" method="post">
                                        <button type="submit" class="btn btn-primary" name="editID"
                                            value="<?php echo $row["ReviewID"] ?>">
                                            Select
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#ReviewModalEdit">
                                            View
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="deleteID"
                                            value="<?php echo $row["ReviewID"] ?>">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td><?php  echo $row["ReviewID"]  ?></td>
                                <td><?php  echo $row["PaperID"]  ?></td>
                                <td><?php  echo $row["ReviewerID"]  ?></td>
                                <td><?php  echo $row["AppropriatenessOfTopic"]  ?></td>
                                <td><?php  echo $row["TimelinessOfTopic"]  ?></td>
                                <td><?php  echo $row["SupportiveEvidence"]  ?></td>
                                <td><?php  echo $row["TechnicalQuality"]  ?></td>
                                <td><?php  echo $row["ScopeOfCoverage"]  ?></td>
                                <td><?php  echo $row["CitationOfPreviousWork"]  ?></td>
                                <td><?php  echo $row["Originality"]  ?></td>
                                <td><?php  echo $row["ContentComments"]  ?></td>
                                <td><?php  echo $row["OrganizationOfPaper"]  ?></td>
                                <td><?php  echo $row["ClarityOfMainMessage"]  ?></td>

                                <td><?php  echo $row["Mechanics"]  ?></td>
                                <td><?php  echo $row["WrittenDocumentComments"]  ?></td>
                                <td><?php  echo $row["SuitabilityForPresentation"]  ?></td>
                                <td><?php  echo $row["PotentialInterestInTopic"]  ?></td>
                                <td><?php  echo $row["PotentialForOralPresentationComments"]  ?></td>
                                <td><?php  echo $row["OverallRating"]  ?></td>
                                <td><?php  echo $row["OverallRatingComments"]  ?></td>
                                <td><?php  echo $row["ComfortLevelTopic"]  ?></td>
                                <td><?php  echo $row["ComfortLevelAcceptability"]  ?></td>
                                <td><?php  echo $row["Complete"]  ?></td>
                            </tr>
                            <?php endwhile;}?>
                        </table>

                        <br>
                        <!-- Button trigger Add modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ReviewModalAdd">
                            Add Review
                        </button>

                        <!-- Button trigger Edit modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#ReviewModalEdit">
                            Edit Review
                        </button>
                    </div>

                </div>

            </div>



            <!-- Modal Add with Input form to add data to Table-->
            <div class="modal fade" id="ReviewModalAdd" tabindex="-1" role="dialog"
                aria-labelledby="ReviewModalAddLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ReviewModalAddLabel">Enter Review Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="manageReviews.php" method="post">
                            <div class="modal-body">

                                <div class="form-group">

                                    <div class="actions">
                                        <div class=data-table>

                                            <label>Review ID:</label>
                                            <input type="text" name="ReviewID" class=" form-control" value=""
                                                placeholder=" Enter Paper ID:" required>

                                            <label>Paper ID:</label>
                                            <input type="text" name="PaperID" class=" form-control" value=""
                                                placeholder=" Enter Paper ID:" required>

                                            <label>Reviewer ID:</label>
                                            <input type="text" name="ReviewerID" class="form-control" value=""
                                                placeholder=" Enter Author ID:" required>

                                            <br>
                                            <h2>Content</h2>
                                            <table>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>None</th>
                                                    <th>Poor</th>
                                                    <th>Fair</th>
                                                    <th>Average</th>
                                                    <th>Good</th>
                                                    <th>Excellent</th>
                                                </tr>

                                                <tr>
                                                    <td>Appropriateness of Topic</td>
                                                    <td><label for="appropriatenessOfTopic0">
                                                            <input type="radio" id="appropriatenessOfTopic0"
                                                                name="appropriatenessOfTopic" value="0"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="appropriatenessOfTopic1">
                                                            <input type="radio" id="appropriatenessOfTopic1"
                                                                name="appropriatenessOfTopic" value="1">
                                                        </label></td>
                                                    <td><label for="appropriatenessOfTopic2">
                                                            <input type="radio" id="appropriatenessOfTopic2"
                                                                name="appropriatenessOfTopic" value="2">
                                                    </td>
                                                    <td><label for="appropriatenessOfTopic3">
                                                            <input type="radio" id="appropriatenessOfTopic3"
                                                                name="appropriatenessOfTopic" value="3">
                                                        </label></td>
                                                    <td><label for="appropriatenessOfTopic4">
                                                            <input type="radio" id="appropriatenessOfTopic4"
                                                                name="appropriatenessOfTopic" value="4">
                                                        </label></td>
                                                    <td><label for="appropriatenessOfTopic5">
                                                            <input type="radio" id="appropriatenessOfTopic5"
                                                                name="appropriatenessOfTopic" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Timeliness of Topic</td>
                                                    <td><label for="timelinessOfTopic0">
                                                            <input type="radio" id="timelinessOfTopic0"
                                                                name="timelinessOfTopic" value="0" checked="checked">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic1">
                                                            <input type="radio" id="timelinessOfTopic1"
                                                                name="timelinessOfTopic" value="1">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic2">
                                                            <input type="radio" id="timelinessOfTopic2"
                                                                name="timelinessOfTopic" value="2">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic3">
                                                            <input type="radio" id="timelinessOfTopic3"
                                                                name="timelinessOfTopic" value="3">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic4">
                                                            <input type="radio" id="timelinessOfTopic4"
                                                                name="timelinessOfTopic" value="4">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic5">
                                                            <input type="radio" id="timelinessOfTopic5"
                                                                name="timelinessOfTopic" value="5">
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>Supportive Evidence</td>
                                                    <td><label for="supportiveEvidence0">
                                                            <input type="radio" id="supportiveEvidence0"
                                                                name="supportiveEvidence" value="0" checked="checked">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence1">
                                                            <input type="radio" id="supportiveEvidence1"
                                                                name="supportiveEvidence" value="1">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence2">
                                                            <input type="radio" id="supportiveEvidence2"
                                                                name="supportiveEvidence" value="2">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence3">
                                                            <input type="radio" id="supportiveEvidence3"
                                                                name="supportiveEvidence" value="3">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence4">
                                                            <input type="radio" id="supportiveEvidence4"
                                                                name="supportiveEvidence" value="4">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence5">
                                                            <input type="radio" id="supportiveEvidence5"
                                                                name="supportiveEvidence" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Technical Quality</td>
                                                    <td><label for="technicalQuality0">
                                                            <input type="radio" id="technicalQuality0"
                                                                name="technicalQuality" value="0" checked="checked">
                                                        </label></td>
                                                    <td><label for="technicalQuality1">
                                                            <input type="radio" id="technicalQuality1"
                                                                name="technicalQuality" value="1">
                                                        </label></td>
                                                    <td><label for="technicalQuality2">
                                                            <input type="radio" id="technicalQuality2"
                                                                name="technicalQuality" value="2">
                                                        </label></td>
                                                    <td><label for="technicalQuality3">
                                                            <input type="radio" id="technicalQuality3"
                                                                name="technicalQuality" value="3">
                                                        </label></td>
                                                    <td><label for="technicalQuality4">
                                                            <input type="radio" id="technicalQuality4"
                                                                name="technicalQuality" value="4">
                                                        </label></td>
                                                    <td><label for="technicalQuality5">
                                                            <input type="radio" id="technicalQuality5"
                                                                name="technicalQuality" value="5">
                                                        </label></td>

                                                </tr>
                                                <tr>
                                                    <td>Scope of Coverage</td>
                                                    <td><label for="scopeOfCoverage0">
                                                            <input type="radio" id="scopeOfCoverage0"
                                                                name="scopeOfCoverage" value="0" checked="checked">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage1">
                                                            <input type="radio" id="scopeOfCoverage1"
                                                                name="scopeOfCoverage" value="1">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage2">
                                                            <input type="radio" id="scopeOfCoverage2"
                                                                name="scopeOfCoverage" value="2">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage3">
                                                            <input type="radio" id="scopeOfCoverage3"
                                                                name="scopeOfCoverage" value="3">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage4">
                                                            <input type="radio" id="scopeOfCoverage4"
                                                                name="scopeOfCoverage" value="4">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage5">
                                                            <input type="radio" id="scopeOfCoverage5"
                                                                name="scopeOfCoverage" value="5">
                                                        </label></td>

                                                </tr>
                                                <tr>
                                                    <td>Citation of Previous Work</td>
                                                    <td><label for="citationOfPreviousWork0">
                                                            <input type="radio" id="citationOfPreviousWork0"
                                                                name="citationOfPreviousWork" value="0"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork1">
                                                            <input type="radio" id="citationOfPreviousWork1"
                                                                name="citationOfPreviousWork" value="1">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork2">
                                                            <input type="radio" id="citationOfPreviousWork2"
                                                                name="citationOfPreviousWork" value="2">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork3">
                                                            <input type="radio" id="citationOfPreviousWork3"
                                                                name="citationOfPreviousWork" value="3">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork4">
                                                            <input type="radio" id="citationOfPreviousWork4"
                                                                name="citationOfPreviousWork" value="4">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork5">
                                                            <input type="radio" id="citationOfPreviousWork5"
                                                                name="citationOfPreviousWork" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Originality</td>
                                                    <td><label for="originality0">
                                                            <input type="radio" id="originality0" name="originality"
                                                                value="0" checked="checked">
                                                        </label></td>
                                                    <td><label for="originality1">
                                                            <input type="radio" id="originality1" name="originality"
                                                                value="1">
                                                        </label></td>
                                                    <td><label for="originality2">
                                                            <input type="radio" id="originality2" name="originality"
                                                                value="2">
                                                        </label></td>
                                                    <td><label for="originality3">
                                                            <input type="radio" id="originality3" name="originality"
                                                                value="3">
                                                        </label></td>
                                                    <td><label for="originality4">
                                                            <input type="radio" id="originality4" name="originality"
                                                                value="4">
                                                        </label></td>
                                                    <td><label for="originality5">
                                                            <input type="radio" id="originality5" name="originality"
                                                                value="5">
                                                        </label></td>
                                                </tr>
                                            </table>


                                            <label>Additional Comments Regarding Content:</label>
                                            <input type="text" name="contentComments" class=" form-control" value=""
                                                placeholder="Enter Comments here: " maxlength="1000">

                                            <h2><br>Written Document</h2>
                                            <table>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>None</th>
                                                    <th>Poor</th>
                                                    <th>Fair</th>
                                                    <th>Average</th>
                                                    <th>Good</th>
                                                    <th>Excellent</th>
                                                </tr>
                                                <tr>
                                                    <td>Organization of Paper</td>
                                                    <td><label for="organizationOfPaper0">
                                                            <input type="radio" id="organizationOfPaper0"
                                                                name="organizationOfPaper" value="0" checked="checked">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper1">
                                                            <input type="radio" id="organizationOfPaper1"
                                                                name="organizationOfPaper" value="1">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper2">
                                                            <input type="radio" id="organizationOfPaper2"
                                                                name="organizationOfPaper" value="2">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper3">
                                                            <input type="radio" id="organizationOfPaper3"
                                                                name="organizationOfPaper" value="3">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper4">
                                                            <input type="radio" id="organizationOfPaper4"
                                                                name="organizationOfPaper" value="4">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper5">
                                                            <input type="radio" id="organizationOfPaper5"
                                                                name="organizationOfPaper" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Clarity of Main Message</td>
                                                    <td><label for="clarityOfMessage0">
                                                            <input type="radio" id="clarityOfMessage0"
                                                                name="clarityOfMessage" value="0" checked="checked">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage1">
                                                            <input type="radio" id="clarityOfMessage1"
                                                                name="clarityOfMessage" value="1">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage2">
                                                            <input type="radio" id="clarityOfMessage2"
                                                                name="clarityOfMessage" value="2">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage3">
                                                            <input type="radio" id="clarityOfMessage3"
                                                                name="clarityOfMessage" value="3">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage4">
                                                            <input type="radio" id="clarityOfMessage4"
                                                                name="clarityOfMessage" value="4">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage5">
                                                            <input type="radio" id="clarityOfMessage5"
                                                                name="clarityOfMessage" value="5">
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>Mechanics (grammar, etc.)</td>
                                                    <td><label for="mechanics0">
                                                            <input type="radio" id="mechanics0" name="mechanics"
                                                                value="0" checked="checked">
                                                        </label></td>
                                                    <td><label for="mechanics1">
                                                            <input type="radio" id="mechanics1" name="mechanics"
                                                                value="1">
                                                        </label></td>
                                                    <td><label for="mechanics2">
                                                            <input type="radio" id="mechanics2" name="mechanics"
                                                                value="2">
                                                        </label></td>
                                                    <td><label for="mechanics3">
                                                            <input type="radio" id="mechanics3" name="mechanics"
                                                                value="3">
                                                        </label></td>
                                                    <td><label for="mechanics4">
                                                            <input type="radio" id="mechanics4" name="mechanics"
                                                                value="4">
                                                        </label></td>
                                                    <td><label for="mechanics5">
                                                            <input type="radio" id="mechanics5" name="mechanics"
                                                                value="5">
                                                        </label></td>
                                                </tr>
                                            </table>

                                            <label>Additional Comments Regarding Written Document:</label>

                                            <input type="text" name="writtenDocumentComments" class=" form-control"
                                                value="" placeholder="Enter Comments here: " maxlength="1000">


                                            <h2><br>Potential for Oral Presentation</h2>
                                            <table>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>None</th>
                                                    <th>Poor</th>
                                                    <th>Fair</th>
                                                    <th>Average</th>
                                                    <th>Good</th>
                                                    <th>Excellent</th>
                                                </tr>
                                                <tr>
                                                    <td>Suitability for Presentation</td>
                                                    <td><label for="suitabilityForPresentation0">
                                                            <input type="radio" id="suitabilityForPresentation0"
                                                                name="suitabilityForPresentation" value="0"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation1">
                                                            <input type="radio" id="suitabilityForPresentation1"
                                                                name="suitabilityForPresentation" value="1">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation2">
                                                            <input type="radio" id="suitabilityForPresentation2"
                                                                name="suitabilityForPresentation" value="2">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation3">
                                                            <input type="radio" id="suitabilityForPresentation3"
                                                                name="suitabilityForPresentation" value="3">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation4">
                                                            <input type="radio" id="suitabilityForPresentation4"
                                                                name="suitabilityForPresentation" value="4">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation5">
                                                            <input type="radio" id="suitabilityForPresentation5"
                                                                name="suitabilityForPresentation" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Potential Interest in Topic</td>
                                                    <td><label for="potentialInterestInTopic0">
                                                            <input type="radio" id="potentialInterestInTopic0"
                                                                name="potentialInterestInTopic" value="0"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic1">
                                                            <input type="radio" id="potentialInterestInTopic1"
                                                                name="potentialInterestInTopic" value="1">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic2">
                                                            <input type="radio" id="potentialInterestInTopic2"
                                                                name="potentialInterestInTopic" value="2">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic3">
                                                            <input type="radio" id="potentialInterestInTopic3"
                                                                name="potentialInterestInTopic" value="3">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic4">
                                                            <input type="radio" id="potentialInterestInTopic4"
                                                                name="potentialInterestInTopic" value="4">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic5">
                                                            <input type="radio" id="potentialInterestInTopic5"
                                                                name="potentialInterestInTopic" value="5">
                                                        </label></td>
                                                </tr>
                                            </table>


                                            <label>Additional Comments Regarding Potential for Oral
                                                Presentation:</label>

                                            <input type="text" name="potentialForOralPresentationComments"
                                                class=" form-control" value="" placeholder="Enter Comments here: "
                                                maxlength="1000">



                                            <div class="overall-rating">
                                                <h2><br>Overall Rating</h2>
                                                <table>
                                                    <tr>
                                                        <th>Category</th>
                                                        <th>Rating</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Definitely Should Not Accept Paper</td>
                                                        <td><label for="overallRating1">
                                                                <input type="radio" id="overallRating1"
                                                                    name="overallRating" value="1">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Probably Should Not Accept Paper</td>
                                                        <td><label for="overallRating2">
                                                                <input type="radio" id="overallRating2"
                                                                    name="overallRating" value="2">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Uncertain About Acceptance of Paper</td>
                                                        <td><label for="overallRating3">
                                                                <input type="radio" id="overallRating3"
                                                                    name="overallRating" value="3">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Probably Should Accept Paper</td>
                                                        <td><label for="overallRating4">
                                                                <input type="radio" id="overallRating4"
                                                                    name="overallRating" value="4">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Definitely Should Accept Paper</td>
                                                        <td><label for="overallRating5">
                                                                <input type="radio" id="overallRating5"
                                                                    name="overallRating" value="5">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>None</td>
                                                        <td><label for="overallRating0">
                                                                <input type="radio" id="overallRating0"
                                                                    name="overallRating" value="0" checked="checked">
                                                            </label></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <label>Overall Rating Comments:</label>

                                            <input type="text" name="overallRatingComments" class=" form-control"
                                                value="" placeholder="Enter Comments here: " maxlength="1000">
                                            <br>


                                            <h2><br>Comfort Level</h2>
                                            <table>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>None</th>
                                                    <th>Poor</th>
                                                    <th>Fair</th>
                                                    <th>Average</th>
                                                    <th>Good</th>
                                                    <th>Excellent</th>
                                                </tr>
                                                <tr>
                                                    <td>Comfort Level for Topic</td>
                                                    <td><label for="ComfortLevelTopic0">
                                                            <input type="radio" id="ComfortLevelTopic0"
                                                                name="ComfortLevelTopic" value="0" checked="checked">
                                                        </label></td>
                                                    <td><label for=" ComfortLevelTopic1">
                                                            <input type="radio" id="ComfortLevelTopic1"
                                                                name="ComfortLevelTopic" value="1">
                                                        </label></td>
                                                    <td><label for="ComfortLevelTopic2">
                                                            <input type="radio" id="ComfortLevelTopic2"
                                                                name="ComfortLevelTopic" value="2">
                                                        </label></td>
                                                    <td><label for="ComfortLevelTopic3">
                                                            <input type="radio" id="ComfortLevelTopic3"
                                                                name="ComfortLevelTopic" value="3">
                                                        </label></td>
                                                    <td><label for="ComfortLevelTopic4">
                                                            <input type="radio" id="ComfortLevelTopic4"
                                                                name="ComfortLevelTopic" value="4">
                                                        </label></td>
                                                    <td><label for="ComfortLevelTopic5">
                                                            <input type="radio" id="ComfortLevelTopic5"
                                                                name="ComfortLevelTopic" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Comfort Level Acceptability for Topic</td>
                                                    <td><label for="ComfortLevelAcceptability0">
                                                            <input type="radio" id="ComfortLevelAcceptability0"
                                                                name="ComfortLevelAcceptability" value="0"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability1">
                                                            <input type="radio" id="ComfortLevelAcceptability1"
                                                                name="ComfortLevelAcceptability" value="1">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability2">
                                                            <input type="radio" id="ComfortLevelAcceptability2"
                                                                name="ComfortLevelAcceptability" value="2">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability3">
                                                            <input type="radio" id="ComfortLevelAcceptability3"
                                                                name="ComfortLevelAcceptability" value="3">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability4">
                                                            <input type="radio" id="ComfortLevelAcceptability4"
                                                                name="ComfortLevelAcceptability" value="4">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability5">
                                                            <input type="radio" id="ComfortLevelAcceptability5"
                                                                name="ComfortLevelAcceptability" value="5">
                                                        </label></td>
                                                </tr>
                                            </table>
                                            <br>

                                            <input type="hidden" id="completeHidden" name="Complete" value='0'>
                                            <input type="checkbox" id="complete" name="Complete" value='1'>
                                            <label for="Complete" class="checkbox">Check if Complete</label>
                                            <br>

                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>



                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>




            <!-- Modal Edit with input form to modify and update data from table-->
            <div class="modal fade" id="ReviewModalEdit" tabindex="-1" role="dialog"
                aria-labelledby="ReviewModalEditLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ReviewModalEditLabel">Change Review Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="manageReviews.php" method="post">
                            <div class="modal-body">

                                <div class="form-group">

                                    <div class="actions">
                                        <div class=data-table>

                                            <label>Review ID:</label>
                                            <input type="text" name="ReviewID" class=" form-control"
                                                value="<?php echo $row2["ReviewID"] ?>" placeholder=" Enter Paper ID:"
                                                required>

                                            <label>Paper ID:</label>
                                            <input type=" text" name="PaperID" class=" form-control"
                                                value="<?php echo $row2["PaperID"] ?>" placeholder=" Enter Paper ID:"
                                                required>

                                            <label>Reviewer ID:</label>
                                            <input type="text" name="ReviewerID" class="form-control"
                                                value="<?php echo $row2["ReviewerID"] ?>"
                                                placeholder=" Enter Author ID:" required>

                                            <br>
                                            <h2>Content</h2>
                                            <table>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>None</th>
                                                    <th>Poor</th>
                                                    <th>Fair</th>
                                                    <th>Average</th>
                                                    <th>Good</th>
                                                    <th>Excellent</th>
                                                </tr>

                                                <tr>
                                                    <td>Appropriateness of Topic</td>
                                                    <td><label for="appropriatenessOfTopic0">
                                                            <input type="radio" id="appropriatenessOfTopic0"
                                                                name="appropriatenessOfTopic"
                                                                value="<?php echo $row2["AppropriatenessOfTopic"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="appropriatenessOfTopic1">
                                                            <input type="radio" id="appropriatenessOfTopic1"
                                                                name="appropriatenessOfTopic" value="1">
                                                        </label></td>
                                                    <td><label for="appropriatenessOfTopic2">
                                                            <input type="radio" id="appropriatenessOfTopic2"
                                                                name="appropriatenessOfTopic" value="2">
                                                    </td>
                                                    <td><label for="appropriatenessOfTopic3">
                                                            <input type="radio" id="appropriatenessOfTopic3"
                                                                name="appropriatenessOfTopic" value="3">
                                                        </label></td>
                                                    <td><label for="appropriatenessOfTopic4">
                                                            <input type="radio" id="appropriatenessOfTopic4"
                                                                name="appropriatenessOfTopic" value="4">
                                                        </label></td>
                                                    <td><label for="appropriatenessOfTopic5">
                                                            <input type="radio" id="appropriatenessOfTopic5"
                                                                name="appropriatenessOfTopic" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Timeliness of Topic</td>
                                                    <td><label for="timelinessOfTopic0">
                                                            <input type="radio" id="timelinessOfTopic0"
                                                                name="timelinessOfTopic"
                                                                value="<?php echo $row2["TimelinessOfTopic"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic1">
                                                            <input type="radio" id="timelinessOfTopic1"
                                                                name="timelinessOfTopic" value="1">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic2">
                                                            <input type="radio" id="timelinessOfTopic2"
                                                                name="timelinessOfTopic" value="2">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic3">
                                                            <input type="radio" id="timelinessOfTopic3"
                                                                name="timelinessOfTopic" value="3">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic4">
                                                            <input type="radio" id="timelinessOfTopic4"
                                                                name="timelinessOfTopic" value="4">
                                                        </label></td>
                                                    <td><label for="timelinessOfTopic5">
                                                            <input type="radio" id="timelinessOfTopic5"
                                                                name="timelinessOfTopic" value="5">
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>Supportive Evidence</td>
                                                    <td><label for="supportiveEvidence0">
                                                            <input type="radio" id="supportiveEvidence0"
                                                                name="supportiveEvidence"
                                                                value="<?php echo $row2["SupportiveEvidence"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence1">
                                                            <input type="radio" id="supportiveEvidence1"
                                                                name="supportiveEvidence" value="1">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence2">
                                                            <input type="radio" id="supportiveEvidence2"
                                                                name="supportiveEvidence" value="2">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence3">
                                                            <input type="radio" id="supportiveEvidence3"
                                                                name="supportiveEvidence" value="3">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence4">
                                                            <input type="radio" id="supportiveEvidence4"
                                                                name="supportiveEvidence" value="4">
                                                        </label></td>
                                                    <td><label for="supportiveEvidence5">
                                                            <input type="radio" id="supportiveEvidence5"
                                                                name="supportiveEvidence" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Technical Quality</td>
                                                    <td><label for="technicalQuality0">
                                                            <input type="radio" id="technicalQuality0"
                                                                name="technicalQuality"
                                                                value="<?php echo $row2["TechnicalQuality"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="technicalQuality1">
                                                            <input type="radio" id="technicalQuality1"
                                                                name="technicalQuality" value="1">
                                                        </label></td>
                                                    <td><label for="technicalQuality2">
                                                            <input type="radio" id="technicalQuality2"
                                                                name="technicalQuality" value="2">
                                                        </label></td>
                                                    <td><label for="technicalQuality3">
                                                            <input type="radio" id="technicalQuality3"
                                                                name="technicalQuality" value="3">
                                                        </label></td>
                                                    <td><label for="technicalQuality4">
                                                            <input type="radio" id="technicalQuality4"
                                                                name="technicalQuality" value="4">
                                                        </label></td>
                                                    <td><label for="technicalQuality5">
                                                            <input type="radio" id="technicalQuality5"
                                                                name="technicalQuality" value="5">
                                                        </label></td>

                                                </tr>
                                                <tr>
                                                    <td>Scope of Coverage</td>
                                                    <td><label for="scopeOfCoverage0">
                                                            <input type="radio" id="scopeOfCoverage0"
                                                                name="scopeOfCoverage"
                                                                value="<?php echo $row2["ScopeOfCoverage"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage1">
                                                            <input type="radio" id="scopeOfCoverage1"
                                                                name="scopeOfCoverage" value="1">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage2">
                                                            <input type="radio" id="scopeOfCoverage2"
                                                                name="scopeOfCoverage" value="2">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage3">
                                                            <input type="radio" id="scopeOfCoverage3"
                                                                name="scopeOfCoverage" value="3">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage4">
                                                            <input type="radio" id="scopeOfCoverage4"
                                                                name="scopeOfCoverage" value="4">
                                                        </label></td>
                                                    <td><label for="scopeOfCoverage5">
                                                            <input type="radio" id="scopeOfCoverage5"
                                                                name="scopeOfCoverage" value="5">
                                                        </label></td>

                                                </tr>
                                                <tr>
                                                    <td>Citation of Previous Work</td>
                                                    <td><label for="citationOfPreviousWork0">
                                                            <input type="radio" id="citationOfPreviousWork0"
                                                                name="citationOfPreviousWork"
                                                                value="<?php echo $row2["CitationOfPreviousWork"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork1">
                                                            <input type="radio" id="citationOfPreviousWork1"
                                                                name="citationOfPreviousWork" value="1">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork2">
                                                            <input type="radio" id="citationOfPreviousWork2"
                                                                name="citationOfPreviousWork" value="2">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork3">
                                                            <input type="radio" id="citationOfPreviousWork3"
                                                                name="citationOfPreviousWork" value="3">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork4">
                                                            <input type="radio" id="citationOfPreviousWork4"
                                                                name="citationOfPreviousWork" value="4">
                                                        </label></td>
                                                    <td><label for="citationOfPreviousWork5">
                                                            <input type="radio" id="citationOfPreviousWork5"
                                                                name="citationOfPreviousWork" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Originality</td>
                                                    <td><label for="originality0">
                                                            <input type="radio" id="originality0" name="originality"
                                                                value="<?php echo $row2["Originality"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="originality1">
                                                            <input type="radio" id="originality1" name="originality"
                                                                value="1">
                                                        </label></td>
                                                    <td><label for="originality2">
                                                            <input type="radio" id="originality2" name="originality"
                                                                value="2">
                                                        </label></td>
                                                    <td><label for="originality3">
                                                            <input type="radio" id="originality3" name="originality"
                                                                value="3">
                                                        </label></td>
                                                    <td><label for="originality4">
                                                            <input type="radio" id="originality4" name="originality"
                                                                value="4">
                                                        </label></td>
                                                    <td><label for="originality5">
                                                            <input type="radio" id="originality5" name="originality"
                                                                value="5">
                                                        </label></td>
                                                </tr>
                                            </table>


                                            <label>Additional Comments Regarding Content:</label>
                                            <input type="text" name="contentComments" class=" form-control"
                                                value="<?php echo $row2["ContentComments"] ?>"
                                                placeholder="Enter Comments here: " maxlength="1000">

                                            <h2><br>Written Document</h2>
                                            <table>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>None</th>
                                                    <th>Poor</th>
                                                    <th>Fair</th>
                                                    <th>Average</th>
                                                    <th>Good</th>
                                                    <th>Excellent</th>
                                                </tr>
                                                <tr>
                                                    <td>Organization of Paper</td>
                                                    <td><label for="organizationOfPaper0">
                                                            <input type="radio" id="organizationOfPaper0"
                                                                name="organizationOfPaper"
                                                                value="<?php echo $row2["OrganizationOfPaper"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper1">
                                                            <input type="radio" id="organizationOfPaper1"
                                                                name="organizationOfPaper" value="1">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper2">
                                                            <input type="radio" id="organizationOfPaper2"
                                                                name="organizationOfPaper" value="2">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper3">
                                                            <input type="radio" id="organizationOfPaper3"
                                                                name="organizationOfPaper" value="3">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper4">
                                                            <input type="radio" id="organizationOfPaper4"
                                                                name="organizationOfPaper" value="4">
                                                        </label></td>
                                                    <td><label for="organizationOfPaper5">
                                                            <input type="radio" id="organizationOfPaper5"
                                                                name="organizationOfPaper" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Clarity of Main Message</td>
                                                    <td><label for="clarityOfMessage0">
                                                            <input type="radio" id="clarityOfMessage0"
                                                                name="clarityOfMessage"
                                                                value="<?php echo $row2["ClarityOfMainMessage"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage1">
                                                            <input type="radio" id="clarityOfMessage1"
                                                                name="clarityOfMessage" value="1">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage2">
                                                            <input type="radio" id="clarityOfMessage2"
                                                                name="clarityOfMessage" value="2">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage3">
                                                            <input type="radio" id="clarityOfMessage3"
                                                                name="clarityOfMessage" value="3">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage4">
                                                            <input type="radio" id="clarityOfMessage4"
                                                                name="clarityOfMessage" value="4">
                                                        </label></td>
                                                    <td><label for="clarityOfMessage5">
                                                            <input type="radio" id="clarityOfMessage5"
                                                                name="clarityOfMessage" value="5">
                                                        </label></td>
                                                </tr>
                                                <tr>
                                                    <td>Mechanics (grammar, etc.)</td>
                                                    <td><label for="mechanics0">
                                                            <input type="radio" id="mechanics0" name="mechanics"
                                                                value="<?php echo $row2["Mechanics"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="mechanics1">
                                                            <input type="radio" id="mechanics1" name="mechanics"
                                                                value="1">
                                                        </label></td>
                                                    <td><label for="mechanics2">
                                                            <input type="radio" id="mechanics2" name="mechanics"
                                                                value="2">
                                                        </label></td>
                                                    <td><label for="mechanics3">
                                                            <input type="radio" id="mechanics3" name="mechanics"
                                                                value="3">
                                                        </label></td>
                                                    <td><label for="mechanics4">
                                                            <input type="radio" id="mechanics4" name="mechanics"
                                                                value="4">
                                                        </label></td>
                                                    <td><label for="mechanics5">
                                                            <input type="radio" id="mechanics5" name="mechanics"
                                                                value="5">
                                                        </label></td>
                                                </tr>
                                            </table>

                                            <label>Additional Comments Regarding Written Document:</label>

                                            <input type="text" name="writtenDocumentComments" class=" form-control"
                                                value="<?php echo $row2["WrittenDocumentComments"] ?>"" placeholder="
                                                Enter Comments here: " maxlength=" 1000">


                                            <h2><br>Potential for Oral Presentation</h2>
                                            <table>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>None</th>
                                                    <th>Poor</th>
                                                    <th>Fair</th>
                                                    <th>Average</th>
                                                    <th>Good</th>
                                                    <th>Excellent</th>
                                                </tr>
                                                <tr>
                                                    <td>Suitability for Presentation</td>
                                                    <td><label for="suitabilityForPresentation0">
                                                            <input type="radio" id="suitabilityForPresentation0"
                                                                name="suitabilityForPresentation"
                                                                value="<?php echo $row2["SuitabilityForPresentation"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation1">
                                                            <input type="radio" id="suitabilityForPresentation1"
                                                                name="suitabilityForPresentation" value="1">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation2">
                                                            <input type="radio" id="suitabilityForPresentation2"
                                                                name="suitabilityForPresentation" value="2">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation3">
                                                            <input type="radio" id="suitabilityForPresentation3"
                                                                name="suitabilityForPresentation" value="3">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation4">
                                                            <input type="radio" id="suitabilityForPresentation4"
                                                                name="suitabilityForPresentation" value="4">
                                                        </label></td>
                                                    <td><label for="suitabilityForPresentation5">
                                                            <input type="radio" id="suitabilityForPresentation5"
                                                                name="suitabilityForPresentation" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Potential Interest in Topic</td>
                                                    <td><label for="potentialInterestInTopic0">
                                                            <input type="radio" id="potentialInterestInTopic0"
                                                                name="potentialInterestInTopic"
                                                                value="<?php echo $row2["PotentialInterestInTopic"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic1">
                                                            <input type="radio" id="potentialInterestInTopic1"
                                                                name="potentialInterestInTopic" value="1">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic2">
                                                            <input type="radio" id="potentialInterestInTopic2"
                                                                name="potentialInterestInTopic" value="2">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic3">
                                                            <input type="radio" id="potentialInterestInTopic3"
                                                                name="potentialInterestInTopic" value="3">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic4">
                                                            <input type="radio" id="potentialInterestInTopic4"
                                                                name="potentialInterestInTopic" value="4">
                                                        </label></td>
                                                    <td><label for="potentialInterestInTopic5">
                                                            <input type="radio" id="potentialInterestInTopic5"
                                                                name="potentialInterestInTopic" value="5">
                                                        </label></td>
                                                </tr>
                                            </table>


                                            <label>Additional Comments Regarding Potential for Oral
                                                Presentation:</label>

                                            <input type="text" name="potentialForOralPresentationComments"
                                                class=" form-control"
                                                value="<?php echo $row2["PotentialForOralPresentationComments"] ?>"
                                                placeholder="Enter Comments here: " maxlength="1000">



                                            <div class="overall-rating">
                                                <h2><br>Overall Rating</h2>
                                                <table>
                                                    <tr>
                                                        <th>Category</th>
                                                        <th>Rating</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Definitely Should Not Accept Paper</td>
                                                        <td><label for="overallRating1">
                                                                <input type="radio" id="overallRating1"
                                                                    name="overallRating" value="1">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Probably Should Not Accept Paper</td>
                                                        <td><label for="overallRating2">
                                                                <input type="radio" id="overallRating2"
                                                                    name="overallRating" value="2">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Uncertain About Acceptance of Paper</td>
                                                        <td><label for="overallRating3">
                                                                <input type="radio" id="overallRating3"
                                                                    name="overallRating" value="3">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Probably Should Accept Paper</td>
                                                        <td><label for="overallRating4">
                                                                <input type="radio" id="overallRating4"
                                                                    name="overallRating" value="4">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Definitely Should Accept Paper</td>
                                                        <td><label for="overallRating5">
                                                                <input type="radio" id="overallRating5"
                                                                    name="overallRating" value="5">
                                                            </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td>None</td>
                                                        <td><label for="overallRating0">
                                                                <input type="radio" id="overallRating0"
                                                                    name="overallRating"
                                                                    value="<?php echo $row2["OverallRating"] ?>"
                                                                    checked="checked">
                                                            </label></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <label>Overall Rating Comments:</label>

                                            <input type="text" name="overallRatingComments" class=" form-control"
                                                value="<?php echo $row2["OverallRatingComments"] ?>"
                                                placeholder="Enter Comments here: " maxlength="1000">
                                            <br>


                                            <h2><br>Comfort Level</h2>
                                            <table>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>None</th>
                                                    <th>Poor</th>
                                                    <th>Fair</th>
                                                    <th>Average</th>
                                                    <th>Good</th>
                                                    <th>Excellent</th>
                                                </tr>
                                                <tr>
                                                    <td>Comfort Level for Topic</td>
                                                    <td><label for="ComfortLevelTopic0">
                                                            <input type="radio" id="ComfortLevelTopic0"
                                                                name="ComfortLevelTopic"
                                                                value="<?php echo $row2["ComfortLevelTopic"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for=" ComfortLevelTopic1">
                                                            <input type="radio" id="ComfortLevelTopic1"
                                                                name="ComfortLevelTopic" value="1">
                                                        </label></td>
                                                    <td><label for="ComfortLevelTopic2">
                                                            <input type="radio" id="ComfortLevelTopic2"
                                                                name="ComfortLevelTopic" value="2">
                                                        </label></td>
                                                    <td><label for="ComfortLevelTopic3">
                                                            <input type="radio" id="ComfortLevelTopic3"
                                                                name="ComfortLevelTopic" value="3">
                                                        </label></td>
                                                    <td><label for="ComfortLevelTopic4">
                                                            <input type="radio" id="ComfortLevelTopic4"
                                                                name="ComfortLevelTopic" value="4">
                                                        </label></td>
                                                    <td><label for="ComfortLevelTopic5">
                                                            <input type="radio" id="ComfortLevelTopic5"
                                                                name="ComfortLevelTopic" value="5">
                                                        </label></td>
                                                </tr>

                                                <tr>
                                                    <td>Comfort Level Acceptability for Topic</td>
                                                    <td><label for="ComfortLevelAcceptability0">
                                                            <input type="radio" id="ComfortLevelAcceptability0"
                                                                name="ComfortLevelAcceptability"
                                                                value="<?php echo $row2["ComfortLevelAcceptability"] ?>"
                                                                checked="checked">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability1">
                                                            <input type="radio" id="ComfortLevelAcceptability1"
                                                                name="ComfortLevelAcceptability" value="1">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability2">
                                                            <input type="radio" id="ComfortLevelAcceptability2"
                                                                name="ComfortLevelAcceptability" value="2">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability3">
                                                            <input type="radio" id="ComfortLevelAcceptability3"
                                                                name="ComfortLevelAcceptability" value="3">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability4">
                                                            <input type="radio" id="ComfortLevelAcceptability4"
                                                                name="ComfortLevelAcceptability" value="4">
                                                        </label></td>
                                                    <td><label for="ComfortLevelAcceptability5">
                                                            <input type="radio" id="ComfortLevelAcceptability5"
                                                                name="ComfortLevelAcceptability" value="5">
                                                        </label></td>
                                                </tr>
                                            </table>
                                            <br>

                                            <input type="hidden" id="completeHidden" name="Complete" value='0'>
                                            <input type="checkbox" id="complete" name="Complete" value='1'
                                                <?php echo isChecked($row2["Complete"]) ?>>
                                            <label for="Complete" class="checkbox">Check if Complete</label>
                                            <br>

                                        </div>
                                        <div class="errors">
                                            <?php
                                                    if(isset($_SESSION['error'])){
                                                        foreach($_SESSION['error'] as $key=>$value){
                                                            if($key == 'noOtherDescription')
                                                                echo "<p style='font-size: 18px; color: red; text-align: center;'> {$value} </p>";
                                                        }
                                                    }
                                                ?>
                                        </div>


                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>

                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </main>
    </main>
</body>

<?php $mysqli->close(); ?>

</html>