<?php

session_start();

if(isset($_POST["assignReviewersSubmit"]) && isset($_SESSION["userID"]) && ($_SESSION["userType"] == "admin")){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $reviewerIdString = mysqli_real_escape_string($conn, $_POST['reviewerIDs']);
    $paperID = mysqli_real_escape_string($conn, $_POST['paperID']);

    $reviewerIdArray = explode(" ", $reviewerIdString);
    $numberReviewers = sizeof($reviewerIdArray);


    $errors = array();
    if($numberReviewers == 0){
        $errors['emptySelection'] = "You need to select at least 1 reviewer.";
    }

    if(sizeof($errors) > 0){
        $_SESSION['error'] = $errors;
        header("location: " . $originalLocation . "?error=invalidInput");
        exit();
    }
    else{
        foreach($reviewerIdArray as $reviewerID){
            createReviewRow($conn, $paperID, $reviewerID);
        }
        echo "<script>alert('Reviewers successfully assigned!'); window.location = '../adminPages/toAssignReviewer.php';</script>";
    }
}
else{
    header("location: ../adminPages/toAssignReviewer.php?error=unauthorizedAccess");
}