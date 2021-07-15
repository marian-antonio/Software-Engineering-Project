<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) && ($_SESSION["userType"] == "reviewer") && isset($_GET["id"])))
        echo "<script>alert('Unauthorized Access.'); window.location = '../login.php';</script>";
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Reviewer - Review Form</title>
    <?php $reviewID = $_GET["id"]; ?>
</head>


<body>
    <header>
        <a href="reviewerHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="reviewerHome.php">
                HOME</a></li>
            <li><a href="toReview.php" style="background-color: white; color: black;">REVIEW A PAPER</a></li>
            <li><a href="reviewerAccount.php">YOUR ACCOUNT</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>


    <main>
        <div class="second-nav">
            <ul class="breadcrumb">
                <li><a href="reviewerHome.php">Home</a></li>
                <li><a href="toReview.php">Reviews Dashboard</a></li>
                <li>Review Form</li>
            </ul>
        </div>

        <div class="container">
            <div class="page-content">
                <h1>Review Form</h1>
                <p>
                    Rate each category from Poor to Excellent and type in comments in the text boxes below each section.
                    Once you are finished, click 'Submit Review' at the bottom of the page.
                </p>
            </div>

            <div class="actions">
                <div class="data-table">
                    <form action="../includes/submitReview.inc.php" method="post" id="reviewForm"> 
                    
                        <h2>Content</h2>
                        <table>
                            <tr>
                                <th>Category</th>
                                <th>Poor</th>
                                <th>Fair</th>
                                <th>Average</th>
                                <th>Good</th>
                                <th>Excellent</th>
                            </tr>

                            <tr>
                                <td>Appropriateness of Topic</td>
                                <td><label for="appropriatenessOfTopic1">
                                    <input type="radio" id="appropriatenessOfTopic1" name="appropriatenessOfTopic" value="1" required>
                                </label></td>
                                <td><label for="appropriatenessOfTopic2">
                                    <input type="radio" id="appropriatenessOfTopic2" name="appropriatenessOfTopic" value="2">
                                </td>
                                <td><label for="appropriatenessOfTopic3">
                                    <input type="radio" id="appropriatenessOfTopic3" name="appropriatenessOfTopic" value="3">
                                </label></td>
                                <td><label for="appropriatenessOfTopic4">
                                    <input type="radio" id="appropriatenessOfTopic4" name="appropriatenessOfTopic" value="4">
                                </label></td>
                                <td><label for="appropriatenessOfTopic5">
                                    <input type="radio" id="appropriatenessOfTopic5" name="appropriatenessOfTopic" value="5">
                                </label></td>
                            </tr>

                            <tr>
                                <td>Timeliness of Topic</td>
                                <td><label for="timelinessOfTopic1">
                                    <input type="radio" id="timelinessOfTopic1" name="timelinessOfTopic" value="1" required>
                                </label></td>
                                <td><label for="timelinessOfTopic2">
                                    <input type="radio" id="timelinessOfTopic2" name="timelinessOfTopic" value="2">
                                </label></td>
                                <td><label for="timelinessOfTopic3">
                                    <input type="radio" id="timelinessOfTopic3" name="timelinessOfTopic" value="3">
                                </label></td>
                                <td><label for="timelinessOfTopic4">
                                    <input type="radio" id="timelinessOfTopic4" name="timelinessOfTopic" value="4">
                                </label></td>
                                <td><label for="timelinessOfTopic5">
                                    <input type="radio" id="timelinessOfTopic5" name="timelinessOfTopic" value="5">
                                </label></td>
                            </tr>

                            <tr>
                                <td>Supportive Evidence</td>
                                <td><label for="supportiveEvidence1">
                                    <input type="radio" id="supportiveEvidence1" name="supportiveEvidence" value="1" required>
                                </label></td>
                                <td><label for="supportiveEvidence2">
                                    <input type="radio" id="supportiveEvidence2" name="supportiveEvidence" value="2">
                                </label></td>
                                <td><label for="supportiveEvidence3">
                                    <input type="radio" id="supportiveEvidence3" name="supportiveEvidence" value="3">
                                </label></td>
                                <td><label for="supportiveEvidence4">
                                    <input type="radio" id="supportiveEvidence4" name="supportiveEvidence" value="4">
                                </label></td>
                                <td><label for="supportiveEvidence5">
                                    <input type="radio" id="supportiveEvidence5" name="supportiveEvidence" value="5">
                                </label></td>
                            </tr>

                            <tr>
                                <td>Technical Quality</td>
                                <td><label for="technicalQuality1">
                                    <input type="radio" id="technicalQuality1" name="technicalQuality" value="1" required>
                                </label></td>
                                <td><label for="technicalQuality2">
                                    <input type="radio" id="technicalQuality2" name="technicalQuality" value="2">
                                </label></td>
                                <td><label for="technicalQuality3">
                                    <input type="radio" id="technicalQuality3" name="technicalQuality" value="3">
                                </label></td>
                                <td><label for="technicalQuality4">
                                    <input type="radio" id="technicalQuality4" name="technicalQuality" value="4">
                                </label></td>
                                <td><label for="technicalQuality5">
                                    <input type="radio" id="technicalQuality5" name="technicalQuality" value="5">
                                </label></td>
                            </tr>

                            <tr>
                                <td>Scope of Coverage</td>
                                <td><label for="scopeOfCoverage1">
                                    <input type="radio" id="scopeOfCoverage1" name="scopeOfCoverage" value="1" required>
                                </label></td>
                                <td><label for="scopeOfCoverage2">
                                    <input type="radio" id="scopeOfCoverage2" name="scopeOfCoverage" value="2">
                                </label></td>
                                <td><label for="scopeOfCoverage3">
                                    <input type="radio" id="scopeOfCoverage3" name="scopeOfCoverage" value="3">
                                </label></td>
                                <td><label for="scopeOfCoverage4">
                                    <input type="radio" id="scopeOfCoverage4" name="scopeOfCoverage" value="4">
                                </label></td>
                                <td><label for="scopeOfCoverage5">
                                    <input type="radio" id="scopeOfCoverage5" name="scopeOfCoverage" value="5">
                                </label></td>                            
                            </tr>

                            <tr>
                                <td>Citation of Previous Work</td>
                                <td><label for="citationOfPreviousWork1">
                                    <input type="radio" id="citationOfPreviousWork1" name="citationOfPreviousWork" value="1" required>
                                </label></td>
                                <td><label for="citationOfPreviousWork2">
                                    <input type="radio" id="citationOfPreviousWork2" name="citationOfPreviousWork" value="2">
                                </label></td>
                                <td><label for="citationOfPreviousWork3">
                                    <input type="radio" id="citationOfPreviousWork3" name="citationOfPreviousWork" value="3">
                                </label></td>
                                <td><label for="citationOfPreviousWork4">
                                    <input type="radio" id="citationOfPreviousWork4" name="citationOfPreviousWork" value="4">
                                </label></td>
                                <td><label for="citationOfPreviousWork5">
                                    <input type="radio" id="citationOfPreviousWork5" name="citationOfPreviousWork" value="5">
                                </label></td>
                            </tr>
                            
                            <tr>
                                <td>Originality</td>
                                <td><label for="originality1">
                                    <input type="radio" id="originality1" name="originality" value="1" required>
                                </label></td>
                                <td><label for="originality2">
                                    <input type="radio" id="originality2" name="originality" value="2">
                                </label></td>
                                <td><label for="originality3">
                                    <input type="radio" id="originality3" name="originality" value="3">
                                </label></td>
                                <td><label for="originality4">
                                    <input type="radio" id="originality4" name="originality" value="4">
                                </label></td>
                                <td><label for="originality5">
                                    <input type="radio" id="originality5" name="originality" value="5">
                                </label></td>
                            </tr>
                        </table>
                        <span class="comments-title">
                            Additional Comments Regarding Content
                            <small style="color: grey;">Character limit: 1000.</small>
                        </span>
                        <textarea name="contentComments" form="reviewForm" placeholder="Enter Comments here" maxlength="1000"></textarea>




                        <h2><br>Written Document</h2>
                        <table>
                            <tr>
                                <th>Category</th>
                                <th>Poor</th>
                                <th>Fair</th>
                                <th>Average</th>
                                <th>Good</th>
                                <th>Excellent</th>
                            </tr>

                            <tr>
                                <td>Organization of Paper</td>
                                <td><label for="organizationOfPaper1">
                                    <input type="radio" id="organizationOfPaper1" name="organizationOfPaper" value="1" required>
                                </label></td>
                                <td><label for="organizationOfPaper2">
                                    <input type="radio" id="organizationOfPaper2" name="organizationOfPaper" value="2">
                                </label></td>
                                <td><label for="organizationOfPaper3">
                                    <input type="radio" id="organizationOfPaper3" name="organizationOfPaper" value="3">
                                </label></td>
                                <td><label for="organizationOfPaper4">
                                    <input type="radio" id="organizationOfPaper4" name="organizationOfPaper" value="4">
                                </label></td>
                                <td><label for="organizationOfPaper5">
                                    <input type="radio" id="organizationOfPaper5" name="organizationOfPaper" value="5">
                                </label></td>
                            </tr>

                            <tr>
                                <td>Clarity of Main Message</td>
                                <td><label for="clarityOfMessage1">
                                    <input type="radio" id="clarityOfMessage1" name="clarityOfMessage" value="1" required>
                                </label></td>
                                <td><label for="clarityOfMessage2">
                                    <input type="radio" id="clarityOfMessage2" name="clarityOfMessage" value="2">
                                </label></td>
                                <td><label for="clarityOfMessage3">
                                    <input type="radio" id="clarityOfMessage3" name="clarityOfMessage" value="3">
                                </label></td>
                                <td><label for="clarityOfMessage4">
                                    <input type="radio" id="clarityOfMessage4" name="clarityOfMessage" value="4">
                                </label></td>
                                <td><label for="clarityOfMessage5">
                                    <input type="radio" id="clarityOfMessage5" name="clarityOfMessage" value="5">
                                </label></td>
                            </tr>

                            <tr>
                            <td>Mechanics (grammar, etc.)</td>
                                <td><label for="mechanics1">
                                    <input type="radio" id="mechanics1" name="mechanics" value="1" required>
                                </label></td>
                                <td><label for="mechanics2">
                                    <input type="radio" id="mechanics2" name="mechanics" value="2">
                                </label></td>
                                <td><label for="mechanics3">
                                    <input type="radio" id="mechanics3" name="mechanics" value="3">
                                </label></td>
                                <td><label for="mechanics4">
                                    <input type="radio" id="mechanics4" name="mechanics" value="4">
                                </label></td>
                                <td><label for="mechanics5">
                                    <input type="radio" id="mechanics5" name="mechanics" value="5">
                                </label></td>
                            </tr>
                        </table>
                        <span class="comments-title">
                            Additional Comments Regarding Written Document
                            <small style="color: grey;">Character limit: 1000.</small>
                        </span>
                        <textarea name="writtenDocumentComments" form="reviewForm" placeholder="Enter Comments here" maxlength="1000"></textarea>



                        <h2><br>Potential for Oral Presentation</h2>
                        <table>
                            <tr>
                                <th>Category</th>
                                <th>Poor</th>
                                <th>Fair</th>
                                <th>Average</th>
                                <th>Good</th>
                                <th>Excellent</th>
                            </tr>

                            <tr>
                                <td>Suitability for Presentation</td>
                                <td><label for="suitabilityForPresentation1">
                                    <input type="radio" id="suitabilityForPresentation1" name="suitabilityForPresentation" value="1" required>
                                </label></td>
                                <td><label for="suitabilityForPresentation2">
                                    <input type="radio" id="suitabilityForPresentation2" name="suitabilityForPresentation" value="2">
                                </label></td>
                                <td><label for="suitabilityForPresentation3">
                                    <input type="radio" id="suitabilityForPresentation3" name="suitabilityForPresentation" value="3">
                                </label></td>
                                <td><label for="suitabilityForPresentation4">
                                    <input type="radio" id="suitabilityForPresentation4" name="suitabilityForPresentation" value="4">
                                </label></td>
                                <td><label for="suitabilityForPresentation5">
                                    <input type="radio" id="suitabilityForPresentation5" name="suitabilityForPresentation" value="5">
                                </label></td>
                            </tr>

                            <tr>
                                <td>Potential Interest in Topic</td>
                                <td><label for="potentialInterestInTopic1">
                                    <input type="radio" id="potentialInterestInTopic1" name="potentialInterestInTopic" value="1" required>
                                </label></td>
                                <td><label for="potentialInterestInTopic2">
                                    <input type="radio" id="potentialInterestInTopic2" name="potentialInterestInTopic" value="2">
                                </label></td>
                                <td><label for="potentialInterestInTopic3">
                                    <input type="radio" id="potentialInterestInTopic3" name="potentialInterestInTopic" value="3">
                                </label></td>
                                <td><label for="potentialInterestInTopic4">
                                    <input type="radio" id="potentialInterestInTopic4" name="potentialInterestInTopic" value="4">
                                </label></td>
                                <td><label for="potentialInterestInTopic5">
                                    <input type="radio" id="potentialInterestInTopic5" name="potentialInterestInTopic" value="5">
                                </label></td>
                            </tr>
                        </table>
                        <span class="comments-title">
                            Additional Comments Regarding Potential for Oral Presentation
                            <small style="color: grey;">Character limit: 1000.</small>
                        </span>
                        <textarea name="potentialForOralPresentationComments" form="reviewForm" placeholder="Enter Comments here" maxlength="1000"></textarea>



                        <div class="overall-rating">
                            <h2><br>Overall Rating</h2>
                            <table>
                                <tr>
                                    <th>Category</th>
                                    <th>Rating</th>
                                </tr>

                                <tr>
                                    <td>Definitely Should Not Accept Paper</td>
                                    <td><label for="overallRating1">
                                        <input type="radio" id="overallRating1" name="overallRating" value="1" required>
                                    </label></td>
                                </tr>

                                <tr>
                                    <td>Probably Should Not Accept Paper</td>
                                    <td><label for="overallRating2">
                                        <input type="radio" id="overallRating2" name="overallRating" value="2">
                                    </label></td>
                                </tr>

                                <tr>
                                    <td>Uncertain About Acceptance of Paper</td>
                                    <td><label for="overallRating3">
                                        <input type="radio" id="overallRating3" name="overallRating" value="3">
                                    </label></td>
                                </tr>

                                <tr>
                                    <td>Probably Should Accept Paper</td>
                                    <td><label for="overallRating4">
                                        <input type="radio" id="overallRating4" name="overallRating" value="4">
                                    </label></td>
                                </tr>

                                <tr>
                                    <td>Definitely Should Accept Paper</td>
                                    <td><label for="overallRating5">
                                        <input type="radio" id="overallRating5" name="overallRating" value="5">
                                    </label></td>
                                </tr>
                            </table>
                        </div>
                        <span class="comments-title">
                            Overall Rating Comments 
                            <small style="color: grey;">Character limit: 1000.</small>
                        </span>
                        <textarea name="overallRatingComments" form="reviewForm" placeholder="Enter Comments here" maxlength="1000"></textarea>
                        <br>




                        <h2><br>Comfort Level</h2>
                        <table>
                            <tr>
                                <th>Category</th>
                                <th>Poor</th>
                                <th>Fair</th>
                                <th>Average</th>
                                <th>Good</th>
                                <th>Excellent</th>
                            </tr>

                            <tr>
                                <td>How do you feel about the topics?</td>
                                <td><label for="comfortLevelTopic1">
                                    <input type="radio" id="comfortLevelTopic1" name="comfortLevelTopic" value="1" required>
                                </label></td>
                                <td><label for="comfortLevelTopic2">
                                    <input type="radio" id="comfortLevelTopic2" name="comfortLevelTopic" value="2">
                                </label></td>
                                <td><label for="comfortLevelTopic3">
                                    <input type="radio" id="comfortLevelTopic3" name="comfortLevelTopic" value="3">
                                </label></td>
                                <td><label for="comfortLevelTopic4">
                                    <input type="radio" id="comfortLevelTopic4" name="comfortLevelTopic" value="4">
                                </label></td>
                                <td><label for="comfortLevelTopic5">
                                    <input type="radio" id="comfortLevelTopic5" name="comfortLevelTopic" value="5">
                                </label></td>
                            </tr>

                            <tr>
                                <td>How do you feel about the acceptability of the paper?</td>
                                <td><label for="comfortLevelAcceptability1">
                                    <input type="radio" id="comfortLevelAcceptability1" name="comfortLevelAcceptability" value="1" required>
                                </label></td>
                                <td><label for="comfortLevelAcceptability2">
                                    <input type="radio" id="comfortLevelAcceptability2" name="comfortLevelAcceptability" value="2">
                                </label></td>
                                <td><label for="comfortLevelAcceptability3">
                                    <input type="radio" id="comfortLevelAcceptability3" name="comfortLevelAcceptability" value="3">
                                </label></td>
                                <td><label for="comfortLevelAcceptability4">
                                    <input type="radio" id="comfortLevelAcceptability4" name="comfortLevelAcceptability" value="4">
                                </label></td>
                                <td><label for="comfortLevelAcceptability5">
                                    <input type="radio" id="comfortLevelAcceptability5" name="comfortLevelAcceptability" value="5">
                                </label></td>
                            </tr>
                        </table>

                        <input type="hidden" name="reviewID" value="<?php echo $reviewID; ?>">
                        <br><br>


                        <div class="submit-button"> 
                            <button type="submit" name="submitReviewButton"> Submit Review </button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
</body>
</html>