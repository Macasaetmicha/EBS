<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <h3>Change Password</h3>
        Email: <br>
        <input type="text" name="email"> <br>
        Confirm Email: <br>
        <input type="text" name="cemail"> <br>
        Enter OTP: <br>
        <input type="text" name="otp"> <input type="submit" name="sotp" value="Send OTP"> <br>
        New Password: <br>
        <input type="password" name="pword"> <br>
        Confirm New Password: <br>
        <input type="password" name="cpword"> <br><br>
        <input type="submit" name="submit" value="Confirm"> <br>
        <br>
        <a href="signin.php">Login</a><br>
        <a href="signup.php">Signup</a><br>
    </form>
</body>
</html>

<?php
    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $cemail = $_POST["cemail"];
        $password = $_POST["pword"];
        $cpassword = $_POST["cpword"];
        
        // First, check if the email exists in the database
        $result = mysqli_query($conn, "SELECT * FROM booking_tb WHERE email = '$email'");
        
        if (mysqli_num_rows($result) > 0) {
            // Email exists in the database, now check if $email and $cemail are the same
            if ($email == $cemail) {
                // Emails match, now check if $password and $cpassword are the same
                if ($password == $cpassword) {
                    // Check password constraints
                    if (strlen($password) < 8 || !preg_match('/[0-9\W]/', $password)) {
                        echo "Password must have at least 8 characters and include at least 1 symbol or number.";
                    } else {
                        // Password meets constraints, update it in the database
                        $updateQuery = "UPDATE booking_tb SET pword = '$password' WHERE email = '$email'";
                        if (mysqli_query($conn, $updateQuery)) {
                            echo "Password updated successfully!";
                        } else {
                            echo "Error updating password: " . mysqli_error($conn);
                        }
                    }
                } else {
                    echo "Password and confirmation password do not match.";
                }
            } else {
                echo "Email and confirmation email do not match.";
            }
        } else {
            echo "Email does not exist in the database.";
        }
    }


    mysqli_close($conn);
?>