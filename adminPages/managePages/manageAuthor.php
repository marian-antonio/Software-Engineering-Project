<!DOCTYPE html>
<html>
<?php
    session_start();
    // Create connection
    include "../../includes/dbh.inc.php";

    //Initialize Form Variables
    $row2=null;


    //Saves and Adds the new data to Table
    if(isset($_POST["save"])){
        $AuthorID = $_POST["AuthorID"];
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

        $sql = "INSERT INTO `cpms`.`author` (
                            `AuthorID`, 
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
                            `Password`) 
                VALUES (
                            '$AuthorID', 
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
                            '$Password'); ";
                                
        $result = $mysqli->query($sql) or die($mysqli->error());


        $_SESSION["message"] = "Record has been saved!";
        $_SESSION["msg_type"] = "success";

    }


    //Updates table with new data
    if(isset($_POST["update"])){

        $AuthorID = $_POST["AuthorID"];
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


            $sql = "UPDATE `cpms`.`author`
                    SET
                    `AuthorID` = '$AuthorID',
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
                    `Password` = '$Password'       
                    WHERE `AuthorID` = '$AuthorID';";
            $result = $mysqli->query($sql) or die($mysqli->error());


            $_SESSION["message"] = "Record has been Updated!";
            $_SESSION["msg_type"] = "success";

    }

    //Edit Updates Form with values from selected row
    if(isset($_POST['editID'])){

        $userID = ($_POST['editID']);


        $sql = "SELECT * 
                FROM    `cpms`.`author`
                WHERE `AuthorID` = '$userID';";

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

    //Deletes selected row
    if(isset($_POST['deleteID'])){
        $AuthorID = $_POST['deleteID'];
        $sql = ("DELETE FROM `author` 
                        WHERE AuthorID = '$AuthorID' ;") ;
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

    <title>Admin - Manage Authors</title>

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
                    <li>Manage Authors</li>
                </ul>
            </div>

            <div class="reports-container">
                <div class="page-content">
                    <h1>Table Maintenance - Authors</h1>
                    <p>
                        This is a table of all the authors currently registered to submit papers.
                        Here, you can manually add new authors, edit the current data fields, or
                        delete it entirely. Under the "actions" column click Select to select the row you would like
                        to edit, Then, click View to view the form to edit that row. To delete a row simply click the
                        Delete button.
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
                                <th>AuthorID</th>
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

                            </tr>

                            <?php

                                $sql = "SELECT * FROM author";
                                $result = $mysqli-> query($sql) or die($mysqli->error());

                                if($result->num_rows > 0){
                                while($row = $result-> fetch_assoc()): 
                            ?>

                            <tr>
                                <td style="word-spacing: 5px; text-align: center;">

                                    <form action="manageAuthor.php" method="post">
                                        <button type="submit" class="btn btn-primary" name="editID"
                                            value="<?php echo $row["AuthorID"] ?>">
                                            Select
                                        </button>

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#AuthorModalEdit">
                                            View
                                        </button>

                                        <button type="submit" class="btn btn-primary" name="deleteID"
                                            value="<?php echo $row["AuthorID"] ?>">
                                            Delete
                                        </button>
                                    </form>

                                </td>

                                <td><?php  echo $row["AuthorID"]  ?></td>
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

                            </tr>
                            <?php endwhile; }?>
                        </table>
                        <br>

                        <!-- Button trigger Add modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AuthorModalAdd">
                            Add Author
                        </button>

                        <!-- Button trigger Edit modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#AuthorModalEdit">
                            Edit Author
                        </button>


                        <!-- Modal Add with Input form to add data to Table-->
                        <div class="modal fade" id="AuthorModalAdd" tabindex="-1" role="dialog"
                            aria-labelledby="ArthorModalAddLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ArthorModalAddLabel">Enter Author
                                            Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="manageAuthor.php" method="post">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>ID:</label>
                                                <input type="text" name="AuthorID" class=" form-control" value=""
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
                                                    placeholder=" Format: 123-456-7890" required>

                                                <label>EmailAddress:</label>
                                                <input type="text" name="EmailAddress" class="form-control" value=""
                                                    placeholder=" Enter EmailAddress:" required>

                                                <label>Password:</label>
                                                <input type="text" name="Password" class="form-control" value=""
                                                    placeholder=" Enter Password:" required>

                                                <br>

                                            </div>


                                        </div>
                                        <div class=" modal-footer">
                                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- Modal Edit with input form to modify and update data from table-->
                        <div class="modal fade" id="AuthorModalEdit" tabindex="-1" role="dialog"
                            aria-labelledby="AuthorModalEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AuthorModalEditLabel">Change Author
                                            Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="manageAuthor.php" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="update_id" id="update_id" value="">
                                            <div class="form-group">
                                                <label>ID:</label>
                                                <input type="text" name="AuthorID" id="AuthorID" class=" form-control"
                                                    value="<?php echo $row2['AuthorID']?>" placeholder=" Enter ID"
                                                    required>

                                                <label>First Name:</label>
                                                <input type="text" name="FirstName" id="FirstName" class="form-control"
                                                    value="<?php echo $row2['FirstName']?>"
                                                    placeholder=" Enter First Name" required>

                                                <label>Middle Initial:</label>
                                                <input type="text" name="MiddleInitial" id="MiddleInitial"
                                                    class="form-control" value="<?php echo $row2['MiddleInitial']?>"
                                                    placeholder=" Enter Middle Initial">

                                                <label>Last Name:</label>
                                                <input type="text" name="LastName" id="LastName" class="form-control"
                                                    value="<?php echo $row2['LastName']?>"
                                                    placeholder=" Enter Last Name" required>

                                                <label>Affiliation:</label>
                                                <input type="text" name="Affiliation" class=" form-control"
                                                    value="<?php echo $row2['Affiliation']?>"
                                                    placeholder=" Enter Affiliation">

                                                <label>Department:</label>
                                                <input type="text" name="Department" class="form-control"
                                                    value="<?php echo $row2['Department']?>"
                                                    placeholder=" Enter Department">

                                                <label>Address:</label>
                                                <input type="text" name="Address" class="form-control"
                                                    value="<?php echo $row2['Address']?>" placeholder="Enter Address">

                                                <label>City:</label>
                                                <input type="text" name="City" class="form-control"
                                                    value="<?php echo $row2['City']?>" placeholder=" Enter City:">

                                                <label>State:</label>
                                                <input type="text" name="State" class="form-control"
                                                    value="<?php echo $row2['State']?>" placeholder=" Enter State:">

                                                <label>ZipCode:</label>
                                                <input type="text" name="ZipCode" class="form-control"
                                                    value="<?php echo $row2['ZipCode']?>" placeholder=" Enter ZipCode:">

                                                <label>PhoneNumber:</label>
                                                <input type="text" name="PhoneNumber" class="form-control"
                                                    value="<?php echo $row2['PhoneNumber']?>"
                                                    placeholder=" Enter PhoneNumber:" required>

                                                <label>EmailAddress:</label>
                                                <input type="text" name="EmailAddress" class="form-control"
                                                    value="<?php echo $row2['EmailAddress']?>"
                                                    placeholder=" Enter EmailAddress:" required>

                                                <label>Password:</label>
                                                <input type="text" name="Password" class="form-control"
                                                    value="<?php echo $row2['Password']?>"
                                                    placeholder=" Enter Password:" required>

                                                <br>

                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </main>
    </main>

</body>

<?php $mysqli->close(); ?>

</html>