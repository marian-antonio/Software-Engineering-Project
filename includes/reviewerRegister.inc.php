<?php

// so that user can't access this unless user has submitted
// information through either of the registration pages
if(isset($_POST["registerAuthor"]) or isset($_POST["registerReviewer"])){
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

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
        //topics
        $analysisOfAlgorithms = $_POST['analysisOfAlgorithms'];
        $applications = $_POST['applications'];
        $architecture = $_POST['architecture'];
        $artificialIntelligence = $_POST['artificialIntelligence'];
        $computerEngineering = $_POST['computerEngineering'];
        $curriculum = $_POST['curriculum'];
        $dataStructures = $_POST['dataStructures'];
        $databases = $_POST['databases'];
        $distanceLearning = $_POST['distanceLearning'];
        $distributedSystems = $_POST['distributedSystems'];
        $ethicalSocietalIssues = $_POST['ethicalSocietalIssues'];
        $firstYearComputing = $_POST['firstYearComputing'];
        $genderIssues = $_POST['genderIssues'];
        $grantWriting = $_POST['grantWriting'];
        $graphicsImageProcessing = $_POST['graphicsImageProcessing'];
        $humanComputerInteraction = $_POST['humanComputerInteraction'];
        $laboratoryEnvironments = $_POST['laboratoryEnvironments'];
        $literacy = $_POST['literacy'];
        $mathematicsInComputing = $_POST['mathInComputing'];
        $multimedia = $_POST['multimedia'];
        $networkingDataCommunications = $_POST['networkDataCommunications'];
        $nonMajorCourses = $_POST['nonMajorCourses'];
        $objectOrientedIssues = $_POST['objectOrientedIssues'];
        $operatingSystems = $_POST['operatingSystems'];
        $parallelProcessing = $_POST['parallelProcessing'];
        $pedagogy = $_POST['pedagogy'];
        $programmingLanguages = $_POST['programmingLanguages'];
        $research = $_POST['research'];
        $security = $_POST['security'];
        $softwareEngineering = $_POST['softwareEngineering'];
        $systemsAnalysisAndDesign = $_POST['systemsAnalysisDesign'];
        $usingTechnologyInTheClassroom = $_POST['technologyClassroom'];
        $webAndInternetProgramming = $_POST['webProgramming'];
        $other = $_POST['other'];

        if(isset($_POST["other"])){
            $otherDescription = mysqli_real_escape_string($conn, $_POST['otherDescription']);
        }
        else
            $otherDescription = "N/A";
    }

    // error handling

    if(emptyInput($emailAddress, $password, $confirmPassword,
    $firstName, $lastName, $affiliation, $department,
    $address, $city, $state, $zipCode, $phoneNumber) !== false){
        header("location: ../authorRegistration.php?error=emptyinput");
        exit();
    }

    if(invalidEmailAddress($emailAddress) !== false){
        header("location: ../authorRegistration.php?error=invalidemail");
        exit();
    }

    if(emailExists($conn, $emailAddress) !== false){
        header("location: ../authorRegistration.php?error=emailexists");
        exit();
    }

    if(passwordMatch($password, $confirmPassword) !== false){
        header("location: ../authorRegistration.php?error=passwordmismatch");
        exit();
    }

    if(passwordLength($password, $confirmPassword) !== false){
        header("location: ../authorRegistration.php?error=passwordtoolong");
        exit();
    }
    
    createUser($conn, $name, $emailAddress, $password, $firstName, 
    $middleInitial, $lastName, $affiliation, $department, $address, 
    $city, $state, $zipCode, $phoneNumber);

}
else{   // otherwise, user will be sent back to registration page
    header("location: ../registration.html");
}