<?php
    include("database.php");

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Simple Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="signStyle.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" class="signup-form" method="post">
        <div class="tab_box">
            <div class="tab_btn active">STEP 1</div>
            <div class="tab_btn">STEP 2</div>
            <div class="tab_btn">STEP 3</div>
            <div class="line"></div>
        </div>

        <div class="content_box">
            <div class="content active">
                <h2 class="header2">Login Credentials</h2><br>
                <div class="login_form1" id="step-1">
                        <div class="inputbox">
                            <input type="email" name="email" required><br>
                            <label for="">Email</label>
                        </div>
                        <div class="inputbox">
                            <input type="password" name="password" required><br>
                            <label for="">Password</label>
                        </div>
                        <div class="inputbox" >
                            <input type="text" name="username" required>
                            <label for="">Username</label>
                        </div>
                    <div class="btn_button">
                        <button type="button" onclick="nextStep(1)">Next</button>
                    </div>
                </div>
                
            </div>

            <div class="content">
                <h2 class="header2">Personal Information</h2><br>
                <div class="login_form2" id="step-2">
                    <!-- Row 1: First Name, Middle Name, Last Name -->
                    <div class="form-row1">
                        <div class="inputbox1">
                            <input type="text" name="fname"required>
                            <label for="">First Name</label>
                        </div>
                        <div class="inputbox1">
                            <input type="text" name="mname" required>
                            <label for="">Middle Name</label>
                        </div>
                        <div class="inputbox1">
                            <input type="text" name="lname" required>
                            <label for="">Last Name</label>
                        </div>
                    </div>

                    <!-- Row 2: Gender and Birthdate -->
                    <div class="form-row2">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" class="s3">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Prefer not to say</option>
                        </select>
                        <label for="bday">Birthdate:</label>
                        <input type="date" name="bday" class="s3" required>
                    </div>

                    <!-- Row 3: Contact Number -->
                    <div class="form-row3">
                        <div class="inputbox1">
                            <input type="text" name="contNum" maxlength="11" required>
                            <!-- oninput="checkInputLenth(this)" min="11" max="11" for contNum-->
                            <label for="">Contact Number</label>
                        </div>
                    </div>
                    <div class="btn_button">
                        <button type="button" onclick="prevStep(2)">Back</button>
                        <button type="button" onclick="nextStep(2)">Next</button>
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
                        <div class="inputbox1">
                            <input type="text" name="idNum" required><br>
                            <label for="">ID Number</label>
                        </div>
                        
                        
                        <input type="hidden" name="step" value="3">
                    </div>
                    <div class="btn_button">
                        <button type="button" onclick="prevStep(3)">Back</button>
                        <input type="submit" name="submit" value="Sign Up">
                        
                    </div>
                </div>
                
            </div>
        </div>
            <a href="signin.php" class="login">Login Here</a>
            <a href="homepage.php" class="login">Homepage</a>
       
    </form>
        
    <script>
        function showStep(step) {
            // Hide all steps and buttons
            var steps = document.querySelectorAll('.content');
            var buttons = document.querySelectorAll('.btn_button button');
            var currentStep = 0;
            var tab_btn= document.querySelectorAll(".line");
            for (var i = 0; i < steps.length; i++) {
                steps[i].classList.remove('active');
                buttons[i].classList.add('hidden');
            }
    
            // Show the selected step and appropriate buttons
            steps[step - 1].classList.add('active');
            if (step > 1) {
                buttons[step - 2].classList.remove('hidden');
            }
            if (step < steps.length) {
                buttons[step - 1].classList.remove('hidden');

            }
        }
    
        function nextStep(currentStep) {
            showStep(currentStep + 1);
        }
    
        function prevStep(currentStep) {
            showStep(currentStep - 1);
        }
        // Initially show the first step
        showStep(1);

        /*
        function checkInputLength(input) {
            var maxLength = 11; // Change this to your desired maximum length

            if (input.value.length > maxLength) {
                input.value = input.value.slice(0, maxLength); // Truncate the input to the maximum length
            }
        }
        */
        
    </script>
</body>
</html>

<?php

    $errors = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
        $mname = filter_input(INPUT_POST, "mname", FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
        $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);
        $bday = filter_input(INPUT_POST, "bday", FILTER_SANITIZE_NUMBER_INT);
        $contNum = filter_input(INPUT_POST, "contNum", FILTER_SANITIZE_NUMBER_INT);
        $idType = filter_input(INPUT_POST, "idType", FILTER_SANITIZE_SPECIAL_CHARS);
        $idNum = filter_input(INPUT_POST, "idNum", FILTER_SANITIZE_SPECIAL_CHARS);

        // Check if the email, username, or contact number is already in use
        $checkQuery = "SELECT * FROM booking_tb WHERE email = '$email' OR username = '$username' OR contNum = '$contNum'";
        $result = mysqli_query($conn, $checkQuery);
        if (mysqli_num_rows($result) > 0) {
            echo "Email, username, or contact number is already in use. Please choose a different one.";
        }

        // Check for email validity
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email address.";
        }

        // Check password and set minumum length
        elseif (strlen($password) < 8 || !preg_match('/[0-9\W]/', $password)) {
            echo "Password must have at least 8 characters and include at least 1 symbol or number.";
        }
        elseif (!preg_match('/[0-9\W]/', $password)){
            echo "Password must include at least 1 symbol or number.";
        }

        // Check for name validity
        elseif (!preg_match("/^[a-zA-Z\s]+$/", $fname) || !preg_match("/^[a-zA-Z\s]+$/", $mname) || !preg_match("/^[a-zA-Z\s]+$/", $lname)){
            echo"Numbers and symbols are not allowed in the name field!";
        }

        // Check contact number
        elseif (!preg_match("/^[a-zA-Z\s]+$/", $fname) || !preg_match("/^[a-zA-Z\s]+$/", $mname) || !preg_match("/^[a-zA-Z\s]+$/", $lname)){
            echo"Numbers and symbols are not allowed in the name field!";
        }
                
        // Check for username validity
        elseif (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            echo "Invalid username. Only letters, numbers, and underscores are allowed.";
        }

        else{
            $sql = "INSERT INTO booking_tb (email, pword, username, fname, mname, lname, gender, bday, contNum, idType, idNum) VALUES ('$email', '$password', '$username', '$fname', '$mname', '$lname', '$gender', '$bday', '$contNum', '$idType', '$idNum')";
            mysqli_query($conn, $sql);
            echo"registered";
        }

    }
    

    mysqli_close($conn)
?>