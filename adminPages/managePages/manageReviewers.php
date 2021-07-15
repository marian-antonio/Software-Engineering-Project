<!DOCTYPE html>
<html>
<?php
    session_start();

    // Create connection
    include "../../includes/dbh.inc.php";
    include "../../includes/functions.inc.php";

    //Initialize variables
    $row2=null;

// Adds data to table
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

    }

    //Edit Updates Form with values from selected row
    if(isset($_POST['editID'])){

        $userID = ($_POST['editID']);
    
        $sql = "SELECT * 
                FROM    `cpms`.`reviewer`
                WHERE `ReviewerID` = '$userID';";
    
        $result = $mysqli->query($sql) or die($mysqli->error());
    
        if($result->num_rows > 0){
            $row2 = $result -> fetch_array(MYSQLI_ASSOC);
        }
        else{
            $result = false;
        }
    
        $_SESSION["message"] = "Record has been selected, Click View to view the Form!";
        $_SESSION["msg_type"] = "success";
    }

    //Updates table with new data
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
    }


    //Deletes selected row
    if(isset($_POST['deleteID'])){
        $ReviewerID = $_POST['deleteID'];
        $sql = ("DELETE FROM `reviewer`
        WHERE ReviewerID = '$ReviewerID' ;") ;
        $result = $mysqli->query($sql) or die($mysqli->error());


        $_SESSION['message'] = "Record has been Deleted!";
        $_SESSION['msg_type'] = "danger";
    }

?>

<!--Header -->

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
    <title>Admin - Manage Reviewers</title>
</head>

<!--Body -->

<body>
    <header>
        <a href="../adminHome.html" class="logo">
            <img src="../../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="../adminHome.html">HOME</a></li>
            <li><a href="../adminManage.html" style="background-color: white; color: black;">
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
                    <li><a href="../adminManage.html">Manage</a></li>
                    <li>Manage Reviewers</li>
                </ul>
            </div>

            <div class="reports-container">
                <div class="page-content">
                    <h1>Table Maintenance - Reviewers</h1>
                    <p>
                        This is a table of all the Reviewers currently registered to reivew papers.
                        Here, you can manually add new Reviewers, edit the current data fields, or
                        delete it entirely. Under the "actions" column click Select to select the row you would like to
                        edit,
                        Then, click View to view the form to edit that row. To delete a row simply click the Delete
                        button.

                    </p>
                </div>

                <!-- Message Display-->
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

                <!-- Table For Data -->
                <div class="data-table">
                    <div class="reports">
                        <table>
                            <tr>
                                <th>Actions</th>
                                <th>ReviewerID</th>
                                <th>First Name</th>
                                <th>MI</th>
                                <th>Last Name</th>
                                <th>Affiliation</th>
                                <th>Department</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>ZipCode</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Password</th>

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
                            </tr>





                            <?php
                                $sql = "SELECT * 
                                        FROM reviewer";
                                $result = $mysqli-> query($sql) or die($mysqli->error());

                                if($result->num_rows > 0){
                                    while ($row = $result-> fetch_assoc()) : 
                            ?>


                            <tr>
                                <td style="word-spacing: 5px; text-align: center;">
                                    <form action="manageReviewers.php" method="post">
                                        <button type="submit" class="btn btn-primary" name="editID"
                                            value="<?php echo $row["ReviewerID"] ?>">
                                            Select
                                        </button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#ReviewerModalEdit">
                                            View
                                        </button>

                                        <button type="submit" class="btn btn-primary" name="deleteID"
                                            value="<?php echo $row["ReviewerID"] ?>">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                <td><?php  echo $row["ReviewerID"]  ?></td>
                                <td><?php  echo $row["FirstName"]  ?></td>
                                <td><?php  echo $row["MiddleInitial"]  ?></td>
                                <td><?php  echo $row["LastName"]  ?></td>
                                <td><?php  echo $row["Affiliation"]  ?></td>
                                <td><?php  echo $row["Department"]  ?></td>
                                <td><?php  echo $row["Address"]  ?></td>
                                <td><?php  echo $row["City"]  ?></td>
                                <td><?php  echo $row["State"]  ?></td>
                                <td><?php  echo $row["ZipCode"]  ?></td>
                                <td><?php  echo $row["PhoneNumber"]  ?></td>
                                <td><?php  echo $row["EmailAddress"]  ?></td>
                                <td><?php  echo $row["Password"]  ?></td>

                                <td><?php  echo $row["AnalysisOfAlgorithms"]  ?></td>
                                <td><?php  echo $row["Applications"]  ?></td>
                                <td><?php  echo $row["Architecture"]  ?></td>
                                <td><?php  echo $row["ArtificialIntelligence"]  ?></td>
                                <td><?php  echo $row["ComputerEngineering"]  ?></td>
                                <td><?php  echo $row["Curriculum"]  ?></td>
                                <td><?php  echo $row["DataStructures"]  ?></td>
                                <td><?php  echo $row["DatabasesColumn"]  ?></td>
                                <td><?php  echo $row["DistancedLearning"]  ?></td>
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
                                <td><?php  echo $row["ParallelProcessing"]  ?></td>
                                <td><?php  echo $row["Pedagogy"]  ?></td>
                                <td><?php  echo $row["ProgrammingLanguages"]  ?></td>
                                <td><?php  echo $row["Research"]  ?></td>
                                <td><?php  echo $row["Security"]  ?></td>
                                <td><?php  echo $row["SoftwareEngineering"]  ?></td>
                                <td><?php  echo $row["SystemsAnalysisAndDesign"]  ?></td>
                                <td><?php  echo $row["UsingTechnologyInTheClassroom"]  ?></td>
                                <td><?php  echo $row["WebAndInternetProgramming"]  ?></td>
                                <td><?php  echo $row["Other"]  ?></td>
                            </tr>
                            <?php endwhile;}?>
                        </table>

                        <br>

                        <!-- Button trigger Add modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#ReviewerModalAdd">
                            Add Reviewer
                        </button>

                        <!-- Button trigger Edit modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#ReviewerModalEdit">
                            Edit Reviewer
                        </button>

                    </div>
                </div>


                <!-- Modal Add with Input form to add data to Table-->
                <div class="modal fade" id="ReviewerModalAdd" tabindex="-1" role="dialog"
                    aria-labelledby="ReviewerModalAddLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ReviewerModalAddLabel">Enter Reviewer Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="manageReviewers.php" method="post">
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>ID:</label>
                                        <input type="text" name="ReviewerID" class=" form-control" value=""
                                            placeholder=" Enter ID" required>

                                        <label>First Name:</label>
                                        <input type="text" name="FirstName" class="form-control" value=""
                                            placeholder=" Enter First Name" required>

                                        <label>Middle Initial:</label>
                                        <input type="text" name="MiddleInitial" class="form-control" value=""
                                            placeholder=" Enter Middle Initial">

                                        <label>Last Name:</label>
                                        <input type="text" name="LastName" class="form-control" value=""
                                            placeholder=" Enter Last Name" required>

                                        <label>Affiliation:</label>
                                        <input type="text" name="Affiliation" class=" form-control" value=""
                                            placeholder=" Enter Affiliation">

                                        <label>Department:</label>
                                        <input type="text" name="Department" class="form-control" value=""
                                            placeholder=" Enter Department">

                                        <label>Address:</label>
                                        <input type="text" name="Address" class="form-control" value=""
                                            placeholder="Enter Address">

                                        <label>City:</label>
                                        <input type="text" name="City" class="form-control" value=""
                                            placeholder=" Enter City:">

                                        <label>State:</label>
                                        <input type="text" name="State" class="form-control" value=""
                                            placeholder=" Enter State:">

                                        <label>ZipCode:</label>
                                        <input type="text" name="ZipCode" class="form-control" value=""
                                            placeholder=" Enter ZipCode:">

                                        <label>PhoneNumber:</label>
                                        <input type="text" name="PhoneNumber" class="form-control" value=""
                                            placeholder=" Enter PhoneNumber:" required>

                                        <label>EmailAddress:</label>
                                        <input type="text" name="EmailAddress" class="form-control" value=""
                                            placeholder=" Enter EmailAddress:" required>

                                        <label>Password:</label>
                                        <input type="text" name="Password" class="form-control" value=""
                                            placeholder=" Enter Password:" required>

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

            </div>

            </div>

            <!-- Modal Edit with input form to modify and update data from table-->
            <div class="modal fade" id="ReviewerModalEdit" tabindex="-1" role="dialog"
                aria-labelledby="ReviewerModalEditLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ReviewerModalEditLabel">Change Reviewer Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="manageReviewers.php" method="post">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>ID:</label>
                                    <input type="text" name="ReviewerID" class=" form-control"
                                        value="<?php echo $row2["ReviewerID"] ?>" placeholder=" Enter ID" required>

                                    <label>First Name:</label>
                                    <input type="text" name="FirstName" class="form-control"
                                        value="<?php echo $row2["FirstName"] ?>" placeholder=" Enter First Name"
                                        required>

                                    <label>Middle Initial:</label>
                                    <input type="text" name="MiddleInitial" class="form-control"
                                        value="<?php echo $row2["MiddleInitial"] ?>"
                                        placeholder=" Enter Middle Initial">

                                    <label>Last Name:</label>
                                    <input type="text" name="LastName" class="form-control"
                                        value="<?php echo $row2["LastName"] ?>" placeholder=" Enter Last Name" required>

                                    <label>Affiliation:</label>
                                    <input type="text" name="Affiliation" class=" form-control"
                                        value="<?php echo $row2["Affiliation"] ?>" placeholder=" Enter Affiliation">

                                    <label>Department:</label>
                                    <input type="text" name="Department" class="form-control"
                                        value="<?php echo $row2["Department"] ?>" placeholder=" Enter Department">

                                    <label>Address:</label>
                                    <input type="text" name="Address" class="form-control"
                                        value="<?php echo $row2["Address"] ?>" placeholder="Enter Address">

                                    <label>City:</label>
                                    <input type="text" name="City" class="form-control"
                                        value="<?php echo $row2["City"] ?>" placeholder=" Enter City:">

                                    <label>State:</label>
                                    <input type="text" name="State" class="form-control"
                                        value="<?php echo $row2["State"] ?>" placeholder=" Enter State:">

                                    <label>ZipCode:</label>
                                    <input type="text" name="ZipCode" class="form-control"
                                        value="<?php echo $row2["ZipCode"] ?>" placeholder=" Enter ZipCode:">

                                    <label>PhoneNumber:</label>
                                    <input type="text" name="PhoneNumber" class="form-control"
                                        value="<?php echo $row2["PhoneNumber"] ?>" placeholder=" Enter PhoneNumber:"
                                        required>

                                    <label>EmailAddress:</label>
                                    <input type="text" name="EmailAddress" class="form-control"
                                        value="<?php echo $row2["EmailAddress"] ?>" placeholder=" Enter EmailAddress:"
                                        required>

                                    <label>Password:</label>
                                    <input type="text" name="Password" class="form-control"
                                        value="<?php echo $row2["Password"] ?>" placeholder=" Enter Password:" required>

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
                                                        Algorithms</label></td>

                                                <td>
                                                    <input type="hidden" id="firstYearComputingHidden"
                                                        name="firstYearComputing" value='0'>
                                                    <input type="checkbox" id="firstYearComputing"
                                                        name="firstYearComputing" value='1'
                                                        <?php echo isChecked($row2["FirstYearComputing"]) ?>>
                                                </td>
                                                <td><label for="firstYearComputing">First Year
                                                        Computing</label>
                                                </td>

                                                <td>
                                                    <input type="hidden" id="objectOrientedIssuesHidden"
                                                        name="objectOrientedIssues" value='0'>
                                                    <input type="checkbox" id="objectOrientedIssues"
                                                        name="objectOrientedIssues" value='1'
                                                        <?php echo isChecked($row2["ObjectOrientedIssues"]) ?>>
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
                                                        value='1' <?php echo isChecked($row2["Applications"]) ?>>
                                                </td>
                                                <td><label for="applications">Applications</label> </td>

                                                <td>
                                                    <input type="hidden" id="genderIssuesHidden" name="genderIssues"
                                                        value='0'>
                                                    <input type="checkbox" id="genderIssues" name="genderIssues"
                                                        value='1' <?php echo isChecked($row2["GenderIssues"]) ?>>
                                                </td>
                                                <td><label for="genderIssues">Gender Issues</label></td>

                                                <td>
                                                    <input type="hidden" id="operatingSystemsHidden"
                                                        name="operatingSystems" value='0'>
                                                    <input type="checkbox" id="operatingSystems" name="operatingSystems"
                                                        value='1' <?php echo isChecked($row2["OperatingSystems"]) ?>>
                                                </td>
                                                <td><label for="operatingSystems">Operating Systems</label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="hidden" id="architectureHidden" name="architecture"
                                                        value='0'>
                                                    <input type="checkbox" id="architecture" name="architecture"
                                                        value='1' <?php echo isChecked($row2["Architecture"]) ?>>
                                                </td>
                                                <td><label for="architecture">Architecture</label></td>

                                                <td>
                                                    <input type="hidden" id="grantWritingHidden" name="grantWriting"
                                                        value='0'>
                                                    <input type="checkbox" id="grantWriting" name="grantWriting"
                                                        value='1' <?php echo isChecked($row2["GrantWriting"]) ?>>
                                                </td>
                                                <td><label for="grantWriting">Grant Writing</label></td>

                                                <td>
                                                    <input type="hidden" id="parallelProcessingHidden"
                                                        name="parallelProcessing" value='0'>
                                                    <input type="checkbox" id="parallelProcessing"
                                                        name="parallelProcessing" value='1'
                                                        <?php echo isChecked($row2["ParallelProcessing"]) ?>>
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
                                                        name="artificialIntelligence" value='1'
                                                        <?php echo isChecked($row2["ArtificialIntelligence"]) ?>>
                                                </td>
                                                <td><label for="ai">Artificial Intelligence</label></td>

                                                <td>
                                                    <input type="hidden" id="graphicsImageProcessingHidden"
                                                        name="graphicsImageProcessing" value='0'>
                                                    <input type="checkbox" id="graphicsImageProcessing"
                                                        name="graphicsImageProcessing" value='1'
                                                        <?php echo isChecked($row2["GraphicsImageProcessing"]) ?>>
                                                </td>
                                                <td><label for="graphicsImageProcessing">Graphics Image
                                                        Processing</label></td>

                                                <td>
                                                    <input type="hidden" id="pedagogyHidden" name="pedagogy" value='0'>
                                                    <input type="checkbox" id="pedagogy" name="pedagogy" value='1'
                                                        <?php echo isChecked($row2["Pedagogy"]) ?>>
                                                </td>
                                                <td><label for="pedagogy">Pedagogy</label> </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="hidden" id="computerEngineeringHidden"
                                                        name="computerEngineering" value='0'>
                                                    <input type="checkbox" id="computerEngineering"
                                                        name="computerEngineering" value='1'
                                                        <?php echo isChecked($row2["ComputerEngineering"]) ?>>
                                                </td>
                                                <td><label for="cpe">Computer Engineering</label></td>

                                                <td>
                                                    <input type="hidden" id="humanComputerInteractionHidden"
                                                        name="humanComputerInteraction" value='0'>
                                                    <input type="checkbox" id="humanComputerInteraction"
                                                        name="humanComputerInteraction" value='1'
                                                        <?php echo isChecked($row2["HumanComputerInteraction"]) ?>>
                                                </td>
                                                <td><label for="humanComputerInteraction">Human Computer
                                                        Interaction</label></td>

                                                <td>
                                                    <input type="hidden" id="programmingLanguagesHidden"
                                                        name="programmingLanguages" value='0'>
                                                    <input type="checkbox" id="programmingLanguages"
                                                        name="programmingLanguages" value='1'
                                                        <?php echo isChecked($row2["ProgrammingLanguages"]) ?>>
                                                </td>
                                                <td><label for="programmingLanguages">Programming
                                                        Languages</label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="hidden" id="curriculumHidden" name="curriculum"
                                                        value='0'>
                                                    <input type="checkbox" id="curriculum" name="curriculum" value='1'
                                                        <?php echo isChecked($row2["Curriculum"]) ?>>
                                                </td>
                                                <td><label for="curriculum">Curriculum</label></td>

                                                <td>
                                                    <input type="hidden" id="laboratoryEnvironmentsHidden"
                                                        name="laboratoryEnvironments" value='0'>
                                                    <input type="checkbox" id="laboratoryEnvironments"
                                                        name="laboratoryEnvironments" value='1'
                                                        <?php echo isChecked($row2["LaboratoryEnvironments"]) ?>>
                                                </td>
                                                <td><label for="laboratoryEnvironments">Laboratory
                                                        Environments</label></td>

                                                <td>
                                                    <input type="hidden" id="researchHidden" name="research" value='0'>
                                                    <input type="checkbox" id="research" name="research" value='1'
                                                        <?php echo isChecked($row2["Research"]) ?>>
                                                </td>
                                                <td><label for="research">Research</label></td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="hidden" id="dataStructuresHidden" name="dataStructures"
                                                        value='0'>
                                                    <input type="checkbox" id="dataStructures" name="dataStructures"
                                                        value='1' <?php echo isChecked($row2["DataStructures"]) ?>>
                                                </td>
                                                <td><label for="dataStructures">Data Structures</label></td>

                                                <td>
                                                    <input type="hidden" id="literacyHidden" name="literacy" value='0'>
                                                    <input type="checkbox" id="literacy" name="literacy" value='1'
                                                        <?php echo isChecked($row2["Literacy"]) ?>>
                                                </td>
                                                <td><label for="literacy">Literacy</label></td>

                                                <td>
                                                    <input type="hidden" id="securityHidden" name="security" value='0'>
                                                    <input type="checkbox" id="security" name="security" value='1'
                                                        <?php echo isChecked($row2["Security"]) ?>>
                                                </td>
                                                <td><label for="security">Security</label></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="hidden" id="databasesHidden" name="databases"
                                                        value='0'>
                                                    <input type="checkbox" id="databases" name="databases" value='1'
                                                        <?php echo isChecked($row2["DatabasesColumn"]) ?>>
                                                </td>
                                                <td><label for="databases">Databases</label></td>

                                                <td>
                                                    <input type="hidden" id="mathInComputingHidden"
                                                        name="mathInComputing" value='0'>
                                                    <input type="checkbox" id="mathInComputing" name="mathInComputing"
                                                        value='1'
                                                        <?php echo isChecked($row2["MathematicsInComputing"]) ?>>
                                                </td>
                                                <td><label for="mathInComputing">Mathematics in
                                                        Computing</label>
                                                </td>

                                                <td>
                                                    <input type="hidden" id="softwareEngineeringHidden"
                                                        name="softwareEngineering" value='0'>
                                                    <input type="checkbox" id="softwareEngineering"
                                                        name="softwareEngineering" value='1'
                                                        <?php echo isChecked($row2["SoftwareEngineering"]) ?>>
                                                </td>
                                                <td><label for="softwareEngineering">Software
                                                        Engineering</label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="hidden" id="distanceLearningHidden"
                                                        name="distanceLearning" value='0'>
                                                    <input type="checkbox" id="distanceLearning" name="distanceLearning"
                                                        value='1' <?php echo isChecked($row2["DistancedLearning"]) ?>>
                                                </td>
                                                <td><label for="distanceLearning">Distance Learning</label>
                                                </td>

                                                <td>
                                                    <input type="hidden" id="multimediaHidden" name="multimedia"
                                                        value='0'>
                                                    <input type="checkbox" id="multimedia" name="multimedia" value='1'
                                                        <?php echo isChecked($row2["Multimedia"]) ?>>
                                                </td>
                                                <td><label for="multimedia">Multimedia</label></td>

                                                <td>
                                                    <input type="hidden" id="systemsAnalysisDesignHidden"
                                                        name="systemsAnalysisDesign" value='0'>
                                                    <input type="checkbox" id="systemsAnalysisDesign"
                                                        name="systemsAnalysisDesign" value='1'
                                                        <?php echo isChecked($row2["SystemsAnalysisAndDesign"]) ?>>
                                                </td>
                                                <td><label for="systemsAnalysisDesign">Systems Analysis and
                                                        Design</label></td>
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
                                                        Systems</label>
                                                </td>

                                                <td>
                                                    <input type="hidden" id="networkDataCommunicationsHidden"
                                                        name="networkDataCommunications" value='0'>
                                                    <input type="checkbox" id="networkDataCommunications"
                                                        name="networkDataCommunications" value='1'
                                                        <?php echo isChecked($row2["NetworkingDataCommunications"]) ?>>
                                                </td>
                                                <td><label for="networkDataCommunications">Networking/Data
                                                        Communications</label></td>

                                                <td>
                                                    <input type="hidden" id="technologyClassroomHidden"
                                                        name="technologyClassroom" value='0'>
                                                    <input type="checkbox" id="technologyClassroom"
                                                        name="technologyClassroom" value='1'
                                                        <?php echo isChecked($row2["UsingTechnologyInTheClassroom"]) ?>>
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
                                                        name="ethicalSocietalIssues" value='1'
                                                        <?php echo isChecked($row2["EthicalSocietalIssues"]) ?>>
                                                </td>
                                                <td><label for="ethicalSocietalIssues">Ethical/Societal
                                                        Issues</label></td>

                                                <td>
                                                    <input type="hidden" id="nonMajorCoursesHidden"
                                                        name="nonMajorCourses" value='0'>
                                                    <input type="checkbox" id="nonMajorCourses" name="nonMajorCourses"
                                                        value='1' <?php echo isChecked($row2["NonMajorCourses"]) ?>>
                                                </td>
                                                <td><label for="nonMajorCourses">Non-Major Courses</label>
                                                </td>

                                                <td>
                                                    <input type="hidden" id="webProgrammingHidden" name="webProgramming"
                                                        value='0'>
                                                    <input type="checkbox" id="webProgramming" name="webProgramming"
                                                        value='1'
                                                        <?php echo isChecked($row2["WebAndInternetProgramming"]) ?>>
                                                </td>
                                                <td><label for="webProgramming">Web and Internet
                                                        Programming</label>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <input type="hidden" id="otherHidden" name="other" value='0'>
                                                    <input type="checkbox" id="other" name="other" value='1'
                                                        <?php echo isChecked($row2["Other"]) ?>>
                                                </td>
                                                <td><label for="other">Other</label></td>
                                            </tr>
                                        </table>
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
        </main>
    </main>
</body>
<?php $mysqli->close(); ?>

</html>