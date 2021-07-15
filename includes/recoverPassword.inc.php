<?php

session_start();
if(isset($_SESSION["userID"])){
    echo "<script>alert('Unauthorized Access.'); window.location = '../login.php';</script>";
}

// so that user can't access this unless user has submitted
// information through either of the registration pages
if(isset($_POST['recoverPassword'])){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    session_start();

    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // receives data from forgotPassword.inc.php
    $accountType = $_SESSION['accountType'];
    $emailAddress = $_SESSION['emailAddress'];
    $phoneNumber = $_SESSION['phoneNumber'];

    // checks if passwords match
    $errors = array();
    if(passwordMatch($password, $confirmPassword) !== false){
        $errors['passwordMatch'] = "Passwords do not match.";
    }

    if(sizeof($errors) > 0){
        $_SESSION['error'] = $errors;
        header("location: ../recoverPassword.php?error=input");
        exit();
    }
    // if there are no errors, replaces password and proceeds to the login page
    else{
        $sql = "UPDATE $accountType SET Password='$password' WHERE EmailAddress='$emailAddress' and PhoneNumber='$phoneNumber'";
        $result = mysqli_query($conn, $sql);
        if($result){
         header("location: ../login.php?recoverPassword=success");
        }
    }
}
else{
    echo "<script>alert('Unauthorized Access.'); window.location = '../login.php';</script>";
}