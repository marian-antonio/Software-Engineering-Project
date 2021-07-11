<?php
  session_start();

  include_once 'config.php';

if(isset($_POST["save"])){
$ReviewerID = $_POST["ReviewerID"];
$FirstName = $_POST["FirstName"];
$MiddleInitial = $_POST["MiddleInitial"];
$LastName = $_POST["LastName"];
$Affiliation = $_POST["Affiliation"];
$Department = $_POST["Department"];
$Address = $_POST["Address"];
$City = $_POST["City"];
$State = $_POST["State"];
$ZipCode = $_POST["ZipCode"];
$PhoneNumber = $_POST["PhoneNumber"];
$EmailAddress = $_POST["EmailAddress"];
$Password = $_POST["Password"];

$AnalysisOfAlgorithms = $_POST["analysisOfAlgorithms"];
$Applications = $_POST["applications"];
$Architecture = $_POST["architecture"];
$ArtificialIntelligence = $_POST["artificialIntelligence"];
$ComputerEngineering = $_POST["computerEngineering"];
$Curriculum = $_POST["curriculum"];
$DataStructures = $_POST["dataStructures"];
$DatabasesColumn = $_POST["databases"];
$DistancedLearning = $_POST["distanceLearning"];
$DistributedSystems = $_POST["distributedSystems"];
$EthicalSocietalIssues = $_POST["ethicalSocietalIssues"];
$FirstYearComputing = $_POST["firstYearComputing"];
$GenderIssues = $_POST["genderIssues"];
$GrantWriting = $_POST["grantWriting"];
$GraphicsImageProcessing = $_POST["graphicsImageProcessing"];
$HumanComputerInteraction = $_POST["humanComputerInteraction"];
$LaboratoryEnvironments = $_POST["laboratoryEnvironments"];
$Literacy = $_POST["literacy"];
$MathematicsInComputing = $_POST["mathInComputing"];
$Multimedia = $_POST["multimedia"];
$NetworkingDataCommunications = $_POST["networkDataCommunications"];
$NonMajorCourses = $_POST["nonMajorCourses"];
$ObjectOrientedIssues = $_POST["objectOrientedIssues"];
$OperatingSystems = $_POST["operatingSystems"];
$ParallelProcessing = $_POST["parallelProcessing"];
$Pedagogy = $_POST["pedagogy"];
$ProgrammingLanguages = $_POST["programmingLanguages"];
$Research = $_POST["research"];
$Security = $_POST["security"];
$SoftwareEngineering = $_POST["softwareEngineering"];
$SystemsAnalysisAndDesign = $_POST["systemsAnalysisDesign"];
$UsingTechnologyInTheClassroom = $_POST["technologyClassroom"];
$WebAndInternetProgramming = $_POST["webProgramming"];
$Other = $_POST["other"];




$sql = "INSERT INTO `cpms`.`reviewer` (
`ReviewerID`,
`FirstName`,
`MiddleInitial`,
`LastName`,
`Affiliation`,
`Department`,
`Address`,
`City`,
`State`,
`ZipCode`,
`PhoneNumber`,
`EmailAddress`,
`Password`,
`AnalysisOfAlgorithms`,
`Applications`,
`Architecture`,
`ArtificialIntelligence`,
`ComputerEngineering`,
`Curriculum`,
`DataStructures`,
`DatabasesColumn`,
`DistancedLearning`,
`DistributedSystems`,
`EthicalSocietalIssues`,
`FirstYearComputing`,
`GenderIssues`,
`GrantWriting`,
`GraphicsImageProcessing`,
`HumanComputerInteraction`,
`LaboratoryEnvironments`,
`Literacy`,
`MathematicsInComputing`,
`Multimedia`,
`NetworkingDataCommunications`,
`NonMajorCourses`,
`ObjectOrientedIssues`,
`OperatingSystems`,
`ParallelProcessing`,
`Pedagogy`,
`ProgrammingLanguages`,
`Research`,
`Security`,
`SoftwareEngineering`,
`SystemsAnalysisAndDesign`,
`UsingTechnologyInTheClassroom`,
`WebAndInternetProgramming`,
`Other`)
VALUES (
'$ReviewerID',
'$FirstName',
'$MiddleInitial',
'$LastName',
'$Affiliation',
'$Department',
'$Address',
'$City',
'$State',
'$ZipCode',
'$PhoneNumber',
'$EmailAddress',
'$Password',
'$AnalysisOfAlgorithms',
'$Applications',
'$Architecture',
'$ArtificialIntelligence',
'$ComputerEngineering',
'$Curriculum',
'$DataStructures',
'$DatabasesColumn',
'$DistancedLearning',
'$DistributedSystems',
'$EthicalSocietalIssues',
'$FirstYearComputing',
'$GenderIssues',
'$GrantWriting',
'$GraphicsImageProcessing',
'$HumanComputerInteraction',
'$LaboratoryEnvironments',
'$Literacy',
'$MathematicsInComputing',
'$Multimedia',
'$NetworkingDataCommunications',
'$NonMajorCourses',
'$ObjectOrientedIssues',
'$OperatingSystems',
'$ParallelProcessing',
'$Pedagogy',
'$ProgrammingLanguages',
'$Research',
'$Security',
'$SoftwareEngineering',
'$SystemsAnalysisAndDesign',
'$UsingTechnologyInTheClassroom',
'$WebAndInternetProgramming',
'$Other'); ";

$result = $mysqli->query($sql) or die($mysqli->error());


$_SESSION["message"] = "Record has been saved!";
$_SESSION["msg_type"] = "success";

header("location: maintainReviewers.php");
}

if(isset($_GET['edit'])){

$ReviewerID = $_GET['edit'];

$sql = "SELECT *
FROM `cpms`.`Reviewer`
WHERE `ReviewerID` = '17';";
$result = $mysqli->query($sql) or die($mysqli->error());


if($result->num_rows == 1){
$row = $result->fetch_array();
$ReviewerID = $row["ReviewerID"];
$FirstName = $row["FirstName"];
$MiddleInitial = $row["MiddleInitial"];
$LastName = $row["LastName"];
$_SESSION['message'] = "Record has been Shown!";
} else {

echo "No Results";
echo "Error: " . $mysqli->error();
}




$_SESSION['msg_type'] = "success";
header("location: maintainReviewers.php");
}

if(isset($_POST["update"])){

    $ReviewerID = $_POST["ReviewerID"];
    $FirstName = $_POST["FirstName"];
    $MiddleInitial = $_POST["MiddleInitial"];
    $LastName = $_POST["LastName"];
    $Affiliation = $_POST["Affiliation"];
    $Department = $_POST["Department"];
    $Address = $_POST["Address"];
    $City = $_POST["City"];
    $State = $_POST["State"];
    $ZipCode = $_POST["ZipCode"];
    $PhoneNumber = $_POST["PhoneNumber"];
    $EmailAddress = $_POST["EmailAddress"];
    $Password = $_POST["Password"];
    
    $AnalysisOfAlgorithms = $_POST["analysisOfAlgorithms"];
    $Applications = $_POST["applications"];
    $Architecture = $_POST["architecture"];
    $ArtificialIntelligence = $_POST["artificialIntelligence"];
    $ComputerEngineering = $_POST["computerEngineering"];
    $Curriculum = $_POST["curriculum"];
    $DataStructures = $_POST["dataStructures"];
    $DatabasesColumn = $_POST["databases"];
    $DistancedLearning = $_POST["distanceLearning"];
    $DistributedSystems = $_POST["distributedSystems"];
    $EthicalSocietalIssues = $_POST["ethicalSocietalIssues"];
    $FirstYearComputing = $_POST["firstYearComputing"];
    $GenderIssues = $_POST["genderIssues"];
    $GrantWriting = $_POST["grantWriting"];
    $GraphicsImageProcessing = $_POST["graphicsImageProcessing"];
    $HumanComputerInteraction = $_POST["humanComputerInteraction"];
    $LaboratoryEnvironments = $_POST["laboratoryEnvironments"];
    $Literacy = $_POST["literacy"];
    $MathematicsInComputing = $_POST["mathInComputing"];
    $Multimedia = $_POST["multimedia"];
    $NetworkingDataCommunications = $_POST["networkDataCommunications"];
    $NonMajorCourses = $_POST["nonMajorCourses"];
    $ObjectOrientedIssues = $_POST["objectOrientedIssues"];
    $OperatingSystems = $_POST["operatingSystems"];
    $ParallelProcessing = $_POST["parallelProcessing"];
    $Pedagogy = $_POST["pedagogy"];
    $ProgrammingLanguages = $_POST["programmingLanguages"];
    $Research = $_POST["research"];
    $Security = $_POST["security"];
    $SoftwareEngineering = $_POST["softwareEngineering"];
    $SystemsAnalysisAndDesign = $_POST["systemsAnalysisDesign"];
    $UsingTechnologyInTheClassroom = $_POST["technologyClassroom"];
    $WebAndInternetProgramming = $_POST["webProgramming"];
    $Other = $_POST["other"];


$sql = "UPDATE `cpms`.`reviewer`
SET
`ReviewerID` = '$ReviewerID',
`FirstName` = '$FirstName',
`MiddleInitial` = '$MiddleInitial',
`LastName` = '$LastName',
`Affiliation` = '$Affiliation',
`Department` = '$Department',
`Address` = '$Address',
`City` = '$City',
`State` = '$State',
`ZipCode` = '$ZipCode',
`PhoneNumber` = '$PhoneNumber',
`EmailAddress` = '$EmailAddress',
`Password` = '$Password',
`AnalysisOfAlgorithms`= '$AnalysisOfAlgorithms',
`Applications`= '$Applications',
`Architecture`= '$Architecture',
`ArtificialIntelligence`= '$ArtificialIntelligence',
`ComputerEngineering`= '$ComputerEngineering',
`Curriculum`= '$Curriculum',
`DataStructures`= '$DataStructures',
`DatabasesColumn`= '$DatabasesColumn',
`DistancedLearning`= '$DistancedLearning',
`DistributedSystems`= '$DistributedSystems',
`EthicalSocietalIssues`= '$EthicalSocietalIssues',
`FirstYearComputing`= '$FirstYearComputing',
`GenderIssues`= '$GenderIssues',
`GrantWriting`= '$GrantWriting',
`GraphicsImageProcessing`= '$GraphicsImageProcessing',
`HumanComputerInteraction`= '$HumanComputerInteraction',
`LaboratoryEnvironments`= '$LaboratoryEnvironments',
`Literacy`= '$Literacy',
`MathematicsInComputing`= '$MathematicsInComputing',
`Multimedia`= '$Multimedia',
`NetworkingDataCommunications`= '$NetworkingDataCommunications',
`NonMajorCourses`= '$NonMajorCourses',
`ObjectOrientedIssues`= '$ObjectOrientedIssues',
`OperatingSystems`= '$OperatingSystems',
`ParallelProcessing`= '$ParallelProcessing',
`Pedagogy`= '$Pedagogy',
`ProgrammingLanguages`= '$ProgrammingLanguages',
`Research`= '$Research',
`Security`= '$Security',
`SoftwareEngineering`= '$SoftwareEngineering',
`SystemsAnalysisAndDesign`= '$SystemsAnalysisAndDesign',
`UsingTechnologyInTheClassroom`= '$UsingTechnologyInTheClassroom',
`WebAndInternetProgramming`= '$WebAndInternetProgramming',
`Other` = '$Other'

WHERE `ReviewerID` = '$ReviewerID';";
$result = $mysqli->query($sql) or die($mysqli->error());


$_SESSION["message"] = "Record has been Updated!";
$_SESSION["msg_type"] = "success";

header("location: maintainReviewers.php");
}



if(isset($_GET['delete'])){
$ReviewerID = $_GET['delete'];
$sql = ("DELETE FROM `reviewer`
WHERE ReviewerID = '$ReviewerID' ;") ;
$result = $mysqli->query($sql) or die($mysqli->error());


$_SESSION['message'] = "Record has been Deleted!";
$_SESSION['msg_type'] = "danger";

header("location: maintainReviewers.php");
}

?>