<?php
  session_start();
// Create connection
include_once ("config.php");


    $AuthorID = 0;
    $update_id = 0;
    $FirstName = '';
    $MiddleInitial = '';
    $LastName = '';

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

    if( $result === TRUE )
    {
        echo "New record created successfully";
      } 
      else 
      {
        echo "E: " . $mysqli->error();
      }

    $_SESSION["message"] = "Record has been saved!";
    $_SESSION["msg_type"] = "success";

    header("location: maintainAuthor.php");
}

if(isset($_GET['edit'])){

    $AuthorID = $_GET['edit'];

    $sql = "SELECT *
            FROM  `cpms`.`author` 
            WHERE `AuthorID` = '17';"; 
    $result = $mysqli->query($sql) or die($mysqli->error());


    if($result->num_rows == 1){
        $row = $result->fetch_array();
        $AuthorID = $row["AuthorID"];
        $FirstName =  $row["FirstName"];
        $MiddleInitial =  $row["MiddleInitial"];
        $LastName = $row["LastName"];
        $_SESSION['message'] = "Record has been Shown!";
    } else {

        echo "No Results";
        echo "Error: " . $mysqli->error();
    }



    
    $_SESSION['msg_type'] = "success";
    header("location: maintainAuthor.php");
}

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

    if( $result === TRUE )
    {
        echo "New record Updated successfully";
      } 
      else 
      {
        echo "E: " . $mysqli->error();
      }

    $_SESSION["message"] = "Record has been Updated!";
    $_SESSION["msg_type"] = "success";

    header("location: maintainAuthor.php");
}


if(isset($_GET['delete'])){
    $AuthorID = $_GET['delete'];
    $sql = ("DELETE FROM `author` 
                    WHERE AuthorID = '$AuthorID' ;") ;
    $result = $mysqli->query($sql) or die($mysqli->error());
                            


    if( $result === TRUE )
    {
        echo "Record deleted successfully";
      } 
      else 
      {
        echo "Error: " . $mysqli->error();
      }

    $_SESSION['message'] = "Record has been Deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: maintainAuthor.php");
}

?>