<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "reviewer")))
        echo "<script>alert('Unauthorized Access.'); window.location = '../login.php';</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Reviewer - Edit Account Details</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?php 
        include "../includes/dbh.inc.php";
        include "../includes/functions.inc.php";
        $userID = $_SESSION["userID"];
        $location = "../reviewerPages/editReviewerAccount.php";
        $row = userExists($conn, $userID, $location, "reviewer");
    ?>
</head>
<body>
    <header>
        <a href="reviewerHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="reviewerHome.php">HOME</a></li>
            <li><a href="toReview.php">REVIEW A PAPER</a></li>
            <li><a href="reviewerAccount.php" style="background-color: white; color: black;">
                YOUR ACCOUNT</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <div class="second-nav">
            <ul class="breadcrumb">
                <li><a href="reviewerHome.php">Home</a></li>
                <li><a href="reviewerAccount.php">Current Account Details</a></li>
                <li>Edit Account Details</li>
            </ul>
        </div>

        <div class="container">
            <div class="registration-page" style="margin-top: 20px">
                <form action="../includes/editAccount.inc.php" method="post" id="reviewForm">
                    <h1>Edit Account Details</h1>
                    <p>
                        Edit the sections of data you would like to change, then click 'Confirm Changes'
                        once you are finished.
                    </p>
                    <hr><br>
                    <div class="user-info">
                        <div class="input-box">
                            <label for="email">Email</label> 
                            <input type="email" name="emailAddress" placeholder="someone@email.com" 
                                value="<?php echo $row['EmailAddress']?>" required pattern=".+\.[a-zA-Z]+"
                                title="Please enter a valid email address.">
                        </div>
                        
                        <div class="input-box">
                            <label for="password">Password</label> 
                            <input type="password" name="password" placeholder="Password" 
                                value="<?php echo $row['Password']?>" required pattern="[^\s]{1,5}" 
                                title="Password should be between 1-5 characters and have no spaces." style="margin-bottom:0;">
                                <p class="input-info">Password must be between 1-5 characters and contain no spaces.</p>
                            <label for="confirmPassword">Confirm Password</label> 
                            <input type="password" name="confirmPassword" placeholder="Confirm Password" required pattern="[^\s]{1,5}" 
                        title="Password should be between 1-5 characters and have no spaces.">
                        </div>

                        <div class="input-box">
                            <label for="firstName">Full Name</label>
                            <input type="text" name="firstName" placeholder="First Name" value="<?php echo $row['FirstName']?>"  required>
                            <input type="text" name="middleInitial" placeholder="MI" maxlength = "1" value="<?php echo $row['MiddleInitial']?>">
                            <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $row['LastName']?>" required>
                        </div>

                        <div class="input-box">
                            <label for="affiliation"> Affiliation </label> 
                            <input type="text" name="affiliation" placeholder="Affiliation" value="<?php echo $row['Affiliation']?>"required>

                            <label for="department">Department</label> 
                            <input type="text" name="department" placeholder="Department" value="<?php echo $row['Department']?>" required>
                        </div>

                        <div class="input-box-address">
                            <label for="address">Address</label> 
                            <input type="text" name="address" placeholder="Street Address" value="<?php echo $row['Address']?>" required 
                                pattern="[a-zA-Z0-9 - . ]+" title="Only alphanumeric characters, '.', and '-' are allowed.">
                            <input type="text" name="city" placeholder="City" value="<?php echo $row['City']?>" required
                                pattern="[a-zA-Z0-9 - ]+" title="Only alphanumeric characters and '-' are allowed.">
                            <select id="state" name="state" required>
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
                            <script type="text/javascript">
                                document.getElementById('state').value = "<?php echo $row['State'];?>";
                            </script>
                            <input type="text" id="zipCode" name="zipCode" placeholder="Zip Code" required value="<?php echo $row['ZipCode']?>"
                                pattern="[0-9]{5}" title="Zip Code must be 5 digits and only contain numbers.">
                        </div>

                        <div class="input-box">
                            <label for="phone">Phone Number</label> 
                            <input type="text" id="phone" name="phoneNumber" placeholder="1234567890" required value="<?php echo $row['PhoneNumber']?>"
                                pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Phone number must follow the format: 123-456-7890">
                        </div>
                            
                        <br><br><hr><br>
                        <h1>Topics</h1><br>
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
                                        <input type="checkbox" id="analysisOfAlgorithms" name="analysisOfAlgorithms" value='1'
                                            <?php echo isChecked($row['AnalysisOfAlgorithms']) ?>>
                                    </td>
                                    <td><label for="analysisOfAlgorithms" class ="checkbox">Analysis of Algorithms</label></td>

                                    <td>
                                        <input type="hidden" id="firstYearComputingHidden" name="firstYearComputing" value='0'>
                                        <input type="checkbox" id="firstYearComputing" name="firstYearComputing" value='1'
                                            <?php echo isChecked($row['FirstYearComputing']) ?>>
                                    </td>
                                    <td><label for="firstYearComputing">First Year Computing</label></td>

                                    <td>
                                        <input type="hidden" id="objectOrientedIssuesHidden" name="objectOrientedIssues" value='0'>
                                        <input type="checkbox" id="objectOrientedIssues" name="objectOrientedIssues" value='1'
                                            <?php echo isChecked($row['ObjectOrientedIssues']) ?>>
                                    </td>
                                    <td><label for="objectOrientedIssues">Object Oriented Issues</label></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" id="applicationsHidden" name="applications" value='0'>
                                        <input type="checkbox" id="applications" name="applications" value='1'
                                            <?php echo isChecked($row['Applications']) ?>>
                                    </td>
                                    <td><label for="applications">Applications</label> </td>

                                    <td>
                                        <input type="hidden" id="genderIssuesHidden" name="genderIssues" value='0'>
                                        <input type="checkbox" id="genderIssues" name="genderIssues" value='1'
                                            <?php echo isChecked($row['GenderIssues']) ?>>
                                    </td>
                                    <td><label for="genderIssues">Gender Issues</label></td>

                                    <td>
                                        <input type="hidden" id="operatingSystemsHidden" name="operatingSystems" value='0'>
                                        <input type="checkbox" id="operatingSystems" name="operatingSystems" value='1'
                                            <?php echo isChecked($row['OperatingSystems']) ?>>
                                    </td>
                                    <td><label for="operatingSystems">Operating Systems</label></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" id="architectureHidden" name="architecture" value='0'>
                                        <input type="checkbox" id="architecture" name="architecture" value='1'
                                            <?php echo isChecked($row['Architecture']) ?>>
                                    </td>
                                    <td><label for="architecture">Architecture</label></td>

                                    <td>
                                        <input type="hidden" id="grantWritingHidden" name="grantWriting" value='0'>
                                        <input type="checkbox" id="grantWriting" name="grantWriting" value='1'
                                            <?php echo isChecked($row['GrantWriting']) ?>>
                                    </td>
                                    <td><label for="grantWriting">Grant Writing</label></td>

                                    <td>
                                        <input type="hidden" id="parallelProcessingHidden" name="parallelProcessing" value='0'>
                                        <input type="checkbox" id="parallelProcessing" name="parallelProcessing" value='1'
                                            <?php echo isChecked($row['ParallelProcessing']) ?>>
                                    </td>
                                    <td><label for="parallelProcessing">Parallel Processing</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="hidden" id="artificialIntelligenceHidden" name="artificialIntelligence" value='0'>
                                        <input type="checkbox" id="artificialIntelligence" name="artificialIntelligence" value='1'
                                            <?php echo isChecked($row['ArtificialIntelligence']) ?>>
                                    </td>
                                    <td><label for="ai">Artificial Intelligence</label></td>

                                    <td>
                                        <input type="hidden" id="graphicsImageProcessingHidden" name="graphicsImageProcessing" value='0'>
                                        <input type="checkbox" id="graphicsImageProcessing" name="graphicsImageProcessing" value='1'
                                            <?php echo isChecked($row['GraphicsImageProcessing']) ?>>
                                    </td>
                                    <td><label for="graphicsImageProcessing">Graphics Image Processing</label></td>

                                    <td>
                                        <input type="hidden" id="pedagogyHidden" name="pedagogy" value='0'>
                                        <input type="checkbox" id="pedagogy" name="pedagogy" value='1'
                                            <?php echo isChecked($row['Pedagogy']) ?>>
                                    </td>
                                    <td><label for="pedagogy">Pedagogy</label> </td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" id="computerEngineeringHidden" name="computerEngineering" value='0'>
                                        <input type="checkbox" id="computerEngineering" name="computerEngineering" value='1'
                                            <?php echo isChecked($row['ComputerEngineering']) ?>>
                                    </td>
                                    <td><label for="cpe">Computer Engineering</label></td>

                                    <td>
                                        <input type="hidden" id="humanComputerInteractionHidden" name="humanComputerInteraction" value='0'>
                                        <input type="checkbox" id="humanComputerInteraction" name="humanComputerInteraction" value='1'
                                            <?php echo isChecked($row['HumanComputerInteraction']) ?>>
                                    </td>
                                    <td><label for="humanComputerInteraction">Human Computer Interaction</label></td>

                                    <td>
                                        <input type="hidden" id="programmingLanguagesHidden" name="programmingLanguages" value='0'>
                                        <input type="checkbox" id="programmingLanguages" name="programmingLanguages" value='1'
                                            <?php echo isChecked($row['ProgrammingLanguages']) ?>>
                                    </td>
                                    <td><label for="programmingLanguages">Programming Languages</label></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" id="curriculumHidden" name="curriculum" value='0'>
                                        <input type="checkbox" id="curriculum" name="curriculum" value='1'
                                            <?php echo isChecked($row['Curriculum']) ?>>
                                    </td>
                                    <td><label for="curriculum">Curriculum</label></td>

                                    <td>
                                        <input type="hidden" id="laboratoryEnvironmentsHidden" name="laboratoryEnvironments" value='0'>
                                        <input type="checkbox" id="laboratoryEnvironments" name="laboratoryEnvironments" value='1'
                                            <?php echo isChecked($row['LaboratoryEnvironments']) ?>>
                                    </td>
                                    <td><label for="laboratoryEnvironments">Laboratory Environments</label></td>

                                    <td>
                                        <input type="hidden" id="researchHidden" name="research" value='0'>
                                        <input type="checkbox" id="research" name="research" value='1'
                                            <?php echo isChecked($row['Research']) ?>>
                                    </td>
                                    <td><label for="research">Research</label></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" id="dataStructuresHidden" name="dataStructures" value='0'>
                                        <input type="checkbox" id="dataStructures" name="dataStructures" value='1'
                                            <?php echo isChecked($row['DataStructures']) ?>>
                                    </td>
                                    <td><label for="dataStructures">Data Structures</label></td>

                                    <td>
                                        <input type="hidden" id="literacyHidden" name="literacy" value='0'>
                                        <input type="checkbox" id="literacy" name="literacy" value='1'
                                            <?php echo isChecked($row['Literacy']) ?>>
                                    </td>
                                    <td><label for="literacy">Literacy</label></td>

                                    <td>
                                        <input type="hidden" id="securityHidden" name="security" value='0'>
                                        <input type="checkbox" id="security" name="security" value='1' 
                                            <?php echo isChecked($row['Security']) ?>>
                                    </td>
                                    <td><label for="security">Security</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="hidden" id="databasesHidden" name="databases" value='0'>
                                        <input type="checkbox" id="databases" name="databases" value='1'
                                            <?php echo isChecked($row['DatabasesColumn']) ?>>
                                    </td>
                                    <td><label for="databases">Databases</label></td>

                                    <td>
                                        <input type="hidden" id="mathInComputingHidden" name="mathInComputing" value='0'>
                                        <input type="checkbox" id="mathInComputing" name="mathInComputing" value='1'
                                            <?php echo isChecked($row['MathematicsInComputing']) ?>>
                                    </td>
                                    <td><label for="mathInComputing">Mathematics in Computing</label></td>

                                    <td>
                                        <input type="hidden" id="softwareEngineeringHidden" name="softwareEngineering" value='0'>
                                        <input type="checkbox" id="softwareEngineering" name="softwareEngineering" value='1'
                                            <?php echo isChecked($row['SoftwareEngineering']) ?>>
                                    </td>
                                    <td><label for="softwareEngineering">Software Engineering</label></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" id="distanceLearningHidden" name="distanceLearning" value='0'>
                                        <input type="checkbox" id="distanceLearning" name="distanceLearning" value='1'
                                            <?php echo isChecked($row['DistancedLearning']) ?>>
                                    </td>
                                    <td><label for="distanceLearning">Distance Learning</label></td>

                                    <td>
                                        <input type="hidden" id="multimediaHidden" name="multimedia" value='0'>
                                        <input type="checkbox" id="multimedia" name="multimedia" value='1'
                                            <?php echo isChecked($row['Multimedia']) ?>>
                                    </td>
                                    <td><label for="multimedia">Multimedia</label></td>

                                    <td>
                                        <input type="hidden" id="systemsAnalysisDesignHidden" name="systemsAnalysisDesign" value='0'>
                                        <input type="checkbox" id="systemsAnalysisDesign" name="systemsAnalysisDesign" value='1'
                                            <?php echo isChecked($row['SystemsAnalysisAndDesign']) ?>>
                                    </td>
                                    <td><label for="systemsAnalysisDesign">Systems Analysis and Design</label></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" id="distributedSystemsHidden" name="distributedSystems" value='0'>
                                        <input type="checkbox" id="distributedSystems" name="distributedSystems" value='1'
                                            <?php echo isChecked($row['DistributedSystems']) ?>>
                                    </td>
                                    <td><label for="distributedSystems">Distributed Systems</label></td>

                                    <td>
                                        <input type="hidden" id="networkDataCommunicationsHidden" name="networkDataCommunications" value='0'>
                                        <input type="checkbox" id="networkDataCommunications" name="networkDataCommunications" value='1'
                                            <?php echo isChecked($row['NetworkingDataCommunications']) ?>>
                                    </td>
                                    <td><label for="networkDataCommunications">Networking/Data Communications</label></td>

                                    <td>
                                        <input type="hidden" id="technologyClassroomHidden" name="technologyClassroom" value='0'>
                                        <input type="checkbox" id="technologyClassroom" name="technologyClassroom" value='1'
                                            <?php echo isChecked($row['UsingTechnologyInTheClassroom']) ?>>
                                    </td>
                                    <td><label for="technologyClassroom">Using Techonology in the Classroom</label></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" id="ethicalSocietalIssuesHidden" name="ethicalSocietalIssues" value='0'>
                                        <input type="checkbox" id="ethicalSocietalIssues" name="ethicalSocietalIssues" value='1'
                                            <?php echo isChecked($row['EthicalSocietalIssues']) ?>>
                                    </td>
                                    <td><label for="ethicalSocietalIssues">Ethical/Societal Issues</label></td>

                                    <td>
                                        <input type="hidden" id="nonMajorCoursesHidden" name="nonMajorCourses" value='0'>
                                        <input type="checkbox" id="nonMajorCourses" name="nonMajorCourses" value='1'
                                            <?php echo isChecked($row['NonMajorCourses']) ?>>
                                    </td>
                                    <td><label for="nonMajorCourses">Non-Major Courses</label></td>

                                    <td>
                                        <input type="hidden" id="webProgrammingHidden" name="webProgramming" value='0'>
                                        <input type="checkbox" id="webProgramming" name="webProgramming" value='1'
                                            <?php echo isChecked($row['WebAndInternetProgramming']) ?>>
                                    </td>
                                    <td><label for="webProgramming">Web and Internet Programming</label></td>
                                </tr>

                                <tr>
                                    <td>
                                        <input type="hidden" id="otherHidden" name="other" value='0'>
                                        <input type="checkbox" id="other" name="other" value='1'
                                            <?php echo isChecked($row['Other']) ?>>
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
                            <textarea name="otherDescription" form="reviewForm" 
                                placeholder="If other is selected, describe other topics here..."><?php echo $row['OtherDescription']?></textarea>
                            <br>
                        </div>
                        <button type="submit" name="editReviewerAccount">CONFIRM CHANGES</button>
                    </div>
                </form>
                <p style="text-align: right;">No changes? <a href="reviewerAccount.php">Click here</a> to go back to your account.</p>
            </div>
        </div>
    </main>    
</body>
</html>

