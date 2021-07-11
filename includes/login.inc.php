<?php

if (isset($_POST["loginButton"])){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // receive data from login form
    $emailAddress = mysqli_real_escape_string($conn, $_POST['emailAddress']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $accountType = mysqli_real_escape_string($conn, $_POST['accountType']);

    $errors = array();
    // input validation
    if (emptyInputLogin($emailAddress, $password, $accountType)){
        $errors['emptyInput'] = "Please fill in email, password, and select account type!";
    }

    // if any errors were found, return to login page
    if(sizeof($errors) > 0){
        $_SESSION['error'] = $errors;
        header("location: ../login.php?error=input");
        exit();
    }

    userLogin($conn, $emailAddress, $password, $accountType);
}
else{
    header("location: ../login.php");
}