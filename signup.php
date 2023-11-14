<?php
session_start();
include 'connection.php';

$errorMessages = array();

if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
    $mname = filter_input(INPUT_POST, "mname", FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, "Gender", FILTER_SANITIZE_SPECIAL_CHARS);
    $bday = filter_input(INPUT_POST, "bday", FILTER_SANITIZE_NUMBER_INT);
    $contNum = filter_input(INPUT_POST, "contNum", FILTER_SANITIZE_NUMBER_INT);
    $idType = filter_input(INPUT_POST, "idType", FILTER_SANITIZE_SPECIAL_CHARS);
    $idNum = filter_input(INPUT_POST, "idNum", FILTER_SANITIZE_SPECIAL_CHARS);
    $idFront = $_POST['frontimage'];
    $idBack = $_POST['backimage'];

    $checkQuery = "SELECT * FROM logcredentials WHERE email = '$email' OR username = '$username'";
    $result1 = mysqli_query($con, $checkQuery);
    if (mysqli_num_rows($result1) > 0) {
        $errorMessages[] = "Email, username, or contact number is already in use. Please choose a different one.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages[] = "Invalid email address.";
    }
    if (strlen($password) < 8 || !preg_match('/[0-9\W]/', $password)) {
        $errorMessages[] = "Password must have at least 8 characters and include at least 1 symbol or number.";
    }
    if (!preg_match('/[0-9\W]/', $password)){
        $errorMessages[] = "Password must include at least 1 symbol or number.";
    }
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $errorMessages[] = "Invalid username. Only letters, numbers, and underscores are allowed.";
    }
    $checkQuery2 = "SELECT * FROM user WHERE contNum = '$contNum'";
    $result2 = mysqli_query($con, $checkQuery2);
    if (mysqli_num_rows($result2) > 0) {
        $errorMessages[] = "Contact number is already in use. Please choose a different one.";
    }
    if (!preg_match("/^[a-zA-Z\s]+$/", $fname) || !preg_match("/^[a-zA-Z\s]+$/", $mname) || !preg_match("/^[a-zA-Z\s]+$/", $lname)){
        $errorMessages[] = "Numbers and symbols are not allowed in the name field!";
    }
    else{
        if (empty($errorMessages)) {
            $sql1 = "INSERT INTO logcredentials (email, username, password) 
                VALUES ('$email', '$username', '$password')";
            mysqli_query($con, $sql1);
        
            $logID = mysqli_insert_id($con);

            $sql2 = "INSERT INTO user (logID, fname, mname, lname, bday, gender, contNum, idType, idNum, idFront, idBack) 
                    VALUES ($logID, '$fname' , '$mname', '$lname', '$bday', '$gender', '$contNum', '$idType', '$idNum', '$idFront', '$idBack')";
            mysqli_query($con, $sql2);

            echo "<div class='success-message'>You have successfully registered!</div>";
            header('Location: signin.php');
            exit();
        } 
    }

    mysqli_close($con);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <!-- Favicon -->
    <link href="img/calendar2-event-fill.svg" rel="icon" type="image/svg+xml">
    
    <title>SignUp | MiCasa Events</title>
    <link rel="stylesheet" type="text/css" href="signStyle.css">

</head>
<body>
    <div class="signup-form">
        <div class="tab_box">
            <div class="tab_btn active">STEP 1</div>
            <div class="tab_btn">STEP 2</div>
            <div class="tab_btn">STEP 3</div>
            <div class="line"></div>
        </div>

        <div class="content_box">
            <form action="signup.php" method="post" class="login_form" >
                <div class="content active">
                    <h2 class="header2">Login Credentials</h2><br>
                    <div class="login_form1" id="step-1">
                        <div class="inputbox">
                            <input type="email" name="email" id="emailInput" required><br>
                            <label for="">Email</label>
                        </div>
                        <div class="inputbox">
                            <input type="password" name="password" id="password" required><br>
                            <label for="">Password</label>
                        </div>
                        <div class="inputbox" >
                            <input type="text" name="username" id="username" required>
                            <label for="">Username</label>
                        </div>
                        <div class="btn_button">
                            <button type="button" class="next_btn" onclick="nextStep(1)">Next</button>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <h2 class="header2">Personal Information</h2><br>
                    <div class="login_form2" id="step-2">
                        <!-- Row 1: First Name, Middle Name, Last Name -->
                        <div class="form-row1">
                            <div class="inputbox1">
                                <input type="text" name="fname" id="fname" required>
                                <label for="">First Name</label>
                            </div>
                            <div class="inputbox1">
                                <input type="text" name="mname" id="mname" required>
                                <label for="">Middle Name (N/A)</label>
                            </div>
                            <div class="inputbox1">
                                <input type="text" name="lname" id="lname" required>
                                <label for="">Last Name</label>
                            </div>
                        </div>

                        <!-- Row 2: Gender and Birthdate -->
                        <div class="form-row2">
                            <label for="gender">Gender:</label>
                            <select id="gender" name="Gender" class="s3">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Prefer not to say</option>
                            </select>
                            <label for="bday">Birthdate:</label>
                            <input type="date" name="bday" class="s3" id="bday" required>
                        </div>

                        <!-- Row 3: Contact Number -->
                        <div class="form-row3">
                            <div class="inputbox1">
                                <input type="text" name="contNum" maxlength="11" id="contNum" required>
                                <!-- oninput="checkInputLenth(this)" min="11" max="11" for contNum-->
                                <label for="">Contact Number</label>
                            </div>
                        </div>
                        <div class="btn_button">
                            <button type="button" class="prev_btn" onclick="prevStep(2)">Back</button>
                            <button type="button" class="next_btn" onclick="nextStep(2)">Next</button>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <h2 class="header2">Verification</h2><br>
                    <div class="login_form3" step3>
                        <div class="form-row4">
                            <br>
                            <label for="idType">ID Type:</label>
                            <select id="idType" name="idType" class="s3">
                                <option value="passport">Passport</option>
                                <option value="natID">National ID</option>
                                <option value="drivLicense">Drivers License</option>
                                <option value="sss">SSS/ UMID</option>
                                <option value="philhealth">PhilHealth ID</option>
                                <option value="voter">Voters ID</option>
                                <option value="senior">Senior Citizen ID</option>
                                <option value="ofw">OFW ID</option>
                            </select>
                            <div class="inputbox3">
                                <input type="text" name="idNum" required><br>
                                <label for="">ID Number</label>
                            </div>
                            <input type="hidden" name="step" value="3">
                        </div>
                        <div class="form-row5">
                            <div class="file-input">
                                <label for="front-image">Front of ID:</label>
                                <input type="file" name="frontimage" id="front-image" accept="image/*" required>
                            </div>
                            <div class="file-input">
                                <label for="back-image">Back of ID:</label>
                                <input type="file" name="backimage" id="back-image" accept="image/*" required>
                            </div>
                        </div>
                        <div class="btn_button">
                            <button type="button" class="prev_btn" onclick="prevStep(3)">Back</button>
                            <input type="submit" name="submit" value="Sign Up">
                        </div>
                    </div>
                </div>
                <div style="text-align: center;">
                    <a href="signin.php" class="hyper_btn">Login Here</a>
                    <a href="Home.php" class="hyper_btn">Homepage</a>
                </div>
            </form>
            <div>
            <?php
                if (!empty($errorMessages)) {
                    // Display error messages
                    echo '<div class="error-message">Error(s) occurred:<ul>';
                    foreach ($errorMessages as $errorMessage) {
                        echo '<li>' . $errorMessage . '</li>';
                    }
                    echo '</ul></div>';
            
                    // JavaScript code to show an alert
                    echo '<script>alert("Registration unsuccessful. Please check the error messages.");</script>';
                } 
                ?>
            </div>
        </div>
    </div>

    <script>
        function showStep(step) {
            // Hide all steps and buttons
            var steps = document.querySelectorAll('.content');
            var tab_btn = document.querySelector('.line');

            for (var i = 0; i < steps.length; i++) {
                steps[i].classList.remove('active');
            }

            // Show the selected step
            steps[step - 1].classList.add('active');

            // Move the line to the selected step
            tab_btn.style.left = (step - 1) * (33.33) + '%';
        }

        function nextStep(currentStep) {
            if (currentStep < 3) {
                showStep(currentStep + 1);
            }
        }

        function prevStep(currentStep) {
            if (currentStep > 1) {
                showStep(currentStep - 1);
            }
        }

        showStep(1);
    </script>

</body>
</html>

