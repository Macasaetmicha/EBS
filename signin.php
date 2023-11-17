<?php
session_start();
if(isset($_SESSION["email"])) {
    header("Location:homepage.php");
    }

//check if submit button is pressed
if(isset($_GET['submit']))
{
    //if pressed it will get the value in email and password field
    $email = $_GET['email'];
    $password = $_GET['password'];
    
    //establish database connection
    include 'connection.php';
    
    //retrieves data from specified table where email is the same as email entered.
    $querry = "SELECT * FROM logcredentials WHERE email = '$email'";
    //sets the retrieved data as $result
    $result = mysqli_query($con,$querry);
    
    //check if there are 0 rows in result, meaning no email match
    if(mysqli_num_rows($result)<=0) 
    {
        //if there are 0
        echo "Invalid email or password";
        goto here;
    }
    else
    {
        //check now for password y getting the row in result 
        $row = mysqli_fetch_array($result);
        
        //checks if password matches with password retrieved in db
        if($password==$row['password'])
        {
            //initiates a new session and redirects to reservation.php
            session_start();
            //store only email and not password for privacy reasons
            $_SESSION["email"] = $email;
            header("location: Home.php");
        }
        else
        {
            //display if password dosent match
            echo "<br><br>Invalid email or password!";
        }
        here:
        //close db connection
        mysqli_close($con);
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <!-- Favicon -->
    <link href="img/calendar2-event-fill.svg" rel="icon" type="image/svg+xml">
    
    <title>SignIn | MiCasa Events</title>
    <link rel="stylesheet" type="text/css" href="signStyle.css">

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="form-box">
        <div class="form-value">
            <form method="get">
                <h2>LOGIN</h2>
                <div class="inputbox3">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" id="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox3">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" id="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="forget">
                    <label for=""><input type="checkbox">Remember Me</label>
                    <label><a href="fpass.php">Forgot Password</a></label>
                </div>
                <div class="buttons">
                    <input type="submit" name="submit" class="back_btn" value="Log in">
                    <div class="register">
                        <p>Don't have an account?<a href="signup.php"> Register</a></p>
                    </div>
                </div> 
            </form>
        </div>
    </div> 
</body>
</html>