<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

session_start();
if(isset($_SESSION["userID"])){
    echo "<script>alert('Unauthorized Access.'); window.location = '../login.php';</script>";
}


if(isset($_POST['forgotPassword'])){
    
    $adminEmail = "cpms_noreply_test@yahoo.com"; // admin info is hardcoded

    $originalLocation = "../forgotPassword.php";

    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $accountType = mysqli_real_escape_string($conn, $_POST['accountType']);

    // Transfers data over to recoverPassword.inc.php
    $_SESSION['emailAddress'] = $emailAddress;
    $_SESSION['phoneNumber'] = $phoneNumber;
    $_SESSION['accountType'] = $accountType;

    // checks if phone number and email exists
    $errors = array();
    if($accountType == "author" || $accountType == "reviewer"){
        if(emailExists($conn, $emailAddress, $originalLocation, $accountType) == false){
            $errors['emailExists'] = "Could not find an account registered with the email address you entered.";
        }
        if(phoneNumberExists($conn, $phoneNumber, $originalLocation, $accountType) == false){
            $errors['phoneNumberExists'] = "Could not find an account registered with the phone number you entered.";
        }
    }

    elseif($accountType == "admin"){
        if($emailAddress !== $adminEmail){
            $errors['emailExists'] = "Could not find an account registered with the email address you entered.";
        }
    }
    if(empty($accountType)){
        $errors['selectUserType'] = "Please one of the account types that you would like to recover your password for.";
    }
    if(sizeof($errors) > 0){
        $_SESSION['error'] = $errors;
        header("location: " . $originalLocation . "?error=input");
        exit();
    }
    // proceeds to password recovery
    else{
        $_SESSION["forgotPassword"] = 1;
        header("location: ../recoverPassword.php");
    }
    
}

else{
    header("location: ../forgotPassword.php?unknown");
}