<?php 
    session_start();
    if(!(isset($_SESSION["userID"]) and $_SESSION["userType"] == "author"))
        header("location: ../login.php?error=invalidAccess");
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width", initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style.css" type="text/css">
    <title>Author - Edit Account Details</title>
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
            <li><a href="submitPaper.php">SUBMIT PAPER</a></a></li>
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
                    <li><a href="authorAccount.php">Current Account Details</a></li>
                    <li>Edit Account Details</li>
                </ul>
            </div>
            <div class="container">
                <div class="registration-page" style="margin-top: 20px">
                    <form action="#" method="post">
                        <h1>Edit Account Details</h1>
                        <p>
                            Edit the sections of data you would like to change, then click 'Confirm Changes'
                            once you are finished.
                        </p>
                        <hr><br>
                        <div class="user-info">
                            <div class="input-box">
                                <label for="email">Email</label> <input type="email" name="email" placeholder="someone@email.com" value="<?php echo $row['EmailAddress']?>" required>
                            </div>
                            <div class="input-box">
                                <label for="password">Password</label> <input type="password" name="password" placeholder="Password" value="<?php echo $row['Password']?>" required>
                                <label for="confirmPassword">Confirm Password</label> <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="input-box">
                                <label for="firstName">Full Name</label><input type="text" name="firstName" placeholder="First Name" value="<?php echo $row['FirstName']?>"  required>
                                <input type="text" name="middleInitial" placeholder="MI" value="<?php echo $row['MiddleInitial']?>">
                                <input type="text" name="lastName" placeholder="Last Name" value="<?php echo $row['LastName']?>" required>
                            </div>
                            <div class="input-box">
                                <label for="affiliation"> Affiliation </label> <input type="text" name="affiliation" placeholder="Affiliation" value="<?php echo $row['Affiliation']?>"required>
                                <label for="department">Department</label> <input type="text" name="department" placeholder="Department" value="<?php echo $row['Department']?>" required>
                            </div>
                            <div class="input-box-address">
                                <label for="address">Address</label> <input type="text" name="address" placeholder="Street Address" value="<?php echo $row['Address']?>" required>
                                <input type="text" name="city" placeholder="City" value="<?php echo $row['City']?>" required>
                                <select id="state" name="state">
                                    <option value="">-<option>
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
                                <input type="text" id="zipCode" name="zipCode" placeholder="Zip Code" value="<?php echo $row['ZipCode']?>">
                            </div>
                            <div class="input-box">
                                <label for="phone">Phone Number</label> <input type="text" id="phone" name="phone" placeholder="1234567890" value="<?php echo $row['PhoneNumber']?>">
                            </div>
                            
                            <button type="submit">Confirm Changes</button>
                        </div>
                    </form>
                    <p style="text-align: right;">Changed your mind? <a href="authorAccount.php">Click here</a> to go back to your account.</p>
                </div>
            </div>
        </main>
    </main>
</body>
</html>