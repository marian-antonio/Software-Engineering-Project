<?php

session_start();


if(($_SERVER["REQUEST_METHOD"] == "POST") && isset($_SESSION["userID"]) && ($_SESSION["userType"] == "author")){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    $paperTitle = mysqli_real_escape_string($conn, $_POST['paperTitle']);
    $fileNameOriginal = $_FILES['paperUpload']["name"];
    $fileName = "paper" . $_SESSION["userID"];  // new filename to submit to database
    $fileExtension = pathinfo($fileNameOriginal, PATHINFO_EXTENSION);
    $noteToReviewers = mysqli_real_escape_string($conn, $_POST['noteToReviewers']);
    $topicsArray = getTopics();
    if($topicsArray['other'] == 1){
        $otherDescription = mysqli_real_escape_string($conn, $_POST['otherDescription']);
    }
    else{
        $otherDescription = " ";
    }

    // where files are stored locally so that reviewer can download later
    $file = $_FILES['paperUpload']['tmp_name'];
    $fileName =  $fileName . "." . $fileExtension;
    $destination = '../paperUploads/' . $fileName;
    
    // input validation
    $errors = array();
    $ext = array('doc', 'pdf');     // valid file types
    if(in_array($fileExtension, $ext) === FALSE){
        $errors['invalidExtension'] = "Invalid file type. Please upload either a .doc or .pdf file.";
    }
    if(array_sum($topicsArray) < 1){
        $errors['noTopics'] = "You must choose at least one topic.";
    }
    if($topicsArray['other'] == 1 && empty($otherDescription)){
        $errors['noOtherDescription'] = "Please fill the text box for other topics.";
    }
    // exit if any of the errors above were found
    if(sizeof($errors) > 0){
        $_SESSION['error'] = $errors;
        header("location: ../authorPages/submitPaper.php?error=input");
        exit();
    }
    else{
        submitPaper($conn, $_SESSION["userID"], $fileNameOriginal, $fileName, $paperTitle, $fileExtension,
            $noteToReviewers, $topicsArray, $otherDescription, $file, $destination);
    }
}
else{
    echo "<script>alert('Unauthorized Access.'); window.location = '../authorPages/submitPaper.php';</script>";
}