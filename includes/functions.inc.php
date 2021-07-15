<?php

function userLogin($conn, $emailAddress, $password, $accountType){
    // admin credentials are hardcoded
    // email = cpms_noreply_test@yahoo.com
    // password = aaaaa
    if ($accountType == "admin"){
        if($emailAddress == "cpms_noreply_test@yahoo.com" && $password == "aaaaa"){
            session_start();
            $_SESSION["userID"] = "99999";
            $_SESSION["userType"] = "admin";
            header("location: ../adminPages/adminHome.php?login=success");
        }
        elseif($emailAddress != "cpms_noreply_test@yahoo.com" || $password != "aaaaa"){
            header("location:../login.php?error=invalidCredentials");
            exit();
        }
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

function phoneNumberExists($conn, $phoneNumber, $location, $userType){
    $result;
    $statement = mysqli_stmt_init($conn);

    $check_query = "SELECT * FROM $userType WHERE PhoneNumber = ?;";
    if(!mysqli_stmt_prepare($statement, $check_query)){
        header("location: " . $location . "?error=stmtfailed" );
        exit();
    }
    mysqli_stmt_bind_param($statement, "s", $phoneNumber);
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

// goes through the database for each usertype and checks if the email is already registered
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

// used in registerReviewer and submitPaper to store checkbox inputs
function getTopics(){
    $result = array(
        "analysisOfAlgorithms" => $_POST['analysisOfAlgorithms'], 
        "applications" => $_POST['applications'],
        "architecture" => $_POST['architecture'],
        "artificialIntelligence" => $_POST['artificialIntelligence'],
        "computerEngineering" => $_POST['computerEngineering'],
        "curriculum" => $_POST['curriculum'],
        "dataStructures" => $_POST['dataStructures'],
        "databasesColumn" => $_POST['databases'],
        "distanceLearning" => $_POST['distanceLearning'],
        "distributedSystems" => $_POST['distributedSystems'],
        "ethicalSocietalIssues" => $_POST['ethicalSocietalIssues'],
        "firstYearComputing" => $_POST['firstYearComputing'],
        "genderIssues" => $_POST['genderIssues'],
        "grantWriting" => $_POST['grantWriting'],
        "graphicsImageProcessing" => $_POST['graphicsImageProcessing'],
        "humanComputerInteraction" => $_POST['humanComputerInteraction'],
        "laboratoryEnvironments" => $_POST['laboratoryEnvironments'],
        "literacy" => $_POST['literacy'],
        "mathematicsInComputing" => $_POST['mathInComputing'],
        "multimedia" => $_POST['multimedia'],
        "networkingDataCommunications" => $_POST['networkDataCommunications'],
        "nonMajorCourses" => $_POST['nonMajorCourses'],
        "objectOrientedIssues" => $_POST['objectOrientedIssues'],
        "operatingSystems" => $_POST['operatingSystems'],
        "parallelProcessing" => $_POST['parallelProcessing'],
        "pedagogy" => $_POST['pedagogy'],
        "programmingLanguages" => $_POST['programmingLanguages'],
        "research" => $_POST['research'],
        "security" => $_POST['security'],
        "softwareEngineering" => $_POST['softwareEngineering'],
        "systemsAnalysisAndDesign" => $_POST['systemsAnalysisDesign'],
        "usingTechnologyInTheClassroom" => $_POST['technologyClassroom'],
        "webAndInternetProgramming" => $_POST['webProgramming'],
        "other" => $_POST['other']
    );
    return $result;
}

// checks if an entity ID (for author/reviewer/paper/author) already exists
// returns an array of the entire row corresponding to the ID
// location tracks where the user came from or should be redirected to
// should the mysql query fail
function userExists($conn, $userID, $location, $userType){
    $result;
    $statement = mysqli_stmt_init($conn);
    if($userType == "author"){
        $column = "AuthorID";
    }
    elseif($userType == "reviewer"){
        $column = "ReviewerID";
    }
    elseif($userType == "paper"){
        $column = "PaperID";
    }
    elseif($userType == "review"){
        $column == "ReviewID";
    }

    $check_query = "SELECT * FROM $userType WHERE $column = ?;";
    if(!mysqli_stmt_prepare($statement, $check_query)){
        header("location: " . $originalLocation . "?error=stmtfailed" );
        exit();
    }
    mysqli_stmt_bind_param($statement, "i", $userID);
    mysqli_stmt_execute($statement);

    //row result from the database corresponding to the ID
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


// ENTITY CREATION FUNCTIONS
function createAuthor($conn, $emailAddress, $password, $firstName, $middleInitial, $lastName, 
    $affiliation, $department, $address, $city, $state, $zipCode, $phoneNumber, $userType, $originalLocation){

    $statement = mysqli_stmt_init($conn);
    // parameterizing
    $insert_query = "INSERT INTO $userType (FirstName, MiddleInitial, LastName, Affiliation, Department, 
                    Address, City, State, ZipCode, PhoneNumber, EmailAddress, Password) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    // checks if its a valid query
    // fails if any of the parameters do not match (e.g. wrong spelling, capitalization, mismatched number of variables)
    if(!mysqli_stmt_prepare($statement, $insert_query)){
        header("location: " . $originalLocation . "?error=stmtfailed" );
        exit();
    }

    // binds each data to values above, the letters in the quotation marks correspond to the data type in the table
    mysqli_stmt_bind_param($statement, "ssssssssssss", $firstName, $middleInitial, $lastName, $affiliation, 
        $department, $address, $city, $state, $zipCode, $phoneNumber, $emailAddress, $password);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../login.php?authorRegistration=success" );
}

function createReviewer($conn, $emailAddress, $password, $firstName, 
    $middleInitial, $lastName, $affiliation, $department, $address, 
    $city, $state, $zipCode, $phoneNumber, $topicsArray, $otherDescription){
    
    $statement = mysqli_stmt_init($conn);

    // parameterizing
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

    // checks if its a valid query
    // fails if any of the parameters do not match (e.g. wrong spelling, capitalization, mismatched number of variables)
    if(!mysqli_stmt_prepare($statement, $insert_query)){
        header("location: ../reviewerRegistration.php?error=queryfailed");
        exit();
    }

    // binds each data to values above, the letters in the quotation marks correspond to the data type in the table
    mysqli_stmt_bind_param($statement, "ssssssssssssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiis", $firstName, $middleInitial, $lastName, $affiliation, 
        $department, $address, $city, $state, $zipCode, $phoneNumber, $emailAddress, $password, 
        $topicsArray["analysisOfAlgorithms"],
        $topicsArray["applications"], 
        $topicsArray["architecture"], 
        $topicsArray["artificialIntelligence"], 
        $topicsArray["computerEngineering"], 
        $topicsArray["curriculum"], 
        $topicsArray["dataStructures"], 
        $topicsArray["databasesColumn"], 
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

    // posts the data to the DB, then closes the connection and redirects user to login page
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../login.php?reviewerRegistration=success");
}

function editAccountBasic($conn, $userID, $emailAddress, $password, $firstName, $middleInitial, $lastName, 
$affiliation, $department, $address, $city, $state, $zipCode, $phoneNumber, $userType, $location){
    if($userType == "author"){
        $dbID = "AuthorID";
    }
    elseif($userType == "reviewer"){
        $dbID = "ReviewerID";
    }
    $query = "UPDATE $userType SET 
        FirstName='$firstName', MiddleInitial='$middleInitial', LastName='$lastName',
        Affiliation='$affiliation', Department='$department', Address='$address',
        City='$city', State='$state', ZipCode='$zipCode', PhoneNumber='$phoneNumber',
        EmailAddress='$emailAddress', Password='$password'
        WHERE $dbID='$userID'";

        if(!mysqli_query($conn, $query)){
            header("location: " . $location . "?error=queryFail");
            exit();
        }
        else{
            
        } 
}

function editTopics($conn, $userID, $topicsArray, $otherDescription){
    $query = "UPDATE reviewer SET
            AnalysisOfAlgorithms='$topicsArray[analysisOfAlgorithms]', 
            Applications='$topicsArray[applications]', 
            Architecture='$topicsArray[architecture]', 
            ArtificialIntelligence='$topicsArray[artificialIntelligence]',
            ComputerEngineering='$topicsArray[computerEngineering]', 
            Curriculum='$topicsArray[curriculum]', 
            DataStructures='$topicsArray[dataStructures]', 
            DatabasesColumn='$topicsArray[databasesColumn]', 
            DistancedLearning='$topicsArray[distanceLearning]',
            DistributedSystems='$topicsArray[distributedSystems]',
            EthicalSocietalIssues='$topicsArray[ethicalSocietalIssues]', 
            FirstYearComputing='$topicsArray[firstYearComputing]', 
            GenderIssues='$topicsArray[genderIssues]',
            GrantWriting='$topicsArray[grantWriting]', 
            GraphicsImageProcessing='$topicsArray[graphicsImageProcessing]', 
            HumanComputerInteraction='$topicsArray[humanComputerInteraction]', 
            LaboratoryEnvironments='$topicsArray[laboratoryEnvironments]', 
            Literacy='$topicsArray[literacy]', 
            MathematicsInComputing='$topicsArray[mathematicsInComputing]', 
            Multimedia='$topicsArray[multimedia]', 
            NetworkingDataCommunications='$topicsArray[networkingDataCommunications]', 
            NonMajorCourses='$topicsArray[nonMajorCourses]', 
            ObjectOrientedIssues='$topicsArray[objectOrientedIssues]', 
            OperatingSystems='$topicsArray[operatingSystems]',
            ParallelProcessing='$topicsArray[parallelProcessing]', 
            Pedagogy='$topicsArray[pedagogy]', 
            ProgrammingLanguages='$topicsArray[programmingLanguages]', 
            Research='$topicsArray[research]', 
            Security='$topicsArray[security]', 
            SoftwareEngineering='$topicsArray[softwareEngineering]',
            SystemsAnalysisAndDesign='$topicsArray[systemsAnalysisAndDesign]', 
            UsingTechnologyInTheClassroom='$topicsArray[usingTechnologyInTheClassroom]', 
            WebAndInternetProgramming='$topicsArray[webAndInternetProgramming]',
            Other='$topicsArray[other]', 
            OtherDescription='$otherDescription'
            WHERE ReviewerID='$userID'";
    if(!mysqli_query($conn, $query)){
        header("location: ../reviewerPages/editReviewerAccount.php?error=queryFailTopics");
        exit();
    }
}






// creates paper entity
function submitPaper($conn, $userID, $fileNameOriginal, $fileName, $paperTitle,
        $fileExtension, $noteToReviewers, $topicsArray, $otherDescription, $file, $destination){
    
    $statement = mysqli_stmt_init($conn);
    $insert_query = "INSERT INTO paper (AuthorID, FilenameOriginal, Filename, Title, Certification, NotesToReviewers,
                    AnalysisOfAlgorithms, Applications, Architecture, ArtificialIntelligence, 
                    ComputerEngineering, Curriculum, DataStructures, DatabasesColumn, DistanceLearning,
                    DistributedSystems, EthicalSocietalIssues, FirstYearComputing, GenderIssues,
                    GrantWriting, GraphicsImageProcessing, HumanComputerInteraction, 
                    LaboratoryEnvironments, Literacy, MathematicsInComputing, Multimedia, 
                    NetworkingDataCommunications, NonMajorCourses, ObjectOrientedIssues, OperatingSystems,
                    ParallelsProcessing, Pedagogy, ProgrammingLanguages, Research, Security, SoftwareEngineering,
                    SystemsAnalysisAndDesign, UsingTechnologyInTheClassroom, WebAndInternetProgramming,
                    Other, OtherDescription) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                                ?);";

    if(!mysqli_stmt_prepare($statement, $insert_query)){
        header("location: ../authorPages/submitPaper.php?error=queryfailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "isssssiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiis", $userID,
        $fileNameOriginal, $fileName, $paperTitle, $fileExtension, $noteToReviewers, 
        $topicsArray["analysisOfAlgorithms"],
        $topicsArray["applications"], 
        $topicsArray["architecture"], 
        $topicsArray["artificialIntelligence"], 
        $topicsArray["computerEngineering"], 
        $topicsArray["curriculum"], 
        $topicsArray["dataStructures"], 
        $topicsArray["databasesColumn"], 
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
    if($statement->error){
        header("location: ../authorPages/submitPaper.php?error=queryfailed");
        exit();
    }
    mysqli_stmt_close($statement);

    if(move_uploaded_file($file, $destination)){
        header("location: ../authorPages/authorHome.php?uploadSuccess");
    }
    else{
        header("location: ../authorPages/submitPaper.php?error=uploadFail");
        exit();
    }
}

function createReviewRow($conn, $paperID, $reviewerID){
    $statement = mysqli_stmt_init($conn);
    $insert_query = "INSERT INTO review (PaperID, ReviewerID) VALUES (?, ?);";
    if(!mysqli_stmt_prepare($statement, $insert_query)){
        header("location: ../adminPages/toAssignReviewer.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "ii", $paperID, $reviewerID);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);   
}

function updateRow($conn, $primaryID, $idType, $cols, $vals, $tableName, $redirectLink){
    $pairs = array();
    foreach($cols as $key=>$value){
        array_push($pairs, $value."='".$vals[$key]."'");
    }
    $str = implode(", ", $pairs);
    $query = "UPDATE $tableName SET $str WHERE $idType='$primaryID';";
    if(!mysqli_query($conn, $query)){
        header("location: ".$redirectLink."?error=stmtfailed");
        exit();
    }
    return true;
}

function isChecked($topic){
    if($topic == 1){
        return "checked";
    }
    else{
        return "";
    }
}





