<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) and $_SESSION["userType"] == "reviewer"))
        header("location: ../login.php?error=invalidAccess");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Reviewer - Review Form</title>
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
                    <div class=data-table>
                        <form action="#" method="post" id="reviewForm">
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
                                    <td><input type="radio" id="appropriatenessOfTopic" name="appropriatenessOfTopic" value="1"></td>
                                    <td><input type="radio" id="appropriatenessOfTopic" name="appropriatenessOfTopic" value="2"></td>
                                    <td><input type="radio" id="appropriatenessOfTopic" name="appropriatenessOfTopic" value="3"></td>
                                    <td><input type="radio" id="appropriatenessOfTopic" name="appropriatenessOfTopic" value="4"></td>
                                    <td><input type="radio" id="appropriatenessOfTopic" name="appropriatenessOfTopic" value="5"></td>
                                </tr>
                                <tr>
                                    <td>Timeliness of Topic</td>
                                    <td><input type="radio" id="timelinessOfTopic" name="timelinessOfTopic" value="1"></td>
                                    <td><input type="radio" id="timelinessOfTopic" name="timelinessOfTopic" value="2"></td>
                                    <td><input type="radio" id="timelinessOfTopic" name="timelinessOfTopic" value="3"></td>
                                    <td><input type="radio" id="timelinessOfTopic" name="timelinessOfTopic" value="4"></td>
                                    <td><input type="radio" id="timelinessOfTopic" name="timelinessOfTopic" value="5"></td>
                                </tr>
                                <tr>
                                    <td>Supportive Evidence</td>
                                    <td><input type="radio" id="supportiveEvidence" name="supportiveEvidence" value="1"></td>
                                    <td><input type="radio" id="supportiveEvidence" name="supportiveEvidence" value="2"></td>
                                    <td><input type="radio" id="supportiveEvidence" name="supportiveEvidence" value="3"></td>
                                    <td><input type="radio" id="supportiveEvidence" name="supportiveEvidence" value="4"></td>
                                    <td><input type="radio" id="supportiveEvidence" name="supportiveEvidence" value="5"></td>
                                </tr>
                                <tr>
                                    <td>Technical Quality</td>
                                    <td><input type="radio" id="technicalQuality" name="technicalQuality" value="1"></td>
                                    <td><input type="radio" id="technicalQuality" name="technicalQuality" value="2"></td>
                                    <td><input type="radio" id="technicalQuality" name="technicalQuality" value="3"></td>
                                    <td><input type="radio" id="technicalQuality" name="technicalQuality" value="4"></td>
                                    <td><input type="radio" id="technicalQuality" name="technicalQuality" value="5"></td>
                                </tr>
                                <tr>
                                    <td>Scope of Coverage</td>
                                    <td><input type="radio" id="scopeOfCoverage" name="scopeOfCoverage" value="1"></td>
                                    <td><input type="radio" id="scopeOfCoverage" name="scopeOfCoverage" value="2"></td>
                                    <td><input type="radio" id="scopeOfCoverage" name="scopeOfCoverage" value="3"></td>
                                    <td><input type="radio" id="scopeOfCoverage" name="scopeOfCoverage" value="4"></td>
                                    <td><input type="radio" id="scopeOfCoverage" name="scopeOfCoverage" value="5"></td>
                                </tr>
                                <tr>
                                    <td>Citation of Previous Work</td>
                                    <td><input type="radio" id="citationOfPreviousWork" name="citationOfPreviousWork" value="1"></td>
                                    <td><input type="radio" id="citationOfPreviousWork" name="citationOfPreviousWork" value="2"></td>
                                    <td><input type="radio" id="citationOfPreviousWork" name="citationOfPreviousWork" value="3"></td>
                                    <td><input type="radio" id="citationOfPreviousWork" name="citationOfPreviousWork" value="4"></td>
                                    <td><input type="radio" id="citationOfPreviousWork" name="citationOfPreviousWork" value="5"></td>
                                </tr>
                                <tr>
                                    <td>Originality</td>
                                    <td><input type="radio" id="originality" name="originality" value="1"></td>
                                    <td><input type="radio" id="originality" name="originality" value="2"></td>
                                    <td><input type="radio" id="originality" name="originality" value="3"></td>
                                    <td><input type="radio" id="originality" name="originality" value="4"></td>
                                    <td><input type="radio" id="originality" name="originality" value="5"></td>
                                </tr>
                            </table>
                            <span class="comments-title">Additional Comments Regarding Content</span>
                            <textarea name="contentComments" form="reviewForm" placeholder="Enter Comments here"></textarea>

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
                                    <td><input type="radio" id="organizationOfPaper" name="organizationOfPaper" value="1"></td>
                                    <td><input type="radio" id="organizationOfPaper" name="organizationOfPaper" value="2"></td>
                                    <td><input type="radio" id="organizationOfPaper" name="organizationOfPaper" value="3"></td>
                                    <td><input type="radio" id="organizationOfPaper" name="organizationOfPaper" value="4"></td>
                                    <td><input type="radio" id="organizationOfPaper" name="organizationOfPaper" value="5"></td>
                                </tr>
                                <tr>
                                    <td>Clarity of Main Message</td>
                                    <td><input type="radio" id="clarityOfMessage" name="clarityOfMessage" value="1"></td>
                                    <td><input type="radio" id="clarityOfMessage" name="clarityOfMessage" value="2"></td>
                                    <td><input type="radio" id="clarityOfMessage" name="clarityOfMessage" value="3"></td>
                                    <td><input type="radio" id="clarityOfMessage" name="clarityOfMessage" value="4"></td>
                                    <td><input type="radio" id="clarityOfMessage" name="clarityOfMessage" value="5"></td>
                                </tr>
                                <tr>
                                    <td>Mechanics (grammar, etc.)</td>
                                    <td><input type="radio" id="mechanics" name="mechanics" value="1"></td>
                                    <td><input type="radio" id="mechanics" name="mechanics" value="2"></td>
                                    <td><input type="radio" id="mechanics" name="mechanics" value="3"></td>
                                    <td><input type="radio" id="mechanics" name="mechanics" value="4"></td>
                                    <td><input type="radio" id="mechanics" name="mechanics" value="5"></td>
                                </tr>
                            </table>
                            <span class="comments-title">Additional Comments Regarding Written Document</span>
                            <textarea name="writtenDocumentComments" form="reviewForm" placeholder="Enter Comments here"></textarea>
                            

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
                                    <td><input type="radio" id="suitabilityForPresentation" name="suitabilityForPresentation" value="1"></td>
                                    <td><input type="radio" id="suitabilityForPresentation" name="suitabilityForPresentation" value="2"></td>
                                    <td><input type="radio" id="suitabilityForPresentation" name="suitabilityForPresentation" value="3"></td>
                                    <td><input type="radio" id="suitabilityForPresentation" name="suitabilityForPresentation" value="4"></td>
                                    <td><input type="radio" id="suitabilityForPresentation" name="suitabilityForPresentation" value="5"></td>
                                </tr>
                                <tr>
                                    <td>Potential Interest in Topic</td>
                                    <td><input type="radio" id="potentialInterestInTopic" name="potentialInterestInTopic" value="1"></td>
                                    <td><input type="radio" id="potentialInterestInTopic" name="potentialInterestInTopic" value="2"></td>
                                    <td><input type="radio" id="potentialInterestInTopic" name="potentialInterestInTopic" value="3"></td>
                                    <td><input type="radio" id="potentialInterestInTopic" name="potentialInterestInTopic" value="4"></td>
                                    <td><input type="radio" id="potentialInterestInTopic" name="potentialInterestInTopic" value="5"></td>
                                </tr>
                            </table>
                            <span class="comments-title">Additional Comments Regarding Potential for Oral Presentation</span>
                            <textarea name="potentialForOralPresentationComments" form="reviewForm" placeholder="Enter Comments here"></textarea>
                            

                            <h2><br>Overall Rating</h2>
                            <table>
                                <tr>
                                    <th>Definitely Should Not Accept Paper</th>
                                    <th>Probably Should Not Accept Paper</th>
                                    <th>Uncertain About Acceptance of Paper</th>
                                    <th>Probably Should Accept Paper</th>
                                    <th>Definitely Should Accept Paper</th>
                                </tr>
                                <tr>
                                    <td style="padding: 10px;"><input type="radio" id="overallRating" name="overallRating" value="1"></td>
                                    <td><input type="radio" id="overallRating" name="overallRating" value="2"></td>
                                    <td><input type="radio" id="overallRating" name="overallRating" value="3"></td>
                                    <td><input type="radio" id="overallRating" name="overallRating" value="4"></td>
                                    <td><input type="radio" id="overallRating" name="overallRating" value="5"></td>
                                </tr>
                            </table>
                            <span class="comments-title">Overall Rating Comments</span>
                            <textarea name="potentialForOralPresentationComments" form="reviewForm" placeholder="Enter Comments here"></textarea>
                            <br>
                            
                            <div class="submit-button">
                                <button type="submit">Submit Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </main>
</body>
</html>