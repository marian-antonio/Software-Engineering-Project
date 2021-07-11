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

    <title>Admin - Maintain Authors</title>
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
                    <li>Maintain Authors</li>
                </ul>
            </div>

            <div class="reports-container">
                <div class="page-content">
                    <h1>Table Maintenance - Authors</h1>
                    <p>
                        This is a table of all the authors currently registered to submit papers.
                        Here, you can manually add new authors, edit the current data fields, or
                        delete it entirely. Under the "actions" column pen and notepad icon
                        lets you edit that row, and the trashcan icon lets you delete that row.
                    </p>
                </div>

                <?php 
                    include_once ("config.php");
                    include_once ("maintainAuthorProcess.php");
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

                                    <a href="" data-toggle="modal" data-target="#AuthorModalEdit"><i
                                            class="far fa-edit"></i>
                                    </a>
                                    <a href="maintainAuthorProcess.php?delete=<?php echo $row['AuthorID']; ?>"><i
                                            class="fas fa-trash"></i></a>
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


                            <?php endwhile; }
                            
                            $mysqli->close();
                            ?>

                        </table>

                        <br>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AuthorModalAdd">
                            Add Author
                        </button>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#AuthorModalEdit">
                            Edit Author
                        </button>




                        <!-- Modal Add -->
                        <div class="modal fade" id="AuthorModalAdd" tabindex="-1" role="dialog"
                            aria-labelledby="ArthorModalAddLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ArthorModalAddLabel">Enter Author Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="maintainAuthorProcess.php" method="post">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>ID:</label>
                                                <input type="text" name="AuthorID" class=" form-control" value=""
                                                    placeholder=" Enter ID">

                                                <label>First Name:</label>
                                                <input type="text" name="FirstName" class="form-control" value=""
                                                    placeholder=" Enter First Name">

                                                <label>Middle Initial:</label>
                                                <input type="text" name="MiddleInitial" class="form-control" value=""
                                                    placeholder=" Enter Middle Initial">

                                                <label>Last Name:</label>
                                                <input type="text" name="LastName" class="form-control" value=""
                                                    placeholder=" Enter Last Name">

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
                                                    placeholder=" Enter PhoneNumber:">

                                                <label>EmailAddress:</label>
                                                <input type="text" name="EmailAddress" class="form-control" value=""
                                                    placeholder=" Enter EmailAddress:">

                                                <label>Password:</label>
                                                <input type="text" name="Password" class="form-control" value=""
                                                    placeholder=" Enter Password:">

                                                <br>

                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>





                        <!-- Modal Edit -->
                        <div class="modal fade" id="AuthorModalEdit" tabindex="-1" role="dialog"
                            aria-labelledby="AuthorModalEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AuthorModalEditLabel">Change Author Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="maintainAuthorProcess.php" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="update_id" id="update_id"
                                                value="<?php echo $update_id; ?>">
                                            <div class="form-group">
                                                <label>ID:</label>
                                                <input type="text" name="AuthorID" id="AuthorID" class=" form-control"
                                                    value="<?php echo $AuthorID; ?>" placeholder=" Enter ID">

                                                <label>First Name:</label>
                                                <input type="text" name="FirstName" id="FirstName" class="form-control"
                                                    value="<?php echo $FirstName; ?>" placeholder=" Enter First Name">

                                                <label>Middle Initial:</label>
                                                <input type="text" name="MiddleInitial" id="MiddleInitial"
                                                    class="form-control" value="<?php echo $MiddleInitial; ?>"
                                                    placeholder=" Enter Middle Initial">

                                                <label>Last Name:</label>
                                                <input type="text" name="LastName" id="LastName" class="form-control"
                                                    value="<?php echo $LastName; ?>" placeholder=" Enter Last Name">

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
                                                    placeholder=" Enter PhoneNumber:">

                                                <label>EmailAddress:</label>
                                                <input type="text" name="EmailAddress" class="form-control" value=""
                                                    placeholder=" Enter EmailAddress:">

                                                <label>Password:</label>
                                                <input type="text" name="Password" class="form-control" value=""
                                                    placeholder=" Enter Password:">

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

    <script>
        $(document).ready(function () {
            $('.editbtn').on('click', function () {

                    $('#AuthorModalEdit').modal('show');

                    $tr = $(this).closet('tr');

                    var data = $tr.children("td").map(function) {
                        return $(this).text();
                    }).get();

                console.log(data);

                $('#update_id').val(data[0]); $('#AuthorID').val(data[1]); $('#FirstName').val(data[2]); $(
                    '#MiddleInitial').val(data[3]); $('#LastName').val(data[4]);

            });
        });
    </script>

</body>

</html>