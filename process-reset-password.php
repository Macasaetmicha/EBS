<?php

    $token = $_POST["token"];
    $pass = $_POST["pword"];

    $token_hash = hash("sha256", $token);

    $mysqli = require __DIR__ . "/database_mysqli.php";

    $sql = "SELECT * FROM logcredentials
            WHERE reset_token_hash = ?";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("s", $token_hash);

    $stmt->execute();

    $result = $stmt->get_result();

    $user = $result->fetch_assoc();

    if ($user === null) {
        $_SESSION['errorMessage'] = "User not found";
        header("Location: reset-password.php?token=$token"); 
        exit();
    }

    if (strtotime($user["reset_token_expires_at"]) <= time()) {
        $_SESSION['errorMessage'] = "Session Expired";
        header("Location: reset-password.php?token=$token"); 
        exit();
    }

    if (strlen($pass) < 8) {
        $_SESSION['errorMessage'] = "Password must be at least 8 characters";
        header("Location: reset-password.php?token=$token"); 
        exit();
    }
    
    if ( ! preg_match("/[a-z]/i", $pass)) {
        $_SESSION['errorMessage'] = "Password must contain at least one letter";
        header("Location: reset-password.php?token=$token"); 
        exit();
    }
    
    if ( ! preg_match("/[0-9]/", $pass)) {
        $_SESSION['errorMessage'] = "Password must contain at least one number";
        header("Location: reset-password.php?token=$token"); 
        exit();
    }
    
    if ($pass !== $_POST["cpword"]) {
        $_SESSION['errorMessage'] = "Passwords must match";
        header("Location: reset-password.php?token=$token"); 
        exit();
    }

    else{
        $sql = "UPDATE logcredentials
            SET password = ?,
                reset_token_hash = NULL,
                reset_token_expires_at = NULL
            WHERE logID = ?";
    
        $stmt = $mysqli->prepare($sql);
        
        $stmt->bind_param("ss", $pass, $user["logID"]);
        
        $stmt->execute();

        $_SESSION['successMessage'] = "Password updated. You can now login.";
        header("Location: reset-password.php?token=$token"); 
        exit();
    }
    
    
    
?>