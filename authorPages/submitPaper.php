<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) and $_SESSION["userType"] == "author"))
        header("location: ../login.php?error=invalidAccess");
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Author - Submit Papers</title>
</head>
<body>
    <header>
        <a href="authorHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="authorHome.php">HOME</a></li>
            <li><a href="submitPaper.php" style="background-color: white; color: black;">SUBMIT PAPER</a></a></li>
            <li><a href="authorAccount.php">YOUR ACCOUNT</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <div class="second-nav">
            <ul class="breadcrumb">
                <li><a href="authorHome.php">Home</a></li>
                <li>Submit Paper</li>
            </ul>
        </div>
        
        <div class="container">
            <div class="page-content">
                <h1>Paper Submission</h1>
                <p>
                    Click the 'Choose File' button to select the file you want to upload.
                    Then, select the topics that describe your paper. Once you are finished,
                    click 'Complete Submission' to submit your paper. Only ".pdf" and ".doc" files will be accepted.
                </p>
            </div>
            <div class="submit-container">
                <form action="..\includes\submitPaper.inc.php" method="post" id="paperSubmissionForm" enctype="multipart/form-data">
                    <div class="upload-container">
                        <table>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><label for="paperTitle" style="margin-right: 20px;">Paper Title</label></td>
                                <td><input type="text" id="paperTitle" name="paperTitle" placeholder="Paper Title" required></td>
                            </tr>
                            <tr>
                                <td>Upload</td>                            
                                <td><input type="file" id="paperUpload" name="paperUpload" required></td>
                            </tr>
                        </table>
                    </div>
                    <br><br>
                    <h3>Additional Notes</h3>
                    <textarea name="noteToReviewers" form="paperSubmissionForm" placeholder="Enter any notes you would like to leave for the reviewers of your paper...(Optional)"></textarea>
                    <br>
                    <h1 style="text-align: center;">Topics</h1>
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
                                    <input type="hidden" id="analysisOfAlgorithmsHidden" name="analysisOfAlgorithms" value='0'>
                                    <input type="checkbox" id="analysisOfAlgorithms" name="analysisOfAlgorithms" value='1'>
                                </td>
                                <td><label for="analysisOfAlgorithms" class ="checkbox">Analysis of Algorithms</label></td>

                                <td>
                                    <input type="hidden" id="firstYearComputingHidden" name="firstYearComputing" value='0'>
                                    <input type="checkbox" id="firstYearComputing" name="firstYearComputing" value='1'>
                                </td>
                                <td><label for="firstYearComputing">First Year Computing</label></td>

                                <td>
                                    <input type="hidden" id="objectOrientedIssuesHidden" name="objectOrientedIssues" value='0'>
                                    <input type="checkbox" id="objectOrientedIssues" name="objectOrientedIssues" value='1'>
                                </td>
                                <td><label for="objectOrientedIssues">Object Oriented Issues</label></td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" id="applicationsHidden" name="applications" value='0'>
                                    <input type="checkbox" id="applications" name="applications" value='1'>
                                </td>
                                <td><label for="applications">Applications</label> </td>

                                <td>
                                    <input type="hidden" id="genderIssuesHidden" name="genderIssues" value='0'>
                                    <input type="checkbox" id="genderIssues" name="genderIssues" value='1'>
                                </td>
                                <td><label for="genderIssues">Gender Issues</label></td>

                                <td>
                                    <input type="hidden" id="operatingSystemsHidden" name="operatingSystems" value='0'>
                                    <input type="checkbox" id="operatingSystems" name="operatingSystems" value='1'>
                                </td>
                                <td><label for="operatingSystems">Operating Systems</label></td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" id="architectureHidden" name="architecture" value='0'>
                                    <input type="checkbox" id="architecture" name="architecture" value='1'>
                                </td>
                                <td><label for="architecture">Architecture</label></td>

                                <td>
                                    <input type="hidden" id="grantWritingHidden" name="grantWriting" value='0'>
                                    <input type="checkbox" id="grantWriting" name="grantWriting" value='1'>
                                </td>
                                <td><label for="grantWriting">Grant Writing</label></td>

                                <td>
                                    <input type="hidden" id="parallelProcessingHidden" name="parallelProcessing" value='0'>
                                    <input type="checkbox" id="parallelProcessing" name="parallelProcessing" value='1'>
                                </td>
                                <td><label for="parallelProcessing">Parallel Processing</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" id="artificialIntelligenceHidden" name="artificialIntelligence" value='0'>
                                    <input type="checkbox" id="artificialIntelligence" name="artificialIntelligence" value='1'>
                                </td>
                                <td><label for="ai">Artificial Intelligence</label></td>

                                <td>
                                    <input type="hidden" id="graphicsImageProcessingHidden" name="graphicsImageProcessing" value='0'>
                                    <input type="checkbox" id="graphicsImageProcessing" name="graphicsImageProcessing" value='1'>
                                </td>
                                <td><label for="graphicsImageProcessing">Graphics Image Processing</label></td>

                                <td>
                                    <input type="hidden" id="pedagogyHidden" name="pedagogy" value='0'>
                                    <input type="checkbox" id="pedagogy" name="pedagogy" value='1'>
                                </td>
                                <td><label for="pedagogy">Pedagogy</label> </td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" id="computerEngineeringHidden" name="computerEngineering" value='0'>
                                    <input type="checkbox" id="computerEngineering" name="computerEngineering" value='1'>
                                </td>
                                <td><label for="cpe">Computer Engineering</label></td>

                                <td>
                                    <input type="hidden" id="humanComputerInteractionHidden" name="humanComputerInteraction" value='0'>
                                    <input type="checkbox" id="humanComputerInteraction" name="humanComputerInteraction" value='1'>
                                </td>
                                <td><label for="humanComputerInteraction">Human Computer Interaction</label></td>

                                <td>
                                    <input type="hidden" id="programmingLanguagesHidden" name="programmingLanguages" value='0'>
                                    <input type="checkbox" id="programmingLanguages" name="programmingLanguages" value='1'>
                                </td>
                                <td><label for="programmingLanguages">Programming Languages</label></td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" id="curriculumHidden" name="curriculum" value='0'>
                                    <input type="checkbox" id="curriculum" name="curriculum" value='1'>
                                </td>
                                <td><label for="curriculum">Curriculum</label></td>

                                <td>
                                    <input type="hidden" id="laboratoryEnvironmentsHidden" name="laboratoryEnvironments" value='0'>
                                    <input type="checkbox" id="laboratoryEnvironments" name="laboratoryEnvironments" value='1'>
                                </td>
                                <td><label for="laboratoryEnvironments">Laboratory Environments</label></td>

                                <td>
                                    <input type="hidden" id="researchHidden" name="research" value='0'>
                                    <input type="checkbox" id="research" name="research" value='1'>
                                </td>
                                <td><label for="research">Research</label></td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" id="dataStructuresHidden" name="dataStructures" value='0'>
                                    <input type="checkbox" id="dataStructures" name="dataStructures" value='1'>
                                </td>
                                <td><label for="dataStructures">Data Structures</label></td>

                                <td>
                                    <input type="hidden" id="literacyHidden" name="literacy" value='0'>
                                    <input type="checkbox" id="literacy" name="literacy" value='1'>
                                </td>
                                <td><label for="literacy">Literacy</label></td>

                                <td>
                                    <input type="hidden" id="securityHidden" name="security" value='0'>
                                    <input type="checkbox" id="security" name="security" value='1'>
                                </td>
                                <td><label for="security">Security</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" id="databasesHidden" name="databases" value='0'>
                                    <input type="checkbox" id="databases" name="databases" value='1'>
                                </td>
                                <td><label for="databases">Databases</label></td>

                                <td>
                                    <input type="hidden" id="mathInComputingHidden" name="mathInComputing" value='0'>
                                    <input type="checkbox" id="mathInComputing" name="mathInComputing" value='1'>
                                </td>
                                <td><label for="mathInComputing">Mathematics in Computing</label></td>

                                <td>
                                    <input type="hidden" id="softwareEngineeringHidden" name="softwareEngineering" value='0'>
                                    <input type="checkbox" id="softwareEngineering" name="softwareEngineering" value='1'>
                                </td>
                                <td><label for="softwareEngineering">Software Engineering</label></td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" id="distanceLearningHidden" name="distanceLearning" value='0'>
                                    <input type="checkbox" id="distanceLearning" name="distanceLearning" value='1'>
                                </td>
                                <td><label for="distanceLearning">Distance Learning</label></td>

                                <td>
                                    <input type="hidden" id="multimediaHidden" name="multimedia" value='0'>
                                    <input type="checkbox" id="multimedia" name="multimedia" value='1'>
                                </td>
                                <td><label for="multimedia">Multimedia</label></td>

                                <td>
                                    <input type="hidden" id="systemsAnalysisDesignHidden" name="systemsAnalysisDesign" value='0'>
                                    <input type="checkbox" id="systemsAnalysisDesign" name="systemsAnalysisDesign" value='1'>
                                </td>
                                <td><label for="systemsAnalysisDesign">Systems Analysis and Design</label></td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" id="distributedSystemsHidden" name="distributedSystems" value='0'>
                                    <input type="checkbox" id="distributedSystems" name="distributedSystems" value='1'>
                                </td>
                                <td><label for="distributedSystems">Distributed Systems</label></td>

                                <td>
                                    <input type="hidden" id="networkDataCommunicationsHidden" name="networkDataCommunications" value='0'>
                                    <input type="checkbox" id="networkDataCommunications" name="networkDataCommunications" value='1'>
                                </td>
                                <td><label for="networkDataCommunications">Networking/Data Communications</label></td>

                                <td>
                                    <input type="hidden" id="technologyClassroomHidden" name="technologyClassroom" value='0'>
                                    <input type="checkbox" id="technologyClassroom" name="technologyClassroom" value='1'>
                                </td>
                                <td><label for="technologyClassroom">Using Techonology in the Classroom</label></td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" id="ethicalSocietalIssuesHidden" name="ethicalSocietalIssues" value='0'>
                                    <input type="checkbox" id="ethicalSocietalIssues" name="ethicalSocietalIssues" value='1'>
                                </td>
                                <td><label for="ethicalSocietalIssues">Ethical/Societal Issues</label></td>

                                <td>
                                    <input type="hidden" id="nonMajorCoursesHidden" name="nonMajorCourses" value='0'>
                                    <input type="checkbox" id="nonMajorCourses" name="nonMajorCourses" value='1'>
                                </td>
                                <td><label for="nonMajorCourses">Non-Major Courses</label></td>

                                <td>
                                    <input type="hidden" id="webProgrammingHidden" name="webProgramming" value='0'>
                                    <input type="checkbox" id="webProgramming" name="webProgramming" value='1'>
                                </td>
                                <td><label for="webProgramming">Web and Internet Programming</label></td>
                            </tr>

                            <tr>
                                <td>
                                    <input type="hidden" id="otherHidden" name="other" value='0'>
                                    <input type="checkbox" id="other" name="other" value='1'>
                                </td>
                                <td><label for="other">Other</label></td>
                            </tr>
                        </table>
                        <textarea name="otherDescription" form="paperSubmissionForm" placeholder="If other is selected, describe other topics here..."></textarea>
                        <br>
                    </div>
                    <div class="submit-button"><button type="submit" name="submitPaper">SUBMIT PAPER</button></div>
                </form>                
            </div>
        </div>
    </main>
</body>
</html>