<?php

session_start();

if(isset($_POST['submitReviewButton']) && isset($_SESSION["userID"]) && ($_SESSION["userType"] == "reviewer")){
    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    $reviewID = mysqli_real_escape_string($conn, $_POST["reviewID"]);
    $reviewerID = mysqli_real_escape_string($conn, $_SESSION["userID"]);
    $appropriatenessOfTopic = mysqli_real_escape_string($conn, $_POST['appropriatenessOfTopic']);
    $timelinessOfTopic = mysqli_real_escape_string($conn, $_POST['timelinessOfTopic']);
    $supportiveEvidence = mysqli_real_escape_string($conn, $_POST['supportiveEvidence']);
    $technicalQuality = mysqli_real_escape_string($conn, $_POST['technicalQuality']);
    $scopeOfCoverage = mysqli_real_escape_string($conn, $_POST['scopeOfCoverage']);
    $citationOfPreviousWork = mysqli_real_escape_string($conn, $_POST['citationOfPreviousWork']);
    $originality = mysqli_real_escape_string($conn, $_POST['originality']);
    $contentComments = mysqli_real_escape_string($conn, $_POST['contentComments']);
    $organizationOFPaper = mysqli_real_escape_string($conn, $_POST['organizationOfPaper']);
    $clarityOfMainMessage = mysqli_real_escape_string($conn, $_POST['clarityOfMessage']);
    $mechanics = mysqli_real_escape_string($conn, $_POST['mechanics']);
    $writtenDocumentComments = mysqli_real_escape_string($conn, $_POST['writtenDocumentComments']);
    $suitabilityForPresentation = mysqli_real_escape_string($conn, $_POST['suitabilityForPresentation']);
    $potentialInterestInTopic = mysqli_real_escape_string($conn, $_POST['potentialInterestInTopic']);
    $potentialForOralPresentationComments = mysqli_real_escape_string($conn, $_POST['potentialForOralPresentationComments']);
    $overallRating = mysqli_real_escape_string($conn, $_POST['overallRating']);
    $overallRatingComments = mysqli_real_escape_string($conn, $_POST['overallRatingComments']);
    $comfortLevelTopic = mysqli_real_escape_string($conn, $_POST['comfortLevelTopic']);
    $comfortLevelAcceptability = mysqli_real_escape_string($conn, $_POST['comfortLevelAcceptability']);
    
    $errors = array();

    if(sizeof($errors) > 0){
        $_SESSION['error'] = $errors;
        header("location: ../reviewerPages/reviewPage.php?error=input");
        exit();
    }
    else{
        /*
            These variables will be used for parameterized queries
            $insertValues are the value that will be posted into the table
            $columnNames are the exact column names in the table
            $stringType lists all the types of the insertValues IN ORDER of the array input
            those three variables need to correspond to each other and have the same array size
        */
        $insertValues = array($reviewID, $appropriatenessOfTopic, $timelinessOfTopic, $supportiveEvidence,
            $technicalQuality, $scopeOfCoverage, $citationOfPreviousWork, $originality, $contentComments,
            $organizationOFPaper, $clarityOfMainMessage, $mechanics, $writtenDocumentComments, $suitabilityForPresentation,
            $potentialInterestInTopic, $potentialForOralPresentationComments, $overallRating, $overallRatingComments,
            $comfortLevelTopic, $comfortLevelAcceptability, 1);
        $columnNames = array("ReviewID", "AppropriatenessOfTopic", "TimelinessOfTopic", "SupportiveEvidence", 
            "TechnicalQuality", "ScopeOfCoverage", "CitationOfPreviousWork", "Originality", "ContentComments",
            "OrganizationOfPaper", "ClarityOfMainMessage", "Mechanics", "WrittenDocumentComments", "SuitabilityForPresentation",
            "PotentialInterestInTopic", "PotentialForOralPresentationComments", "OverallRating", "OverallRatingComments",
            "ComfortLevelTopic", "ComfortLevelAcceptability", "Complete");

        // i=int, d=double, s=string
        $stringTypes = "idddddddsdddsddsdsddi";
        $tableName = 'review';
        $idType = 'ReviewID';
        $redirectLink = "../reviewerPages/toReview.php";  // page the user will be redirected to after success or error
        if(updateRow($conn, $reviewID, $idType, $columnNames, $insertValues, $tableName, $redirectLink))
            echo "<script>alert('Review form submitted.'); window.location = '".$redirectLink."';</script>";
    }
}
else{
    echo "<script>alert('Unauthorized Access.'); window.location = '../reviewerPages/toReview.php';</script>";
}

