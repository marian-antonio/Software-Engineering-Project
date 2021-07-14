<!DOCTYPE html>
<html>
<?php
  session_start();

  include_once 'config.php';
  include "../../includes/functions.inc.php";
  $row2 = 0;
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

}

    //Edit Updates Form with values from selected row
    if(isset($_POST['editID'])){

        $userID = ($_POST['editID']);
        echo $userID;
    
        $sql = "SELECT * 
                FROM    `cpms`.`paper`
                WHERE `PaperID` = '$userID';";
    
        $result = $mysqli->query($sql) or die($mysqli->error());
    
        if($result->num_rows > 0){
            $row2 = $result -> fetch_array(MYSQLI_ASSOC);
        }
        else{
            $result = false;
        }
    
        
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

}



if(isset($_POST['deleteID'])){
    $PaperID = $_POST['deleteID'];
    $sql = ("DELETE 
            FROM `paper`
            WHERE PaperID = '$PaperID' ;") ;
    $result = $mysqli->query($sql) or die($mysqli->error());


    $_SESSION['message'] = "Record has been Deleted!";
    $_SESSION['msg_type'] = "danger";

}

?>

<head>
    <meta name="viewport" content="width=device-width" , initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/e1b93c3ea7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../style.css" type="text/css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Admin - Maintain Papers</title>
</head>

<body>
    <header>
        <a href="../adminHome.html" class="logo">
            <img src="../../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="../adminHome.html">HOME</a></li>
            <li><a href="../adminMaintain.html" style="background-color: white; color: black;">
                    ADMIN</a></li>
            <li><a href="../adminReports.html">REPORTS</a></li>
            <li><a href="">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <main>

            <!--Main page elements here-->
            <div class="second-nav">
                <ul class="breadcrumb">
                    <li><a href="../adminHome.html">Home</a></li>
                    <li><a href="../adminMaintain.html">Maintain</a></li>
                    <li>Maintain Papers</li>
                </ul>
            </div>

            <div class="reports-container">
                <div class="page-content">
                    <h1>Table Maintenance - Papers</h1>
                    <p>
                        This is a table of all the Papers.
                        Here, you can manually add new Papers, edit the current data fields, or
                        delete it entirely. Under the "actions" column pen and notepad icon
                        lets you edit that row, and the trashcan icon lets you delete that row.
                    </p>
                </div>

                <?php 
                    if (isset($_SESSION["message"])): 
                ?>

                <div class="alert alert-<?=$_SESSION["msg_type"]?>">

                    <?php
                        echo $_SESSION["message"];
                        unset( $_SESSION["message"]);
                    ?>

                </div>

                <?php endif ?>

                <div class="data-table">
                    <div class="reports">
                        <table>
                            <tr>
                                <th>Actions</th>
                                <th>PaperID</th>
                                <th>AuthorID</th>
                                <th>Active</th>
                                <th>FilenameOriginale</th>
                                <th>Filename</th>
                                <th>Title</th>
                                <th>Certification</th>
                                <th>NotesToReviewers</th>


                                <th>AnalysisOfAlgorithms</th>
                                <th>Applications</th>
                                <th>Architecture</th>
                                <th>ArtificialIntelligence</th>
                                <th>ComputerEngineering</th>
                                <th>Curriculum</th>
                                <th>DataStructures</th>
                                <th>Databases</th>
                                <th>DistancedLearning</th>
                                <th>DistributedSystems</th>
                                <th>EthicalSocietalIssues</th>
                                <th>FirstYearComputing</th>
                                <th>GenderIssues</th>
                                <th>GrantWriting</th>
                                <th>GraphicsImageProcessing</th>
                                <th>HumanComputerInteraction</th>
                                <th>LaboratoryEnvironments</th>
                                <th>Literacy</th>
                                <th>MathematicsInComputing</th>
                                <th>Multimedia</th>
                                <th>NetworkingDataCommunications</th>
                                <th>NonMajorCourses</th>
                                <th>ObjectOrientedIssues</th>
                                <th>OperatingSystems</th>
                                <th>ParallelProcessing</th>
                                <th>Pedagogy</th>
                                <th>ProgrammingLanguages</th>
                                <th>Research</th>
                                <th>Security</th>
                                <th>SoftwareEngineering</th>
                                <th>SystemsAnalysisAndDesign</th>
                                <th>UsingTechnologyInTheClassroom</th>
                                <th>WebAndInternetProgramming</th>
                                <th>Other</th>
                                <th>OtherDescription</th>
                            </tr>




                            <?php
                            $sql = "SELECT * from paper";
                            $result = $mysqli-> query($sql);

                            if($result->num_rows > 0){
                                while ($row = $result-> fetch_assoc()) : ?>
                            <tr>
                                <td style="word-spacing: 5px; text-align: center;">

                                    <form action="maintainPapers.php" method="post">
                                        <input type="submit" class="btn btn-primary" name="editID"
                                            value="<?php echo $row["PaperID"] ?>">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#PaperModalEdit">
                                            View
                                        </button>
                                        <input type="submit" class="btn btn-primary" name="deleteID"
                                            value="<?php echo $row["PaperID"] ?>">
                                    </form>
                                </td>
                                <td><?php  echo $row["PaperID"]  ?></td>
                                <td><?php  echo $row["AuthorID"]  ?></td>
                                <td><?php  echo $row["Active"]  ?></td>
                                <td><?php  echo $row["FilenameOriginal"]  ?></td>
                                <td><?php  echo $row["Filename"]  ?></td>
                                <td><?php  echo $row["Title"]  ?></td>
                                <td><?php  echo $row["Certification"]  ?></td>
                                <td><?php  echo $row["NotesToReviewers"]  ?></td>

                                <td><?php  echo $row["AnalysisOfAlgorithms"]  ?></td>
                                <td><?php  echo $row["Applications"]  ?></td>
                                <td><?php  echo $row["Architecture"]  ?></td>
                                <td><?php  echo $row["ArtificialIntelligence"]  ?></td>
                                <td><?php  echo $row["ComputerEngineering"]  ?></td>
                                <td><?php  echo $row["Curriculum"]  ?></td>
                                <td><?php  echo $row["DataStructures"]  ?></td>
                                <td><?php  echo $row["DatabasesColumn"]  ?></td>
                                <td><?php  echo $row["DistanceLearning"]  ?></td>
                                <td><?php  echo $row["DistributedSystems"]  ?></td>
                                <td><?php  echo $row["EthicalSocietalIssues"]  ?></td>
                                <td><?php  echo $row["FirstYearComputing"]  ?></td>
                                <td><?php  echo $row["GenderIssues"]  ?></td>
                                <td><?php  echo $row["GrantWriting"]  ?></td>
                                <td><?php  echo $row["GraphicsImageProcessing"]  ?></td>
                                <td><?php  echo $row["HumanComputerInteraction"]  ?></td>
                                <td><?php  echo $row["LaboratoryEnvironments"]  ?></td>
                                <td><?php  echo $row["Literacy"]  ?></td>
                                <td><?php  echo $row["MathematicsInComputing"]  ?></td>
                                <td><?php  echo $row["Multimedia"]  ?></td>
                                <td><?php  echo $row["NetworkingDataCommunications"]  ?></td>
                                <td><?php  echo $row["NonMajorCourses"]  ?></td>
                                <td><?php  echo $row["ObjectOrientedIssues"]  ?></td>
                                <td><?php  echo $row["OperatingSystems"]  ?></td>
                                <td><?php  echo $row["ParallelsProcessing"]  ?></td>
                                <td><?php  echo $row["Pedagogy"]  ?></td>
                                <td><?php  echo $row["ProgrammingLanguages"]  ?></td>
                                <td><?php  echo $row["Research"]  ?></td>
                                <td><?php  echo $row["Security"]  ?></td>
                                <td><?php  echo $row["SoftwareEngineering"]  ?></td>
                                <td><?php  echo $row["SystemsAnalysisAndDesign"]  ?></td>
                                <td><?php  echo $row["UsingTechnologyInTheClassroom"]  ?></td>
                                <td><?php  echo $row["WebAndInternetProgramming"]  ?></td>
                                <td><?php  echo $row["Other"]  ?></td>
                                <td><?php  echo $row["OtherDescription"]  ?></td>

                            </tr>


                            <?php
                                endwhile;
                            }
                                $mysqli-> close();
                            ?>



                        </table>
                        <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PaperModalAdd">
                            Add Paper
                        </button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#PaperModalEdit">
                            Edit Paper
                        </button>

                    </div>

                </div>


                <!-- Modal Add -->
                <div class="modal fade" id="PaperModalAdd" tabindex="-1" role="dialog"
                    aria-labelledby="PaperModalAddLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="PaperModalAddLabel">Enter Paper Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="maintainPapers.php" method="post">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>Paper ID:</label>
                                        <input type="text" name="PaperID" class=" form-control" value=""
                                            placeholder=" Enter Paper ID:">

                                        <label>Author ID:</label>
                                        <input type="text" name="AuthorID" class="form-control" value=""
                                            placeholder=" Enter Author ID:">

                                        <br>
                                        <input type="hidden" id="ActiveHidden" name="Active" value='0'>
                                        <input type="checkbox" id="Active" name="Active" value='1'>
                                        <label for="Active" class="checkbox">Check if Active</label>
                                        <br>

                                        <label>Paper Filename Original:</label>
                                        <input type="text" name="FilenameOriginal" class="form-control" value=""
                                            placeholder=" Enter Original File Name">

                                        <label>Paper Filename:</label>
                                        <input type="text" name="Filename" class=" form-control" value=""
                                            placeholder=" Enter Paper Filename:">

                                        <label>Paper Title:</label>
                                        <input type="text" name="Title" class="form-control" value=""
                                            placeholder=" Enter Paper Title">

                                        <label>Certification:</label>
                                        <input type="text" name="Certification" class="form-control" value=""
                                            placeholder="Enter Certification: 3 Char ">

                                        <label>Notes To Reviewers:</label>
                                        <input type="text" name="NotesToReviewers" class="form-control" value=""
                                            placeholder=" Leave Empty">


                                        <br>
                                        <div class="topics">
                                            <table>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="analysisOfAlgorithmsHidden"
                                                            name="analysisOfAlgorithms" value='0'>
                                                        <input type="checkbox" id="analysisOfAlgorithms"
                                                            name="analysisOfAlgorithms" value='1'>
                                                    </td>
                                                    <td><label for="analysisOfAlgorithms" class="checkbox">Analysis
                                                            of
                                                            Algorithms</label></td>

                                                    <td>
                                                        <input type="hidden" id="firstYearComputingHidden"
                                                            name="firstYearComputing" value='0'>
                                                        <input type="checkbox" id="firstYearComputing"
                                                            name="firstYearComputing" value='1'>
                                                    </td>
                                                    <td><label for="firstYearComputing">First Year
                                                            Computing</label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="objectOrientedIssuesHidden"
                                                            name="objectOrientedIssues" value='0'>
                                                        <input type="checkbox" id="objectOrientedIssues"
                                                            name="objectOrientedIssues" value='1'>
                                                    </td>
                                                    <td><label for="objectOrientedIssues">Object Oriented
                                                            Issues</label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="applicationsHidden" name="applications"
                                                            value='0'>
                                                        <input type="checkbox" id="applications" name="applications"
                                                            value='1'>
                                                    </td>
                                                    <td><label for="applications">Applications</label> </td>

                                                    <td>
                                                        <input type="hidden" id="genderIssuesHidden" name="genderIssues"
                                                            value='0'>
                                                        <input type="checkbox" id="genderIssues" name="genderIssues"
                                                            value='1'>
                                                    </td>
                                                    <td><label for="genderIssues">Gender Issues</label></td>

                                                    <td>
                                                        <input type="hidden" id="operatingSystemsHidden"
                                                            name="operatingSystems" value='0'>
                                                        <input type="checkbox" id="operatingSystems"
                                                            name="operatingSystems" value='1'>
                                                    </td>
                                                    <td><label for="operatingSystems">Operating Systems</label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="architectureHidden" name="architecture"
                                                            value='0'>
                                                        <input type="checkbox" id="architecture" name="architecture"
                                                            value='1'>
                                                    </td>
                                                    <td><label for="architecture">Architecture</label></td>

                                                    <td>
                                                        <input type="hidden" id="grantWritingHidden" name="grantWriting"
                                                            value='0'>
                                                        <input type="checkbox" id="grantWriting" name="grantWriting"
                                                            value='1'>
                                                    </td>
                                                    <td><label for="grantWriting">Grant Writing</label></td>

                                                    <td>
                                                        <input type="hidden" id="parallelProcessingHidden"
                                                            name="parallelProcessing" value='0'>
                                                        <input type="checkbox" id="parallelProcessing"
                                                            name="parallelProcessing" value='1'>
                                                    </td>
                                                    <td><label for="parallelProcessing">Parallel
                                                            Processing</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="artificialIntelligenceHidden"
                                                            name="artificialIntelligence" value='0'>
                                                        <input type="checkbox" id="artificialIntelligence"
                                                            name="artificialIntelligence" value='1'>
                                                    </td>
                                                    <td><label for="ai">Artificial Intelligence</label></td>

                                                    <td>
                                                        <input type="hidden" id="graphicsImageProcessingHidden"
                                                            name="graphicsImageProcessing" value='0'>
                                                        <input type="checkbox" id="graphicsImageProcessing"
                                                            name="graphicsImageProcessing" value='1'>
                                                    </td>
                                                    <td><label for="graphicsImageProcessing">Graphics Image
                                                            Processing</label></td>

                                                    <td>
                                                        <input type="hidden" id="pedagogyHidden" name="pedagogy"
                                                            value='0'>
                                                        <input type="checkbox" id="pedagogy" name="pedagogy" value='1'>
                                                    </td>
                                                    <td><label for="pedagogy">Pedagogy</label> </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="computerEngineeringHidden"
                                                            name="computerEngineering" value='0'>
                                                        <input type="checkbox" id="computerEngineering"
                                                            name="computerEngineering" value='1'>
                                                    </td>
                                                    <td><label for="cpe">Computer Engineering</label></td>

                                                    <td>
                                                        <input type="hidden" id="humanComputerInteractionHidden"
                                                            name="humanComputerInteraction" value='0'>
                                                        <input type="checkbox" id="humanComputerInteraction"
                                                            name="humanComputerInteraction" value='1'>
                                                    </td>
                                                    <td><label for="humanComputerInteraction">Human Computer
                                                            Interaction</label></td>

                                                    <td>
                                                        <input type="hidden" id="programmingLanguagesHidden"
                                                            name="programmingLanguages" value='0'>
                                                        <input type="checkbox" id="programmingLanguages"
                                                            name="programmingLanguages" value='1'>
                                                    </td>
                                                    <td><label for="programmingLanguages">Programming
                                                            Languages</label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="curriculumHidden" name="curriculum"
                                                            value='0'>
                                                        <input type="checkbox" id="curriculum" name="curriculum"
                                                            value='1'>
                                                    </td>
                                                    <td><label for="curriculum">Curriculum</label></td>

                                                    <td>
                                                        <input type="hidden" id="laboratoryEnvironmentsHidden"
                                                            name="laboratoryEnvironments" value='0'>
                                                        <input type="checkbox" id="laboratoryEnvironments"
                                                            name="laboratoryEnvironments" value='1'>
                                                    </td>
                                                    <td><label for="laboratoryEnvironments">Laboratory
                                                            Environments</label></td>

                                                    <td>
                                                        <input type="hidden" id="researchHidden" name="research"
                                                            value='0'>
                                                        <input type="checkbox" id="research" name="research" value='1'>
                                                    </td>
                                                    <td><label for="research">Research</label></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="dataStructuresHidden"
                                                            name="dataStructures" value='0'>
                                                        <input type="checkbox" id="dataStructures" name="dataStructures"
                                                            value='1'>
                                                    </td>
                                                    <td><label for="dataStructures">Data Structures</label></td>

                                                    <td>
                                                        <input type="hidden" id="literacyHidden" name="literacy"
                                                            value='0'>
                                                        <input type="checkbox" id="literacy" name="literacy" value='1'>
                                                    </td>
                                                    <td><label for="literacy">Literacy</label></td>

                                                    <td>
                                                        <input type="hidden" id="securityHidden" name="security"
                                                            value='0'>
                                                        <input type="checkbox" id="security" name="security" value='1'>
                                                    </td>
                                                    <td><label for="security">Security</label></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="databasesHidden" name="databases"
                                                            value='0'>
                                                        <input type="checkbox" id="databases" name="databases"
                                                            value='1'>
                                                    </td>
                                                    <td><label for="databases">Databases</label></td>

                                                    <td>
                                                        <input type="hidden" id="mathInComputingHidden"
                                                            name="mathInComputing" value='0'>
                                                        <input type="checkbox" id="mathInComputing"
                                                            name="mathInComputing" value='1'>
                                                    </td>
                                                    <td><label for="mathInComputing">Mathematics in
                                                            Computing</label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="softwareEngineeringHidden"
                                                            name="softwareEngineering" value='0'>
                                                        <input type="checkbox" id="softwareEngineering"
                                                            name="softwareEngineering" value='1'>
                                                    </td>
                                                    <td><label for="softwareEngineering">Software
                                                            Engineering</label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="distanceLearningHidden"
                                                            name="distanceLearning" value='0'>
                                                        <input type="checkbox" id="distanceLearning"
                                                            name="distanceLearning" value='1'>
                                                    </td>
                                                    <td><label for="distanceLearning">Distance Learning</label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="multimediaHidden" name="multimedia"
                                                            value='0'>
                                                        <input type="checkbox" id="multimedia" name="multimedia"
                                                            value='1'>
                                                    </td>
                                                    <td><label for="multimedia">Multimedia</label></td>

                                                    <td>
                                                        <input type="hidden" id="systemsAnalysisDesignHidden"
                                                            name="systemsAnalysisDesign" value='0'>
                                                        <input type="checkbox" id="systemsAnalysisDesign"
                                                            name="systemsAnalysisDesign" value='1'>
                                                    </td>
                                                    <td><label for="systemsAnalysisDesign">Systems Analysis and
                                                            Design</label></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="distributedSystemsHidden"
                                                            name="distributedSystems" value='0'>
                                                        <input type="checkbox" id="distributedSystems"
                                                            name="distributedSystems" value='1'>
                                                    </td>
                                                    <td><label for="distributedSystems">Distributed
                                                            Systems</label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="networkDataCommunicationsHidden"
                                                            name="networkDataCommunications" value='0'>
                                                        <input type="checkbox" id="networkDataCommunications"
                                                            name="networkDataCommunications" value='1'>
                                                    </td>
                                                    <td><label for="networkDataCommunications">Networking/Data
                                                            Communications</label></td>

                                                    <td>
                                                        <input type="hidden" id="technologyClassroomHidden"
                                                            name="technologyClassroom" value='0'>
                                                        <input type="checkbox" id="technologyClassroom"
                                                            name="technologyClassroom" value='1'>
                                                    </td>
                                                    <td><label for="technologyClassroom">Using Techonology in
                                                            the
                                                            Classroom</label></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="ethicalSocietalIssuesHidden"
                                                            name="ethicalSocietalIssues" value='0'>
                                                        <input type="checkbox" id="ethicalSocietalIssues"
                                                            name="ethicalSocietalIssues" value='1'>
                                                    </td>
                                                    <td><label for="ethicalSocietalIssues">Ethical/Societal
                                                            Issues</label></td>

                                                    <td>
                                                        <input type="hidden" id="nonMajorCoursesHidden"
                                                            name="nonMajorCourses" value='0'>
                                                        <input type="checkbox" id="nonMajorCourses"
                                                            name="nonMajorCourses" value='1'>
                                                    </td>
                                                    <td><label for="nonMajorCourses">Non-Major Courses</label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="webProgrammingHidden"
                                                            name="webProgramming" value='0'>
                                                        <input type="checkbox" id="webProgramming" name="webProgramming"
                                                            value='1'>
                                                    </td>
                                                    <td><label for="webProgramming">Web and Internet
                                                            Programming</label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="otherHidden" name="other" value='0'>
                                                        <input type="checkbox" id="other" name="other" value='1'>
                                                    </td>
                                                    <td><label for="other">Other</label></td>
                                                </tr>
                                            </table>
                                            <label>Decribe Other:</label>
                                            <input type="text" name="OtherDescription" class="form-control" value=""
                                                placeholder=" Enter Other Here:">
                                        </div>

                                        <br>

                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="PaperModalEdit" tabindex="-1" role="dialog"
                    aria-labelledby="PaperModalEditLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="PaperModalEditLabel">Change Paper Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="maintainPapers.php" method="post">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>Paper ID:</label>
                                        <input type="text" name="PaperID" class=" form-control"
                                            value="<?php echo $row2["PaperID"] ?>" placeholder=" Enter Paper ID:">

                                        <label>Author ID:</label>
                                        <input type="text" name="AuthorID" class="form-control"
                                            value="<?php echo $row2["AuthorID"] ?>" placeholder=" Enter Author ID:">

                                        <br>
                                        <input type="hidden" id="ActiveHidden" name="Active" value='0'>
                                        <input type="checkbox" id="Active" name="Active" value='1'
                                            <?php echo isChecked($row2["Active"]) ?>>
                                        <label for="Active" class="checkbox">Check if Active:
                                            <?php echo isChecked($row2["Active"]) ?></label></td></label>
                                        <br>

                                        <label>Paper Filename Original:</label>
                                        <input type="text" name="FilenameOriginal" class="form-control"
                                            value="<?php echo $row2["FilenameOriginal"] ?>"
                                            placeholder=" Enter Original File Name">

                                        <label>Paper Filename:</label>
                                        <input type="text" name="Filename" class=" form-control"
                                            value="<?php echo $row2["Filename"] ?>"
                                            placeholder=" Enter Paper Filename:">

                                        <label>Paper Title:</label>
                                        <input type="text" name="Title" class="form-control"
                                            value="<?php echo $row2["Title"] ?>" placeholder=" Enter Paper Title">

                                        <label>Certification:</label>
                                        <input type="text" name="Certification" class="form-control"
                                            value="<?php echo $row2["Certification"] ?>" placeholder=" ">

                                        <label>Notes To Reviewers:</label>
                                        <input type="text" name="NotesToReviewers" class="form-control"
                                            value="<?php echo $row2["NotesToReviewers"] ?>" placeholder=" ">


                                        <br>
                                        <div class="topics">
                                            <table>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="analysisOfAlgorithmsHidden"
                                                            name="analysisOfAlgorithms" value='0'>
                                                        <input type="checkbox" id="analysisOfAlgorithms"
                                                            name="analysisOfAlgorithms" value='1'
                                                            <?php echo isChecked($row2["AnalysisOfAlgorithms"]) ?>>
                                                    </td>
                                                    <td><label for="analysisOfAlgorithms" class="checkbox">Analysis
                                                            of
                                                            Algorithms:
                                                            <?php echo $row2["AnalysisOfAlgorithms"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="firstYearComputingHidden"
                                                            name="firstYearComputing" value='0'>
                                                        <input type="checkbox" id="firstYearComputing"
                                                            name="firstYearComputing" value='1'
                                                            <?php echo isChecked($row2["FirstYearComputing"]) ?>>
                                                    </td>
                                                    <td><label for="firstYearComputing">First Year
                                                            Computing:
                                                            <?php echo $row2["FirstYearComputing"] ?></label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="objectOrientedIssuesHidden"
                                                            name="objectOrientedIssues" value='0'>
                                                        <input type="checkbox" id="objectOrientedIssues"
                                                            name="objectOrientedIssues" value='1'
                                                            <?php echo isChecked($row2["ObjectOrientedIssues"]) ?>>
                                                    </td>
                                                    <td><label for="objectOrientedIssues">Object Oriented
                                                            Issues:
                                                            <?php echo $row2["ObjectOrientedIssues"] ?></label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="applicationsHidden" name="applications"
                                                            value='0'>
                                                        <input type="checkbox" id="applications" name="applications"
                                                            value='1' <?php echo isChecked($row2["Applications"]) ?>>
                                                    </td>
                                                    <td><label for="applications">Applications:
                                                            <?php echo $row2["Applications"] ?></label> </td>

                                                    <td>
                                                        <input type="hidden" id="genderIssuesHidden" name="genderIssues"
                                                            value='0'>
                                                        <input type="checkbox" id="genderIssues" name="genderIssues"
                                                            value='1' <?php echo isChecked($row2["GenderIssues"]) ?>>
                                                    </td>
                                                    <td><label for="genderIssues">Gender Issues:
                                                            <?php echo $row2["GenderIssues"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="operatingSystemsHidden"
                                                            name="operatingSystems" value='0'>
                                                        <input type="checkbox" id="operatingSystems"
                                                            name="operatingSystems" value='1'
                                                            <?php echo isChecked($row2["OperatingSystems"]) ?>>
                                                    </td>
                                                    <td><label for="operatingSystems">Operating Systems:
                                                            <?php echo $row2["OperatingSystems"] ?></label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="architectureHidden" name="architecture"
                                                            value='0'>
                                                        <input type="checkbox" id="architecture" name="architecture"
                                                            value='1' <?php echo isChecked($row2["Architecture"]) ?>>
                                                    </td>
                                                    <td><label for="architecture">Architecture:
                                                            <?php echo $row2["Architecture"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="grantWritingHidden" name="grantWriting"
                                                            value='0'>
                                                        <input type="checkbox" id="grantWriting" name="grantWriting"
                                                            value='1' <?php echo isChecked($row2["GrantWriting"]) ?>>
                                                    </td>
                                                    <td><label for="grantWriting">Grant Writing:
                                                            <?php echo $row2["GrantWriting"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="parallelProcessingHidden"
                                                            name="parallelProcessing" value='0'>
                                                        <input type="checkbox" id="parallelProcessing"
                                                            name="parallelProcessing" value='1'
                                                            <?php echo isChecked($row2["ParallelsProcessing"]) ?>>
                                                    </td>
                                                    <td><label for="parallelProcessing">Parallel
                                                            Processing:
                                                            <?php echo $row2["ParallelsProcessing"] ?></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="artificialIntelligenceHidden"
                                                            name="artificialIntelligence" value='0'>
                                                        <input type="checkbox" id="artificialIntelligence"
                                                            name="artificialIntelligence" value='1'
                                                            <?php echo isChecked($row2["ArtificialIntelligence"]) ?>>
                                                    </td>
                                                    <td><label for="ai">Artificial Intelligence:
                                                            <?php echo $row2["ArtificialIntelligence"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="graphicsImageProcessingHidden"
                                                            name="graphicsImageProcessing" value='0'>
                                                        <input type="checkbox" id="graphicsImageProcessing"
                                                            name="graphicsImageProcessing" value='1'
                                                            <?php echo isChecked($row2["GraphicsImageProcessing"]) ?>>
                                                    </td>
                                                    <td><label for="graphicsImageProcessing">Graphics Image
                                                            Processing:
                                                            <?php echo $row2["GraphicsImageProcessing"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="pedagogyHidden" name="pedagogy"
                                                            value='0'>
                                                        <input type="checkbox" id="pedagogy" name="pedagogy" value='1'
                                                            <?php echo isChecked($row2["Pedagogy"]) ?>>
                                                    </td>
                                                    <td><label for="pedagogy">Pedagogy:
                                                            <?php echo $row2["Pedagogy"] ?></label> </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="computerEngineeringHidden"
                                                            name="computerEngineering" value='0'>
                                                        <input type="checkbox" id="computerEngineering"
                                                            name="computerEngineering" value='1'
                                                            <?php echo isChecked($row2["ComputerEngineering"]) ?>>
                                                    </td>
                                                    <td><label for="cpe">Computer Engineering:
                                                            <?php echo $row2["ComputerEngineering"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="humanComputerInteractionHidden"
                                                            name="humanComputerInteraction" value='0'>
                                                        <input type="checkbox" id="humanComputerInteraction"
                                                            name="humanComputerInteraction" value='1'
                                                            <?php echo isChecked($row2["HumanComputerInteraction"]) ?>>
                                                    </td>
                                                    <td><label for="humanComputerInteraction">Human Computer
                                                            Interaction:
                                                            <?php echo $row2["HumanComputerInteraction"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="programmingLanguagesHidden"
                                                            name="programmingLanguages" value='0'>
                                                        <input type="checkbox" id="programmingLanguages"
                                                            name="programmingLanguages" value='1'
                                                            <?php echo isChecked($row2["ProgrammingLanguages"]) ?>>
                                                    </td>
                                                    <td><label for="programmingLanguages">Programming
                                                            Languages:
                                                            <?php echo $row2["ProgrammingLanguages"] ?></label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="curriculumHidden" name="curriculum"
                                                            value='0'>
                                                        <input type="checkbox" id="curriculum" name="curriculum"
                                                            value='1' <?php echo isChecked($row2["Curriculum"]) ?>>
                                                    </td>
                                                    <td><label for="curriculum">Curriculum:
                                                            <?php echo $row2["Curriculum"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="laboratoryEnvironmentsHidden"
                                                            name="laboratoryEnvironments" value='0'>
                                                        <input type="checkbox" id="laboratoryEnvironments"
                                                            name="laboratoryEnvironments" value='1'
                                                            <?php echo isChecked($row2["LaboratoryEnvironments"]) ?>>
                                                    </td>
                                                    <td><label for="laboratoryEnvironments">Laboratory
                                                            Environments:
                                                            <?php echo $row2["LaboratoryEnvironments"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="researchHidden" name="research"
                                                            value='0'>
                                                        <input type="checkbox" id="research" name="research" value='1'
                                                            <?php echo isChecked($row2["Research"]) ?>>
                                                    </td>
                                                    <td><label for="research">Research:
                                                            <?php echo $row2["Research"] ?></label></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="dataStructuresHidden"
                                                            name="dataStructures" value='0'>
                                                        <input type="checkbox" id="dataStructures" name="dataStructures"
                                                            value='1' <?php echo isChecked($row2["DataStructures"]) ?>>
                                                    </td>
                                                    <td><label for="dataStructures">Data Structures:
                                                            <?php echo $row2["DataStructures"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="literacyHidden" name="literacy"
                                                            value='0'>
                                                        <input type="checkbox" id="literacy" name="literacy" value='1'
                                                            <?php echo isChecked($row2["Literacy"]) ?>>
                                                    </td>
                                                    <td><label for="literacy">Literacy:
                                                            <?php echo $row2["Literacy"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="securityHidden" name="security"
                                                            value='0'>
                                                        <input type="checkbox" id="security" name="security" value='1'
                                                            <?php echo isChecked($row2["Security"]) ?>>
                                                    </td>
                                                    <td><label for="security">Security:
                                                            <?php echo $row2["Security"] ?></label></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="databasesHidden" name="databases"
                                                            value='0'>
                                                        <input type="checkbox" id="databases" name="databases" value='1'
                                                            <?php echo isChecked($row2["DatabasesColumn"]) ?>>
                                                    </td>
                                                    <td><label for="databases">Databases:
                                                            <?php echo $row2["DatabasesColumn"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="mathInComputingHidden"
                                                            name="mathInComputing" value='0'>
                                                        <input type="checkbox" id="mathInComputing"
                                                            name="mathInComputing" value='1'
                                                            <?php echo isChecked($row2["MathematicsInComputing"]) ?>>
                                                    </td>
                                                    <td><label for="mathInComputing">Mathematics in
                                                            Computing:
                                                            <?php echo $row2["MathematicsInComputing"] ?></label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="softwareEngineeringHidden"
                                                            name="softwareEngineering" value='0'>
                                                        <input type="checkbox" id="softwareEngineering"
                                                            name="softwareEngineering" value='1'
                                                            <?php echo isChecked($row2["SoftwareEngineering"]) ?>>
                                                    </td>
                                                    <td><label for="softwareEngineering">Software
                                                            Engineering:
                                                            <?php echo $row2["SoftwareEngineering"] ?></label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="distanceLearningHidden"
                                                            name="distanceLearning" value='0'>
                                                        <input type="checkbox" id="distanceLearning"
                                                            name="distanceLearning" value='1'
                                                            <?php echo isChecked($row2["DistanceLearning"]) ?>>
                                                    </td>
                                                    <td><label for="distanceLearning">Distance Learning:
                                                            <?php echo $row2["DistanceLearning"] ?></label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="multimediaHidden" name="multimedia"
                                                            value='0'>
                                                        <input type="checkbox" id="multimedia" name="multimedia"
                                                            value='1' <?php echo isChecked($row2["Multimedia"]) ?>>
                                                    </td>
                                                    <td><label for="multimedia">Multimedia:
                                                            <?php echo $row2["Multimedia"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="systemsAnalysisDesignHidden"
                                                            name="systemsAnalysisDesign" value='0'>
                                                        <input type="checkbox" id="systemsAnalysisDesign"
                                                            name="systemsAnalysisDesign" value='1'
                                                            <?php echo isChecked($row2["SystemsAnalysisAndDesign"]) ?>>
                                                    </td>
                                                    <td><label for="systemsAnalysisDesign">Systems Analysis and
                                                            Design:
                                                            <?php echo $row2["SystemsAnalysisAndDesign"] ?></label></td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="distributedSystemsHidden"
                                                            name="distributedSystems" value='0'>
                                                        <input type="checkbox" id="distributedSystems"
                                                            name="distributedSystems" value='1'
                                                            <?php echo isChecked($row2["DistributedSystems"]) ?>>
                                                    </td>
                                                    <td><label for="distributedSystems">Distributed
                                                            Systems:
                                                            <?php echo $row2["DistributedSystems"] ?></label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="networkDataCommunicationsHidden"
                                                            name="networkDataCommunications" value='0'>
                                                        <input type="checkbox" id="networkDataCommunications"
                                                            name="networkDataCommunications" value='1'
                                                            <?php echo isChecked($row2["NetworkingDataCommunications"]) ?>>
                                                    </td>
                                                    <td><label for="networkDataCommunications">Networking/Data
                                                            Communications:
                                                            <?php echo $row2["NetworkingDataCommunications"] ?></label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="technologyClassroomHidden"
                                                            name="technologyClassroom" value='0'>
                                                        <input type="checkbox" id="technologyClassroom"
                                                            name="technologyClassroom" value='1'
                                                            <?php echo isChecked($row2["UsingTechnologyInTheClassroom"]) ?>>
                                                    </td>
                                                    <td><label for="technologyClassroom">Using Techonology in
                                                            the
                                                            Classroom:
                                                            <?php echo $row2["UsingTechnologyInTheClassroom"] ?></label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="ethicalSocietalIssuesHidden"
                                                            name="ethicalSocietalIssues" value='0'>
                                                        <input type="checkbox" id="ethicalSocietalIssues"
                                                            name="ethicalSocietalIssues" value='1'
                                                            <?php echo isChecked($row2["EthicalSocietalIssues"]) ?>>
                                                    </td>
                                                    <td><label for="ethicalSocietalIssues">Ethical/Societal
                                                            Issues:
                                                            <?php echo $row2["EthicalSocietalIssues"] ?></label></td>

                                                    <td>
                                                        <input type="hidden" id="nonMajorCoursesHidden"
                                                            name="nonMajorCourses" value='0'>
                                                        <input type="checkbox" id="nonMajorCourses"
                                                            name="nonMajorCourses" value='1'
                                                            <?php echo isChecked($row2["NonMajorCourses"]) ?>>
                                                    </td>
                                                    <td><label for="nonMajorCourses">Non-Major Courses:
                                                            <?php echo $row2["NonMajorCourses"] ?></label>
                                                    </td>

                                                    <td>
                                                        <input type="hidden" id="webProgrammingHidden"
                                                            name="webProgramming" value='0'>
                                                        <input type="checkbox" id="webProgramming" name="webProgramming"
                                                            value='1'
                                                            <?php echo isChecked($row2["WebAndInternetProgramming"]) ?>>
                                                    </td>
                                                    <td><label for="webProgramming">Web and Internet
                                                            Programming:
                                                            <?php echo $row2["WebAndInternetProgramming"] ?></label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <input type="hidden" id="otherHidden" name="other" value='0'>
                                                        <input type="checkbox" id="other" name="other" value='1'
                                                            <?php echo isChecked($row2["Other"]) ?>>
                                                    </td>
                                                    <td><label for="other">Other:
                                                            <?php echo $row2["Other"] ?></label></td>
                                                </tr>
                                            </table>
                                            <label>Decribe Other:</label>
                                            <input type="text" name="OtherDescription" class="form-control" value=":
                                                            <?php echo $row2["OtherDescription"] ?>"
                                                placeholder=" Enter Other Here:">
                                        </div>

                                        <br>

                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </main>
    </main>
</body>

</html>