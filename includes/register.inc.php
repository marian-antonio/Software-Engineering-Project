<?php

// so that user can't access this unless user has submitted
// information through either of the registration pages
if(isset($_POST["registerAuthor"]) || isset($_POST["registerReviewer"])){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    session_start();

    // receive data from registration forms
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

    // reviewer input only
    if(isset($_POST["registerReviewer"])){
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
    if (isset($_POST["registerAuthor"])){
        $originalLocation = "../authorRegistration.php";
        $userType = "author";
    }
    elseif (isset($_POST["registerReviewer"])){
        $originalLocation = "../reviewerRegistration.php";
        $userType = "reviewer";
    }

    // error handling functions
    $errors = array();

    if(emptyInputRegister($emailAddress, $password, $confirmPassword,
    $firstName, $lastName, $affiliation, $department,
    $address, $city, $state, $zipCode, $phoneNumber) !== false){
        $errors['emptyInput'] = "Please fill in all input boxes.";
    }

    if(invalidEmailAddress($emailAddress) !== false){
        $errors['invalidEmail'] = "Invalid Email.";
    }

    if(emailExists($conn, $emailAddress, $originalLocation, $userType) !== false){
        $errors['emailExists'] = "The email address you entered is already registered. Please enter a different email address.";
    }

    if(passwordMatch($password, $confirmPassword) !== false){
        $errors['passwordMatch'] = "Passwords do not match.";
    }

    if(passwordLength($password, $confirmPassword) !== false){
        $errors['passwordLength'] = "Password length must be a maximum of 5 characters.";
    }

    if ($userType == "reviewer"){
        if (array_sum($topicsArray) < 1){
            $errors['noTopics'] = "You must choose at least one topic.";
        }
        if ($topicsArray['other'] == 1 && empty($otherDescription)){
            $errors['noOtherDescription'] = "Please fill the text box for other topics.";
        }
    }
    
    // if any errors were found, return to previous page
    if(sizeof($errors) > 0){
        $_SESSION['error'] = $errors;
        header("location: " . $originalLocation . "?error=invalidInput");
        exit();
    }
    else{
    /* TODO
    - check if any boxes are checked
    - phone number follows correct format
    - middle initial only 1 char
    - how to avoid code injection
    - add error messages to appropriate parts
    - add stmt error messages
     */

    // user creation
        if (isset($_POST["registerAuthor"])){
            createAuthor($conn, $emailAddress, $password, $firstName, 
            $middleInitial, $lastName, $affiliation, $department, $address, 
            $city, $state, $zipCode, $phoneNumber, $userType, $originalLocation);
        }    
        if (isset($_POST["registerReviewer"])){
            // addTopics($conn, $emailAddress, $topicsArray, $otherDescription);
            createReviewer($conn, $emailAddress, $password, $firstName, 
            $middleInitial, $lastName, $affiliation, $department, $address, 
            $city, $state, $zipCode, $phoneNumber, $topicsArray, $otherDescription);
        }
        unset($_SESSION['error']);
    }
}
else{   // otherwise, user will be sent back to registration page
    header("location: ../registration.php?error");
}
