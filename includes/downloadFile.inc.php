<?php 
session_start();

if(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "reviewer") && isset($_GET["fileName"])){
    require_once "dbh.inc.php";

    $fileName = $_GET["fileName"];
    // path changes depending on the programmer's folders
    // in this case, the submitted papers are all stored in ../paperUploads
    $path= "../paperUploads/".$fileName;
    
    //use basename($path) otherwise it will download the paper with the full path as its name
    header('Content-Disposition: attachment; fileName='.basename($path));
    readfile($path);
    exit();
}
else{
    echo "<script>alert('Unauthorized Access.'); window.location = '../reviewerPages/toReview.php?error=invalidAccess';</script>";
}
