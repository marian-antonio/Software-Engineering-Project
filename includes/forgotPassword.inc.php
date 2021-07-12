<?php

if(isset($_POST['recoverPassword'])){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $adminEmail = "cpms_noreply_test@yahoo.com"; // admin info is hardcoded

    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
    $accountType = mysqli_real_escape_string($conn, $_POST['accountType']);

    $originalLocation = "../forgotPassword.php";

    $errors = array();
    if($accountType == "author" || $accountType == "reviewer"){
        if(emailExists($conn, $emailAddress, $originalLocation, $accountType) === false){
            $errors['emailExists'] = "Could not find an account registered with the email address you entered.";
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
        header("location: " . $originalLocation . "?error=invalidInput");
        exit();
    }
    else{
        recoverPassword($conn, $emailAddress, $accountType, $originalLocation);
    }
}
else{
    header("location: ../forgotPassword.php?error");
}