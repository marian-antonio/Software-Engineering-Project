<?php 
    session_start();
    if(isset($_SESSION["userID"])){
        if ($_SESSION["userType"] == "author")
            header("location: ../authorPages/authorHome.php");
        elseif ($_SESSION["userType"] == "reviewer")
            header("location: ../reviewerPages/reviewerHome.php");
        elseif ($_SESSION["userType"] == "admin")
            header("location: ../adminPages/adminHome.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/e1b93c3ea7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Reviewer Registration</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
</head>
<body>
    <header>
        <a href="reviewerRegistration.php" class="logo">
            <img src="images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li>Already have an account? <a href="login.php">CLICK HERE TO LOG IN</a></li>
        </ul>
    </header>
    <main>
        <div class="registration-page">
            <form action="includes/register.inc.php" method="post" id="reviewForm">
                <h1>Reviewer Registration</h1>
                <p>
                    Registering as a <b>reviewer</b> will allow you to review papers that were submitted for the Consortium for Computing Sciences in Colleges Midwest 
                    (CCSCMW) Annual Conference next Fall. <a href="authorRegistration.php">Click here</a> to register as an <b>author</b> instead. 
                    (NOTE: If you would like to be an author AND a reviewer, you will need to register for each role separately.)
                    <br><br>
                    Fill in the boxes below with the appropriate information to create your account.
                    Once you have finished and verified your information is accurate,
                    click the 'Complete Registration' button at the bottom of the page
                    to create your <b>reviewer</b> account.
                </p> 
                <hr><br>
                <div class="errors">
                    <?php
                        session_start();
                        if(isset($_SESSION['error'])){
                            echo "<h3 style='color: red; text-align: center;'>" . "Please fix the following errors before proceeding:" . "</h3> <br>";
                            
                            foreach ($_SESSION['error'] as $key=>$value){
                                echo "<ul id=\"input-errors\"> 
                                    <li style='color: red; margin: 5px 30px;'> {$value} </li>
                                </ul>";
                            }
                        }
                    ?>
                </div>
                <div class="user-info">
                    <div class="input-box">
                        <label for="emailAddress">Email</label> 
                        <input type="email" name="emailAddress" placeholder="someone@email.com" required>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label> 
                        <input type="password" name="password" placeholder="Password" required>
                        <label for="confirmPassword">Confirm Password</label> 
                        <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                    </div>
                    <div class="input-box">
                        <label for="firstName">Full Name</label>
                        <input type="text" name="firstName" placeholder="First Name" required>
                        <input type="text" name="middleInitial" placeholder="MI" maxlength = "1">
                        <input type="text" name="lastName" placeholder="Last Name" required>
                    </div>
                    <div class="input-box">
                        <label for="affiliation"> Affiliation </label> 
                        <input type="text" name="affiliation" placeholder="Affiliation" required>
                        <label for="department">Department</label> 
                        <input type="text" name="department" placeholder="Department" required>
                    </div>
                    <div class="input-box-address">
                        <label for="address">Address</label> 
                        <input type="text" name="address" placeholder="Street Address" required>
                        <input type="text" name="city" placeholder="City" required>
                        <select id="state" name="state" required>
                            <option value="">-</option>
                            <option value="AL">AL</option>
                            <option value="AK">AK</option>
                            <option value="AR">AR</option>	
                            <option value="AZ">AZ</option>
                            <option value="CA">CA</option>
                            <option value="CO">CO</option>
                            <option value="CT">CT</option>
                            <option value="DC">DC</option>
                            <option value="DE">DE</option>
                            <option value="FL">FL</option>
                            <option value="GA">GA</option>
                            <option value="HI">HI</option>
                            <option value="IA">IA</option>	
                            <option value="ID">ID</option>
                            <option value="IL">IL</option>
                            <option value="IN">IN</option>
                            <option value="KS">KS</option>
                            <option value="KY">KY</option>
                            <option value="LA">LA</option>
                            <option value="MA">MA</option>
                            <option value="MD">MD</option>
                            <option value="ME">ME</option>
                            <option value="MI">MI</option>
                            <option value="MN">MN</option>
                            <option value="MO">MO</option>	
                            <option value="MS">MS</option>
                            <option value="MT">MT</option>
                            <option value="NC">NC</option>	
                            <option value="NE">NE</option>
                            <option value="NH">NH</option>
                            <option value="NJ">NJ</option>
                            <option value="NM">NM</option>			
                            <option value="NV">NV</option>
                            <option value="NY">NY</option>
                            <option value="ND">ND</option>
                            <option value="OH">OH</option>
                            <option value="OK">OK</option>
                            <option value="OR">OR</option>
                            <option value="PA">PA</option>
                            <option value="RI">RI</option>
                            <option value="SC">SC</option>
                            <option value="SD">SD</option>
                            <option value="TN">TN</option>
                            <option value="TX">TX</option>
                            <option value="UT">UT</option>
                            <option value="VT">VT</option>
                            <option value="VA">VA</option>
                            <option value="WA">WA</option>
                            <option value="WI">WI</option>	
                            <option value="WV">WV</option>
                            <option value="WY">WY</option>
                        </select>		
                        <input type="text" id="zipCode" name="zipCode" placeholder="Zip Code" required>
                    </div>
                    <div class="input-box">
                        <label for="phone">Phone Number</label> 
                        <input type="text" id="phone" name="phoneNumber" placeholder="123-456-7890" required>
                    </div>
                    <br><br><br><br><hr><br>
                    <h1>Topics</h1>
                        <p>Please indicate the topics in which you are knowledgeable and/or interested. (Note: If you've reviewed in the past,
                            you will still need to provide this information as interests do change.) </p>
                        <div class="errors">
                            <?php
                                if(isset($_SESSION['error'])){
                                    foreach($_SESSION['error'] as $key=>$value){
                                        if($key == 'noTopics')
                                            echo "<p style='font-size: 18px; color: red; text-align: center;'> {$value} </p>";
                                    }
                                }
                            ?>
                        </div>
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
                            <div class="errors">
                                <?php
                                    if(isset($_SESSION['error'])){
                                        foreach($_SESSION['error'] as $key=>$value){
                                            if($key == 'noOtherDescription')
                                                echo "<p style='font-size: 18px; color: red; text-align: center;'> {$value} </p>";
                                        }
                                    }
                                ?>
                            </div>
                            <textarea name="otherDescription" form="reviewForm" placeholder="If other is selected, describe other topics here..."></textarea>
                            <br>
                        </div>
                    <button type="submit" name="registerReviewer">Complete Registration</button>
                </div>
            </form>
            <?php unset($_SESSION['error']); ?>
            <p style="text-align: right;">Already have an account? <a href="login.php">Log in</a></p>
        </div>
    </main>    
</body>
</html>

