<!DOCTYPE html>
<html>

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
    <title>Admin - Maintain Reviews</title>
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
                    <li>Maintain Reviews</li>
                </ul>
            </div>

            <div class="reports-container">
                <div class="page-content">
                    <h1>Table Maintenance - Reviews</h1>
                    <p>
                        This is a table of all the reviews the reviewers have submitted for each paper.
                        Here, you can manually add new reviews, edit the current data fields, or
                        delete it entirely. Under the "actions" column pen and notepad icon
                        lets you edit that row, and the trashcan icon lets you delete that row.
                    </p>
                </div>

                <?php 
                    include_once ("config.php");
                    include_once ("maintainReviewProcess.php");
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
                                <th>ReviewID</th>
                                <th>PaperID</th>
                                <th>ReviewerID</th>
                                <th>Appropriateness of Topic</th>
                                <th>Timeliness of Topic</th>
                                <th>Supportive Evidence</th>
                                <th>Technical Quality</th>
                                <th>Scope of Coverage</th>
                                <th>Citation of Previous Work</th>
                                <th>Originality</th>
                                <th>Content Comments</th>
                                <th>Organization of Paper</th>
                                <th>Clarity of Main Message</th>
                                <th>Mechanics</th>
                                <th>Written Document Comments</th>
                                <th>Suitability for Presentation</th>
                                <th>Potential Interest in Topic</th>
                                <th>Potential for Oral Presentation Comments</th>
                                <th>Overall Rating</th>
                                <th>Overall Rating Comments</th>
                                <th>ComfortLevelTopic</th>
                                <th>ComfortLevelAcceptabilitye</th>
                                <th>Complete</th>

                            </tr>

                            <?php

                            $sql = "SELECT * from review";
                            $result = $mysqli-> query($sql);

                            if($result->num_rows > 0){
                                while ($row = $result-> fetch_assoc()) : ?>
                            <tr>
                                <td style="word-spacing: 5px; text-align: center;">
                                    <a href="" data-toggle="modal" data-target="#ReviewModalEdit"><i
                                            class="far fa-edit"></i></a>
                                    <a href="maintainReviewProcess.php?delete=<?php echo $row['ReviewID']; ?>"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                                <td><?php  echo $row["ReviewID"]  ?></td>
                                <td><?php  echo $row["PaperID"]  ?></td>
                                <td><?php  echo $row["ReviewerID"]  ?></td>
                                <td><?php  echo $row["AppropriatenessOfTopic"]  ?></td>
                                <td><?php  echo $row["TimelinessOfTopic"]  ?></td>
                                <td><?php  echo $row["SupportiveEvidence"]  ?></td>
                                <td><?php  echo $row["TechnicalQuality"]  ?></td>
                                <td><?php  echo $row["ScopeOfCoverage"]  ?></td>
                                <td><?php  echo $row["CitationOfPreviousWork"]  ?></td>
                                <td><?php  echo $row["Originality"]  ?></td>
                                <td><?php  echo $row["ContentComments"]  ?></td>
                                <td><?php  echo $row["OrganizationOfPaper"]  ?></td>
                                <td><?php  echo $row["ClarityOfMainMessage"]  ?></td>

                                <td><?php  echo $row["Mechanics"]  ?></td>
                                <td><?php  echo $row["WrittenDocumentComments"]  ?></td>
                                <td><?php  echo $row["SuitabilityForPresentation"]  ?></td>
                                <td><?php  echo $row["PotentialInterestInTopic"]  ?></td>
                                <td><?php  echo $row["PotentialForOralPresentationComments"]  ?></td>
                                <td><?php  echo $row["OverallRating"]  ?></td>
                                <td><?php  echo $row["OverallRatingComments"]  ?></td>
                                <td><?php  echo $row["ComfortLevelTopic"]  ?></td>
                                <td><?php  echo $row["ComfortLevelAcceptability"]  ?></td>
                                <td><?php  echo $row["Complete"]  ?></td>
                            </tr>


                            <?php
                                endwhile;
                            }
                                $mysqli-> close(); ?>

                        </table>
                        <br>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ReviewModalAdd">
                            Add Review
                        </button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#ReviewModalEdit">
                            Edit Review
                        </button>
                    </div>

                </div>

            </div>



            <!-- Modal Add -->
            <div class="modal fade" id="ReviewModalAdd" tabindex="-1" role="dialog"
                aria-labelledby="ReviewModalAddLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ReviewModalAddLabel">Enter Review Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="maintainReviewProcess.php" method="post">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Paper ID:</label>
                                    <input type="text" name="ReviewID" class=" form-control" value=""
                                        placeholder=" Enter Paper ID:">

                                    <label>Paper ID:</label>
                                    <input type="text" name="PaperID" class=" form-control" value=""
                                        placeholder=" Enter Paper ID:">

                                    <label>Reviewer ID:</label>
                                    <input type="text" name="ReviewerID" class="form-control" value=""
                                        placeholder=" Enter Author ID:">

                                    <label>AppropriatenessOfTopic:</label>
                                    <input type="number" step="0.01" name="AppropriatenessOfTopic" class="form-control"
                                        value="" placeholder=" Rate from 1-5:">

                                    <label>TimelinessOfTopic:</label>
                                    <input type="number" step="0.01" name="TimelinessOfTopic" class="form-control"
                                        value="" placeholder=" Rate from 1-5:">

                                    <label>SupportiveEvidence:</label>
                                    <input type="number" step="0.01" name="SupportiveEvidence" class="form-control"
                                        value="" placeholder=" Rate from 1-5:">

                                    <label>TechnicalQuality:</label>
                                    <input type="number" step="0.01" name="TechnicalQuality" class="form-control"
                                        value="" placeholder=" Rate from 1-5:">

                                    <label>ScopeOfCoverage:</label>
                                    <input type="number" step="0.01" name="ScopeOfCoverage" class="form-control"
                                        value="" placeholder=" Rate from 1-5:">

                                    <label>CitationOfPreviousWork:</label>
                                    <input type="number" step="0.01" name="CitationOfPreviousWork" class="form-control"
                                        value="" placeholder=" Rate from 1-5:">

                                    <label>Originality:</label>
                                    <input type="number" step="0.01" name="Originality" class="form-control" value=""
                                        placeholder=" Rate from 1-5:">

                                    <label>ContentComments:</label>
                                    <input type="text" name="ContentComments" class="form-control" value=""
                                        placeholder=" Enter Comments:">

                                    <label>OrganizationOfPaper:</label>
                                    <input type="number" step="0.01" name="OrganizationOfPaper" class="form-control"
                                        value="" placeholder=" Rate from 1-5:">

                                    <label>ClarityOfMainMessage:</label>
                                    <input type="number" step="0.01" name="ClarityOfMainMessage" class="form-control"
                                        value="" placeholder=" Rate from 1-5:">

                                    <label>Mechanics:</label>
                                    <input type="number" step="0.01" name="Mechanics" class="form-control" value=""
                                        placeholder=" Rate from 1-5:">

                                    <label>WrittenDocumentComments:</label>
                                    <input type="text" name="WrittenDocumentComments" class="form-control" value=""
                                        placeholder=" Enter Comments:">

                                    <label>SuitabilityForPresentation:</label>
                                    <input type="number" step="0.01" name="SuitabilityForPresentation"
                                        class="form-control" value="" placeholder=" Rate from 1-5: ">

                                    <label>PotentialInterestInTopic:</label>
                                    <input type="number" step="0.01" name="PotentialInterestInTopic"
                                        class="form-control" value="" placeholder=" Rate from 1-5: ">

                                    <label>PotentialForOralPresentationComments:</label>
                                    <input type="text" name="PotentialForOralPresentationComments" class="form-control"
                                        value="" placeholder=" Enter Comments:">

                                    <label>OverallRating:</label>
                                    <input type="number" step="0.01" name="OverallRating" class=" form-control" value=""
                                        placeholder=" Rate from 1-5:">

                                    <label>OverallRatingComments:</label>
                                    <input type="text" name="OverallRatingComments" class="form-control" value=""
                                        placeholder=" Enter Comments:">

                                    <label>ComfortLevelTopic:</label>
                                    <input type="number" step="0.01" name="ComfortLevelTopic" class="form-control"
                                        value="" placeholder="Rate from 1-5: ">

                                    <label>ComfortLevelAcceptability:</label>
                                    <input type="number" step="0.01" name="ComfortLevelAcceptability"
                                        class="form-control" value="" placeholder="Rate from 1-5: ">

                                    <br>
                                    <input type="hidden" id="completeHidden" name="Complete" value='0'>
                                    <input type="checkbox" id="complete" name="Complete" value='1'>
                                    <label for="Complete" class="checkbox">Check if Complete</label>
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
        </main>
    </main>
</body>

</html>