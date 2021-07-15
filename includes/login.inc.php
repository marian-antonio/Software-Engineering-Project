<?php

if (isset($_POST["loginButton"])){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // receive data from login form
    $emailAddress = strtolower(mysqli_real_escape_string($conn, $_POST['emailAddress']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $accountType = mysqli_real_escape_string($conn, $_POST['accountType']);

    // input validation
    if(empty($accountType)){
        header("location: ../login.php?error=selectType");
        exit();
    }
    userLogin($conn, $emailAddress, $password, $accountType);
}
else{
    header("location: ../login.php");
}