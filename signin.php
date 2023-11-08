<?php 

    include("database.php");
    session_start();
    /*if(isset($_SESSION["email"])) {
        header("Location:homepage.php");
        }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="signStyle.css">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <h2>Login</h2>
                    <div class="inputbox3">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox3">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me           <a href="forgot-password.php">Forget Password</a></label>
                      
                    </div>
                    <input type="submit" name="submit" value="Log in">
                    <div class="register">
                        <p>Don't have an account?<a href="signup.php"> Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $querry = "SELECT * FROM booking_tb WHERE email = '$email'";
        $result = mysqli_query($conn, $querry);

        if(mysqli_num_rows($result) <=0){
            echo"Invalid email or password";
            goto here;
        }
        else{
            $row = mysqli_fetch_array($result);

            if($password==$row['pword']){
                session_start();
                $_SESSION['email'] = $email;
                header("location: homepage.php");
            }
            else{
                echo"Invalid email or password!";
            }
            here:
            mysqli_close($conn);
        }
    }
?>