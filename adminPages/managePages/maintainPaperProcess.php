<?php
  session_start();

  include_once 'config.php';

if(isset($_POST["save"])){

    $PaperID = $_POST["PaperID"];
    $AuthorID = $_POST["AuthorID"];
    $Active = $_POST["Active"];
    $FilenameOriginal = $_POST["FilenameOriginal"];
    $Filename = $_POST["Filename"];
    $Title = $_POST["Title"];
    $Certification = $_POST["Certification"];
    $NotesToReviewers = $_POST["NotesToReviewers"];

    $AnalysisOfAlgorithms = $_POST["analysisOfAlgorithms"];
    $Applications = $_POST["applications"];
    $Architecture = $_POST["architecture"];
    $ArtificialIntelligence = $_POST["artificialIntelligence"];
    $ComputerEngineering = $_POST["computerEngineering"];
    $Curriculum = $_POST["curriculum"];
    $DataStructures = $_POST["dataStructures"];
    $DatabasesColumn = $_POST["databases"];
    $DistanceLearning = $_POST["distanceLearning"];
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
    $ParallelsProcessing = $_POST["parallelProcessing"];
    $Pedagogy = $_POST["pedagogy"];
    $ProgrammingLanguages = $_POST["programmingLanguages"];
    $Research = $_POST["research"];
    $Security = $_POST["security"];
    $SoftwareEngineering = $_POST["softwareEngineering"];
    $SystemsAnalysisAndDesign = $_POST["systemsAnalysisDesign"];
    $UsingTechnologyInTheClassroom = $_POST["technologyClassroom"];
    $WebAndInternetProgramming = $_POST["webProgramming"];
    $Other = $_POST["other"];
    $OtherDescription = $_POST["OtherDescription"];




    $sql = "INSERT INTO `cpms`.`paper`(
                        `PaperID`,
                        `AuthorID`,
                        `Active`,
                        `FilenameOriginal`,
                        `Filename`,
                        `Title`,
                        `Certification`,
                        `NotesToReviewers`,
                        `AnalysisOfAlgorithms`,
                        `Applications`,
                        `Architecture`,
                        `ArtificialIntelligence`,
                        `ComputerEngineering`,
                        `Curriculum`,
                        `DataStructures`,
                        `DatabasesColumn`,
                        `DistanceLearning`,
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
                        `ParallelsProcessing`,
                        `Pedagogy`,
                        `ProgrammingLanguages`,
                        `Research`,
                        `Security`,
                        `SoftwareEngineering`,
                        `SystemsAnalysisAndDesign`,
                        `UsingTechnologyInTheClassroom`,
                        `WebAndInternetProgramming`,
                        `Other`,
                        `OtherDescription`)
                VALUES (
                        '$PaperID',
                        '$AuthorID',
                        '$Active',
                        '$FilenameOriginal',
                        '$Filename',
                        '$Title',
                        '$Certification',
                        '$NotesToReviewers',
                        '$AnalysisOfAlgorithms',
                        '$Applications',
                        '$Architecture',
                        '$ArtificialIntelligence',
                        '$ComputerEngineering',
                        '$Curriculum',
                        '$DataStructures',
                        '$DatabasesColumn',
                        '$DistanceLearning',
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
                        '$ParallelsProcessing',
                        '$Pedagogy',
                        '$ProgrammingLanguages',
                        '$Research',
                        '$Security',
                        '$SoftwareEngineering',
                        '$SystemsAnalysisAndDesign',
                        '$UsingTechnologyInTheClassroom',
                        '$WebAndInternetProgramming',
                        '$Other',
                        '$OtherDescription');";

    $result = $mysqli->query($sql) or die($mysqli->error());


    $_SESSION["message"] = "Record has been saved!";
    $_SESSION["msg_type"] = "success";

    header("location: maintainPapers.php");
}

if(isset($_GET['edit'])){



}

if(isset($_POST["update"])){

    $PaperID = $_POST["PaperID"];
    $AuthorID = $_POST["AuthorID"];
    $Active = $_POST["Active"];
    $FilenameOriginal = $_POST["FilenameOriginal"];
    $Filename = $_POST["Filename"];
    $Title = $_POST["Title"];
    $Certification = $_POST["Certification"];
    $NotesToReviewers = $_POST["NotesToReviewers"];
    
    $AnalysisOfAlgorithms = $_POST["analysisOfAlgorithms"];
    $Applications = $_POST["applications"];
    $Architecture = $_POST["architecture"];
    $ArtificialIntelligence = $_POST["artificialIntelligence"];
    $ComputerEngineering = $_POST["computerEngineering"];
    $Curriculum = $_POST["curriculum"];
    $DataStructures = $_POST["dataStructures"];
    $DatabasesColumn = $_POST["databases"];
    $DistanceLearning = $_POST["distanceLearning"];
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
    $ParallelsProcessing = $_POST["parallelProcessing"];
    $Pedagogy = $_POST["pedagogy"];
    $ProgrammingLanguages = $_POST["programmingLanguages"];
    $Research = $_POST["research"];
    $Security = $_POST["security"];
    $SoftwareEngineering = $_POST["softwareEngineering"];
    $SystemsAnalysisAndDesign = $_POST["systemsAnalysisDesign"];
    $UsingTechnologyInTheClassroom = $_POST["technologyClassroom"];
    $WebAndInternetProgramming = $_POST["webProgramming"];
    $Other = $_POST["other"];
    $OtherDescription = $_POST["OtherDescription"];


    $sql = "UPDATE `cpms`.`paper`
            SET
                    `PaperID` = '$PaperID',
                    `AuthorID` = '$AuthorID',
                    `Active` = '$Active',
                    `FilenameOriginal` = '$FilenameOriginal',
                    `Filename` = '$Filename',
                    `Title` = '$Title',
                    `Certification` = '$Certification',
                    `NotesToReviewers` = '$NotesToReviewers',
                    `AnalysisOfAlgorithms` = '$AnalysisOfAlgorithms',
                    `Applications` = '$Applications',
                    `Architecture` = '$Architecture',
                    `ArtificialIntelligence` = '$ArtificialIntelligence',
                    `ComputerEngineering` = '$ComputerEngineering',
                    `Curriculum` = '$Curriculum',
                    `DataStructures` = '$DataStructures',
                    `DatabasesColumn` = '$DatabasesColumn',
                    `DistanceLearning` = '$DistanceLearning',
                    `DistributedSystems` = '$DistributedSystems',
                    `EthicalSocietalIssues` = '$EthicalSocietalIssues',
                    `FirstYearComputing` = '$FirstYearComputing',
                    `GenderIssues` = '$GenderIssues',
                    `GrantWriting` = '$GrantWriting',
                    `GraphicsImageProcessing` = '$GraphicsImageProcessing',
                    `HumanComputerInteraction` = '$HumanComputerInteraction',
                    `LaboratoryEnvironments` = '$LaboratoryEnvironments',
                    `Literacy` = '$Literacy',
                    `MathematicsInComputing` = '$MathematicsInComputing',
                    `Multimedia` = '$Multimedia',
                    `NetworkingDataCommunications` = '$NetworkingDataCommunications',
                    `NonMajorCourses` = '$NonMajorCourses',
                    `ObjectOrientedIssues` = '$ObjectOrientedIssues',
                    `OperatingSystems` = '$OperatingSystems',
                    `ParallelsProcessing` = '$ParallelsProcessing',
                    `Pedagogy` = '$Pedagogy',
                    `ProgrammingLanguages` = '$ProgrammingLanguages',
                    `Research` = '$Research',
                    `Security` = '$Security',
                    `SoftwareEngineering` = '$SoftwareEngineering',
                    `SystemsAnalysisAndDesign` = '$SystemsAnalysisAndDesign',
                    `UsingTechnologyInTheClassroom` = '$UsingTechnologyInTheClassroom',
                    `WebAndInternetProgramming` = '$WebAndInternetProgramming',
                    `Other` = '$Other',
                    `OtherDescription` ='$OtherDescription'
            WHERE `PaperID` = '$PaperID';";
    $result = $mysqli->query($sql) or die($mysqli->error());


    $_SESSION["message"] = "Record has been Updated!";
    $_SESSION["msg_type"] = "success";

    header("location: maintainPapers.php");
}



if(isset($_GET['delete'])){
    $PaperID = $_GET['delete'];
    $sql = ("DELETE 
            FROM `paper`
            WHERE PaperID = '$PaperID' ;") ;
    $result = $mysqli->query($sql) or die($mysqli->error());


    $_SESSION['message'] = "Record has been Deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: maintainPapers.php");
}

?>