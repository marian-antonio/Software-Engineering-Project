<?php 
    session_start();
    if(!(isset($_SESSION["userID"])  && ($_SESSION["userType"] == "author")))
        echo "<script>alert('Unauthorized Access.'); window.location = '../login.php?error=invalidAccess';</script>";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Author - Edit Account Details</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <?php 
        include "../includes/dbh.inc.php";
        include "../includes/functions.inc.php";
        $userID = $_SESSION["userID"];
        $location = "../authorPages/editAuthorAccount.php";
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
            <?php if(!isset($_SESSION["paperSubmitted"])){
                echo "<li><a href=\"submitPaper.php\">SUBMIT PAPER</a></a></li>";
            }?>
            <li><a href="authorAccount.php" style="background-color: white; color: black;">
                YOUR ACCOUNT</a></li>
            <li><a href="../includes/logout.inc.php">LOGOUT</a></li>
        </ul>
    </header>
    <main>
        <main>
            <div class="second-nav">
                <ul class="breadcrumb">
                    <li><a href="authorHome.php">Home</a></li>
                    <?php if((!isset($_SESSION["paperSubmitted"])) && !isset($_SESSION["submissionOff"])){
                        echo "<li><a href=\"submitPaper.php\">SUBMIT PAPER</a></a></li>";
                    }?>
                    <li><a href="authorAccount.php">Current Account Details</a></li>
                    <li>Edit Account Details</li>
                </ul>
            </div>
            <div class="container">
                <div class="registration-page" style="margin-top: 20px">
                    <form action="../includes/editAccount.inc.php" method="post">
                        <h1>Edit Account Details</h1>
                        <p>
                            Edit the sections of data you would like to change, confirm your password, 
                            then click 'Confirm Changes' once you are finished.
                        </p>
                        <hr><br>
                        <div class="errors">
                            <?php
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
                            <button type="submit" name="editAuthorAccount">Confirm Changes</button>
                        </div>
                    </form>
                    <?php unset($_SESSION['error']); ?>
                    <p style="text-align: right;">Changed your mind? <a href="authorAccount.php">Click here</a> to go back to your account.</p>
                </div>
            </div>
        </main>
    </main>
</body>
</html>