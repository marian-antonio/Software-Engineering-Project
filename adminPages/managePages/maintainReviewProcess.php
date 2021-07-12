<?php
  session_start();

  include_once 'config.php';

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

    header("location: maintainReviews.php");
}

if(isset($_GET['edit'])){

}

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

    header("location: maintainReviews.php");
}



if(isset($_GET['delete'])){
$ReviewID = $_GET['delete'];
$sql = ("DELETE FROM `review`
WHERE ReviewID = '$ReviewID' ;") ;
$result = $mysqli->query($sql) or die($mysqli->error());


$_SESSION['message'] = "Record has been Deleted!";
$_SESSION['msg_type'] = "danger";

header("location: maintainReviews.php");
}

?>