<?php 
    session_start();
    if(!(isset($_SESSION["userID"])  && ($_SESSION["userType"] == "author")))
        echo "<script>alert('Unauthorized Access.'); window.location = '../login.php?error=invalidAccess';</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Author - Account Details</title>
    <?php 
        include "../includes/dbh.inc.php";
        include "../includes/functions.inc.php";
        $userID = $_SESSION["userID"];
        $location = "../authorPages/authorAccount.php";
        $row = userExists($conn, $userID, $location, "author");
    ?>
</head>
<body>
    <header>
        <a href="authorHome.php" class="logo">
            <img src="../images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li><a href="authorHome.php">HOME</a></li>
            <?php if(!isset($_SESSION["paperSubmitted"]) && !isset($_SESSION["submissionOff"])){
                echo "<li><a href=\"submitPaper.php\">SUBMIT PAPER</a></a></li>";
            }?>
            <li><a href="authorAccount.php" style="background-color: white; color: black;">
                YOUR ACCOUNT</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <div class="second-nav">
            <ul class="breadcrumb">
                <li><a href="authorHome.php">Home</a></li>
                <li>Current Account Details</li>
            </ul>
        </div>
        
        <div class="container">
            <h1>Your current account details:</h1>
            <div class="account-details">
                <table>
                    <tr><th></th>   <th></th></tr>
                    <tr>
                        <td>Email</td>   
                        <td><?php echo $row['EmailAddress']?></td>
                    </tr>
                    <tr>
                        <td>Full Name</td>  
                        <td><?php 
                                echo $row['FirstName'] . " " . $row['MiddleInitial'] . " " . $row['LastName']
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Affiliation</td>
                        <td><?php echo $row['Affiliation']?></td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td><?php echo $row['Department']?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <?php 
                                echo $row['Address'] . ", " . 
                                    $row['City'] . ", " . 
                                    $row['State'] . " " . 
                                    $row['ZipCode']
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>  
                        <td><?php echo $row['PhoneNumber']?></td>
                    </tr>
                        
                    
                </table>
                <div class="actions">
                    <a href="editAuthorAccount.php"><button>Edit Account Details</button></a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>