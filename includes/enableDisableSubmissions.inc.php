<?php

session_start();

if(isset($_POST["submitToggleResult"]) && isset($_SESSION["userID"]) && ($_SESSION["userType"] == "admin")){
    require_once 'dbh.inc.php';

    $reviewToggle = mysqli_real_escape_string($conn, $_POST['reviewToggle']);
    $paperToggle = mysqli_real_escape_string($conn, $_POST['paperToggle']);

    $query = "UPDATE defaults SET EnabledReviewers='$reviewToggle', EnabledAuthors='$paperToggle' WHERE EnabledReviewers>=0;";
    if(!mysqli_query($conn, $query)){
        echo "<script>alert('Internal Error. Please try again later.'); window.location = '../adminPages/submissionControl.php';</script>";
        exit();
    }
    echo "<script>alert('Changes successfully saved!'); window.location = '../adminPages/submissionControl.php';</script>";

}
else{
    echo "<script>alert('Unauthorized Access.'); window.location = '../adminPages/submissionControl.php';</script>";
}