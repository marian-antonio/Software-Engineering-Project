<?php

function emptyInputRegister($emailAddress, $password, $confirmPassword,
$firstName, $lastName, $affiliation, $department, $address, 
$city, $state, $zipCode, $phoneNumber)
{
    $result;
    if(empty($emailAddress) || empty($password) || empty($confirmPassword) || 
    empty($firstName) || empty($lastName) || empty($affiliation) || empty($department) ||
    empty($address) || empty($city) || empty($state) || empty($zipCode) || empty($phoneNumber))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmailAddress($emailAddress){
    $result;
    if(!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $confirmPassword){
    $result;
    if($password !== $confirmPassword){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function passwordLength($password, $confirmPassword){
    $result;
    if(strlen($password) > 5){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emailExists($conn, $emailAddress, $location, $userType){
    $result;
    $statement = mysqli_stmt_init($conn);
    $check_query = "SELECT * FROM $userType WHERE EmailAddress = ?;";
    if(!mysqli_stmt_prepare($statement, $check_query)){
        header("location: " . $originalLocation . "?error=stmtfailed" );
        exit();
    }
    mysqli_stmt_bind_param($statement, "s", $emailAddress);
    mysqli_stmt_execute($statement);

    $resultStmt = mysqli_stmt_get_result($statement);

    if($row = mysqli_fetch_assoc($resultStmt)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($statement);
}

function createAuthor($conn, $emailAddress, $password, $firstName, $middleInitial, $lastName, 
    $affiliation, $department, $address, $city, $state, $zipCode, $phoneNumber, $userType, $originalLocation){

    $statement = mysqli_stmt_init($conn);
    $insert_query = "INSERT INTO $userType (FirstName, MiddleInitial, LastName, Affiliation, Department, 
                    Address, City, State, ZipCode, PhoneNumber, EmailAddress, Password) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    if(!mysqli_stmt_prepare($statement, $insert_query)){
        header("location: " . $originalLocation . "?error=stmtfailed" );
        exit();
    }
    mysqli_stmt_bind_param($statement, "ssssssssssss", $firstName, $middleInitial, $lastName, $affiliation, 
        $department, $address, $city, $state, $zipCode, $phoneNumber, $emailAddress, $password);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);       
}

function createReviewer($conn, $emailAddress, $password, $firstName, 
    $middleInitial, $lastName, $affiliation, $department, $address, 
    $city, $state, $zipCode, $phoneNumber, $topicsArray, $otherDescription){
    
    $statement = mysqli_stmt_init($conn);
    $insert_query = "INSERT INTO reviewer (FirstName, MiddleInitial, LastName, Affiliation, Department, 
                    Address, City, State, ZipCode, PhoneNumber, EmailAddress, Password,
                    AnalysisOfAlgorithms, Applications, Architecture, ArtificialIntelligence, 
                    ComputerEngineering, Curriculum, DataStructures, DatabasesColumn, DistancedLearning,
                    DistributedSystems, EthicalSocietalIssues, FirstYearComputing, GenderIssues,
                    GrantWriting, GraphicsImageProcessing, HumanComputerInteraction, 
                    LaboratoryEnvironments, Literacy, MathematicsInComputing, Multimedia, 
                    NetworkingDataCommunications, NonMajorCourses, ObjectOrientedIssues, OperatingSystems,
                    ParallelProcessing, Pedagogy, ProgrammingLanguages, Research, Security, SoftwareEngineering,
                    SystemsAnalysisAndDesign, UsingTechnologyInTheClassroom, WebAndInternetProgramming,
                    Other, OtherDescription) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
                                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    if(!mysqli_stmt_prepare($statement, $insert_query)){
        header("location: ../reviewerRegistration.php?error=queryfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ssssssssssssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiis", $firstName, $middleInitial, $lastName, $affiliation, 
        $department, $address, $city, $state, $zipCode, $phoneNumber, $emailAddress, $password, 
        $topicsArray["analysisOfAlgorithms"],
        $topicsArray["applications"], 
        $topicsArray["architecture"], 
        $topicsArray["artificialIntelligence"], 
        $topicsArray["computerEngineering"], 
        $topicsArray["curriculum"], 
        $topicsArray["dataStructures"], 
        $topicsArray["databases"], 
        $topicsArray["distanceLearning"], 
        $topicsArray["distributedSystems"], 
        $topicsArray["ethicalSocietalIssues"], 
        $topicsArray["firstYearComputing"], 
        $topicsArray["genderIssues"], 
        $topicsArray["grantWriting"], 
        $topicsArray["graphicsImageProcessing"], 
        $topicsArray["humanComputerInteraction"], 
        $topicsArray["laboratoryEnvironments"], 
        $topicsArray["literacy"], 
        $topicsArray["mathematicsInComputing"], 
        $topicsArray["multimedia"], 
        $topicsArray["networkingDataCommunications"], 
        $topicsArray["nonMajorCourses"], 
        $topicsArray["objectOrientedIssues"], 
        $topicsArray["operatingSystems"], 
        $topicsArray["parallelProcessing"], 
        $topicsArray["pedagogy"], 
        $topicsArray["programmingLanguages"], 
        $topicsArray["research"], 
        $topicsArray["security"], 
        $topicsArray["softwareEngineering"], 
        $topicsArray["systemsAnalysisAndDesign"], 
        $topicsArray["usingTechnologyInTheClassroom"], 
        $topicsArray["webAndInternetProgramming"], 
        $topicsArray["other"],
        $otherDescription        
    );

    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../login.php?reviewerRegistration=success");
}

// function addTopics($conn, $emailAddress, $topicsArray, $otherDescription){
//     $query = "UPDATE reviewer SET
//             AnalysisOfAlgorithms='$topicsArray[analysisOfAlgorithms]', 
//             Applications='$topicsArray[applications]', 
//             Architecture='$topicsArray[architecture]', 
//             ArtificialIntelligence='$topicsArray[artificialIntelligence]',
//             ComputerEngineering='$topicsArray[computerEngineering]', 
//             Curriculum='$topicsArray[curriculum]', 
//             DataStructures='$topicsArray[dataStructures]', 
//             DatabasesColumn='$topicsArray[databasesColumn]', 
//             DistancedLearning='$topicsArray[distanceLearning]',
//             DistributedSystems='$topicsArray[distributedSystems]',
//             EthicalSocietalIssues='$topicsArray[ethicalSocietalIssues]', 
//             FirstYearComputing='$topicsArray[firstYearComputing]', 
//             GenderIssues='$topicsArray[genderIssues]',
//             GrantWriting='$topicsArray[grantWriting]', 
//             GraphicsImageProcessing='$topicsArray[graphicsImageProcessing]', 
//             HumanComputerInteraction='$topicsArray[humanComputerInteraction]', 
//             LaboratoryEnvironments='$topicsArray[laboratoryEnvironments]', 
//             Literacy='$topicsArray[literacy]', 
//             MathematicsInComputing='$topicsArray[mathematicsInComputing]', 
//             Multimedia='$topicsArray[multimedia]', 
//             NetworkingDataCommunications='$topicsArray[networkingDataCommunications]', 
//             NonMajorCourses='$topicsArray[nonMajorCourses]', 
//             ObjectOrientedIssues='$topicsArray[objectOrientedIssues]', 
//             OperatingSystems='$topicsArray[operatingSystems]',
//             ParallelProcessing='$topicsArray[parallelProcessing]', 
//             Pedagogy='$topicsArray[pedagogy]', 
//             ProgrammingLanguages='$topicsArray[programmingLanguages]', 
//             Research='$topicsArray[research]', 
//             Security='$topicsArray[security]', 
//             SoftwareEngineering='$topicsArray[softwareEngineering]',
//             SystemsAnalysisAndDesign='$topicsArray[systemsAnalysisAndDesign]', 
//             UsingTechnologyInTheClassroom='$topicsArray[usingTechnologyInTheClassroom]', 
//             WebAndInternetProgramming='$topicsArray[webAndInternetProgramming]',
//             Other='$topicsArray[other]', 
//             OtherDescription='$otherDescription'
//             WHERE EmailAddress='$emailAddress'";
//     if(!mysqli_query($conn, $query)){
//         header("location: ../reviewerRegistration.php?error=addTopics");
//         exit();
//     }
//     else
//         header("location: ../login.php?registration=successReviewer");
// }

function emptyInputLogin($emailAddress, $password, $accountType)
{
    $result;
    if(empty($emailAddress) || empty($password) || empty($accountType))
    {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function userLogin($conn, $emailAddress, $password, $accountType){
    // admin credentials are hardcoded
    if ($accountType == "admin"){
        if($emailAddress == "admin@CPMS.com" && $password == "aaaaa")
        session_start();
        header("location: ../adminPages/adminHome.php?login=success");
        $userID = "99999";
    }
    else{   /* for either author or reviewer log in */
        $location = "../login.php";
        // check db for user
        $user = emailExists($conn, $emailAddress, $location, $accountType);
        if ($user == false){    // user not found in db
            header("location: " . $location . "?error=invalidCredentials");
            exit();
        }
        // get password from db
        $dbPassword = $user["Password"];
        if($password != $dbPassword){
            header("location: " . $location . "?error=invalidCredentials");
            exit();
        }
        elseif($password == $dbPassword){
            session_start();
            $_SESSION["userType"] = $accountType;
            if($accountType == "author"){
                $_SESSION["userID"] = $user["AuthorID"];
                header("location: ../authorPages/authorHome.php?login=success");
            }
            elseif($accountType == "reviewer"){
                $_SESSION["userID"] = $user["ReviewerID"];
                header("location: ../reviewerPages/reviewerHome.php?login=success");
            }
        }
    }
}