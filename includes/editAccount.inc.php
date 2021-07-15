<?php

session_start();
if(isset($_SESSION["userID"]) && (isset($_POST["editAuthorAccount"]) || isset($_POST["editReviewerAccount"]))){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $middleInitial = mysqli_real_escape_string($conn, $_POST['middleInitial']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $affiliation = mysqli_real_escape_string($conn, $_POST['affiliation']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $zipCode = mysqli_real_escape_string($conn, $_POST['zipCode']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $userID = $_SESSION["userID"];

    // reviewer input only
    if(isset($_POST["editReviewerAccount"])){
        // from functions.inc.php
        $topicsArray= getTopics();

        if($topicsArray['other'] == 1){
            $otherDescription = mysqli_real_escape_string($conn, $_POST['otherDescription']);
        }
        else{
            $otherDescription = ''; 
        }
    }

    // author vs reviewer declarations for functions
    if (isset($_POST["editAuthorAccount"])){
        $originalLocation = "../authorPages/editAuthorAccount.php";
        $userType = "author";
    }
    elseif (isset($_POST["editReviewerAccount"])){
        $originalLocation = "../reviewerPages/editReviewerAccount.php";
        $userType = "reviewer";
    }

    $row = userExists($conn, $userID, $originalLocation, $userType);
    $currentEmail = $row['EmailAddress'];

    // error handling
    $errors = array();
    if(emailExists($conn, $emailAddress, $originalLocation, $userType) !== false){
        if($emailAddress != $currentEmail)
            $errors['emailExists'] = "The email address you entered is already registered. Please enter a different email address.";
    }
    if(passwordMatch($password, $confirmPassword) !== false){
        $errors['passwordMatch'] = "Passwords do not match.";
    }
    if ($userType == "reviewer"){
        if (array_sum($topicsArray) < 1){
            $errors['noTopics'] = "You must choose at least one topic.";
        }
        if ($topicsArray['other'] == 1 && empty($otherDescription)){
            $errors['noOtherDescription'] = "Please fill the text box for other topics.";
        }
    }
    if(sizeof($errors) > 0){
        $_SESSION['error'] = $errors;
        header("location: " . $originalLocation . "?error=invalidInput");
        exit();
    }
    else{
        editAccountBasic($conn, $userID, $emailAddress, $password, $firstName, $middleInitial, $lastName, 
            $affiliation, $department, $address, $city, $state, $zipCode, $phoneNumber, $userType, $originalLocation);
        if($userType == "author"){
            echo "<script>alert('Account successfully updated.'); window.location = '../authorPages/authorAccount.php';</script>";
        }
        elseif ($userType == "reviewer") {
            editTopics($conn, $userID, $topicsArray, $otherDescription);
            echo "<script>alert('Account successfully updated.'); window.location = '../reviewerPages/reviewerAccount.php';</script>";
        }
    }
}
else{
    echo "<script>alert('Unauthorized Access.'); window.location = '../login.php?error=invalidAccess';</script>";
}