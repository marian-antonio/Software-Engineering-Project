<?php 
    session_start();
    if(isset($_SESSION["userID"])){
        if ($_SESSION["userType"] == "author")
            header("location: ../authorPages/authorHome.php");
        elseif ($_SESSION["userType"] == "reviewer")
            header("location: ../reviewerPages/reviewerHome.php");
        elseif ($_SESSION["userType"] == "admin")
            header("location: ../adminPages/adminHome.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/e1b93c3ea7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Author Registration</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a href="authorRegistration.php" class="logo">
            <img src="images/logo1.png" alt="CCMC Midwest">
        </a>
        <ul class="navigation">
            <li>Already have an account? <a href="login.php">CLICK HERE TO LOG IN</a></li>
        </ul>
    </header>
    <main>
        <div class="registration-page">
            <form action="includes/register.inc.php" method="post">
                <h1>Author Registration</h1>
                <p>
                    Registering as an <b>author</b> will allow you to submit papers to the Consortium for Computing Sciences in Colleges Midwest (CCSCMW) 
                    Annual Conference next Fall. <a href="reviewerRegistration.php">Click here</a> to register as a <b>reviewer</b> instead. 
                    (NOTE: If you would like to be an author AND a reviewer, you will need to register for each role separately.) 
                    <br><br>
                    Fill in the boxes below with the appropriate information to create your account.
                    Once you have finished and verified your information is accurate,
                    click the 'Complete Registration' button at the bottom of the page
                    to create your <b>author</b> account.
                </p> 
                <hr><br>
                <!-- Shows errors -->
                <div class="errors">
                <?php
                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if(strpos($fullUrl, "error=input")==true){
                    echo "<h3 style='color: red; text-align: center;'>" . "Please fix following errors:" . "</h3> <br>";

                    foreach ($_SESSION['error'] as $key=>$value){
                        echo "<ul id=\"input-errors\"> 
                            <li style='color: red; margin: 5px 30px;'> {$value} </li>
                        </ul>";
                    }
                }
                elseif(strpos($fullUrl, "error=unknown")==true)
                    echo "<h3 style='color: red; text-align: center;'>" . "Unknown Error" . "</h3> <br>";
                ?>
                </div>
                <div class="user-info">
                    <div class="input-box">
                        <label for="emailAddress">Email</label>
                        <input type="email" name="emailAddress" placeholder="someone@email.com" required pattern=".+\.[a-zA-Z]+"
                            title="Please enter a valid email address.">
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label> 
                        <input type="password" name="password" placeholder="Password" required pattern="[^\s]{1,5}" 
                            title="Password should be between 1-5 characters and have no spaces." style="margin-bottom:0;">
                            <p class="input-info">Password must be between 1-5 characters and contain no spaces.</p>
                        <label for="confirmPassword">Confirm Password</label> 
                        <input type="password" name="confirmPassword" placeholder="Confirm Password" required pattern="[^\s]{1,5}" 
                            title="Password should be between 1-5 characters and have no spaces.">
                    </div>
                    <div class="input-box">
                        <label for="firstName">Full Name</label>
                        <input type="text" name="firstName" placeholder="First Name" required>
                        <input type="text" name="middleInitial" placeholder="MI" maxlength = "1">
                        <input type="text" name="lastName" placeholder="Last Name" required >
                    </div>
                    <div class="input-box">
                        <label for="affiliation"> Affiliation </label> 
                        <input type="text" name="affiliation" placeholder="Affiliation" required>
                        <label for="department">Department</label> 
                        <input type="text" name="department" placeholder="Department" required>
                    </div>
                    <div class="input-box-address">
                        <label for="address">Address</label> 
                        <input type="text" name="address" placeholder="Street Address" required pattern="[a-zA-Z0-9 - . ]+"
                            title="Only alphanumeric characters, '.', and '-' are allowed.">
                        <input type="text" name="city" placeholder="City" required pattern="[a-zA-Z0-9 - ]+"
                            title="Only alphanumeric characters and '-' are allowed.">
                        <select id="state" name="state" required>
                            <option value="">-</option>
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
                        <input type="text" id="zipCode" name="zipCode" placeholder="Zip Code" required pattern="[0-9]{5}" 
                            title="Zip Code must be 5 digits and only contain numbers.">
                    </div>
                    <div class="input-box">
                        <label for="phone">Phone Number</label> 
                        <input type="phone" id="phone" name="phoneNumber" placeholder="Format: 123-456-7890" required
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Phone number must follow the format: 123-456-7890">
                    </div>
                    <?php
                        if(isset($_SESSION['error']))
                            echo "<h3 style='color: red; text-align: center;'>" . "Please fix the errors above before proceeding." . "</h3> <br>";
                    ?>
                    <button type="submit" name="registerAuthor">Complete Registration</button>
                </div>
            </form>
            <p style="text-align: right;">Already have an account? <a href="login.php">Log in</a></p>
        </div>
    </main>
</body>
</html>