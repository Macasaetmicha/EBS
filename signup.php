<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <!-- Favicon -->
    <link href="img/calendar2-event-fill.svg" rel="icon" type="image/svg+xml">
    
    <title>Simple Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="signStyle.css">
</head>
<body>
    <div class="signup-form">
        <div class="tab_box">
            <button class="tab_btn active">STEP 1</button>
            <button class="tab_btn">STEP 2</button>
            <button class="tab_btn">STEP 3</button>
            <div class="line"></div>
        </div>

        <div class="content_box">
        <form action="signup.php" method="post" class="login_form">
            <div class="content active">
                <h2>Login Credentials</h2><br>
                        <input type="email" name="email" class="s1" placeholder="Email" required><br>
                        <input type="password" name="password" class="s1" placeholder="Password" required><br>
                        <input type="text" name="username" class="s1" placeholder="Username" required>
            </div>

            <div class="content">
                <h2>Personal Information</h2><br>
                    <!-- Row 1: First Name, Middle Name, Last Name -->
                    <div class="form-row1">
                        <input type="text" name="fname" class="s2" placeholder="First Name" required>
                        <input type="text" name="mname" class="s2" placeholder="Middle Name">
                        <input type="text" name="lname" class="s2" placeholder="Last Name" required>
                    </div>

                    <!-- Row 2: Gender and Birthdate -->
                    <div class="form-row2">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Prefer not to say</option>
                        </select>
                        <label for="bday">Birthdate:</label>
                        <input type="date" name="bday" class="s2" required>
                    </div>

                    <!-- Row 3: Contact Number -->
                    <div class="form-row3">
                        <input type="text" name="contNum" class="s2" placeholder="Contact Number" required>
                    </div>
            </div>

            <div class="content">
                <h2>Verification</h2><br>
                    <div class="form-row4">
                        <br><label for="idType">ID Type:</label>
                        <select id="idType" name="IDType" class="s3">
                            <option value="passport">Passport</option>
                            <option value="natID">National ID</option>
                            <option value="drivLicense">Drivers License</option>
                            <option value="sss">SSS/ UMID</option>
                        </select>
                        <input type="text" name="idNum" class="s3" placeholder="ID Number" required><br>
                    </div>
                    <div class="form-row5">
                            <label for="image">Front of ID:</label>
                            <input type="file" name="frontimage" id="image" accept="image/*" required><br><br>
                            
                            <label for="image">Back of ID:</label>
                            <input type="file" name="backimage" id="image" accept="image/*" required>
                    </div>
                    <div class="button-class">
                        <input type="submit" name="submit" value="Sign Up">
                    </div>
            </div>

            <?php
                include 'connection.php';

                if(isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $sql1 = "INSERT INTO logcredentials (email, username, password) 
                            VALUES ('$email', '$username', '$password')";
                    mysqli_query($con, $sql1);

                    // Get the last auto-generated userID
                    $logID = mysqli_insert_id($con);

                    $fname = $_POST['fname'];
                    $mname = $_POST['mname'];
                    $lname = $_POST['lname'];
                    $bday = $_POST['bday'];
                    $contNum = $_POST['contNum'];
                    $gender = $_POST['Gender'];
                    $IDType = $_POST['IDType'];
                    $idNum = $_POST['idNum'];
                    $idFront = $_POST['frontimage'];
                    $idBack = $_POST['backimage'];
                    
                    // Insert into logcredentials
                    $sql2 = "INSERT INTO user (logID, fname, mname, lname, bday, gender, contNum, idType, idNum, idFront, idBack) 
                            VALUES ($logID, '$fname' , '$mname', '$lname', '$bday', '$gender', '$contNum', '$IDType', '$idNum', '$idFront', '$idBack')";
                    mysqli_query($con, $sql2);

                    echo "<div class='success-message'>You have successfully registered!</div>";
                    header('Location: signin.php');
                    exit();
                    
                    mysqli_close($con);
                }
            ?>
        </form>
        </div>
        <a href="signin.php" class="login">back to login</a>
        <a href="Home.php" class="login">Homepage</a>
    </div>

    <script>
        const tabs=document.querySelectorAll('.tab_btn');
        const all_content=document.querySelectorAll('.content');

        tabs.forEach((tab, index)=>{
            tab.addEventListener('click', (e)=>{
                tabs.forEach(tab=>{tab.classList.remove('active')});
                tab.classList.add('active');

                var line=document.querySelector('.line');
                line.style.width = e.target.offsetWidth + "px";
                line.style.left = e.target.offsetLeft + "px";

                all_content.forEach(content =>{content.classList.remove('active')});
                all_content[index].classList.add('active');
            })


        })
    </script>
</body>
</html>