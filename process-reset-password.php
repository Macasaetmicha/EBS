<?php


    $token = $_POST["token"];

    $token_hash = hash("sha256", $token);

    $mysqli = require __DIR__ . "/database_mysqli.php";

    $sql = "SELECT * FROM booking_tb
            WHERE reset_token_hash = ?";

    $stmt = $mysqli->prepare($sql);

    $stmt->bind_param("s", $token_hash);

    $stmt->execute();

    $result = $stmt->get_result();

    $user = $result->fetch_assoc();

    if ($user === null) {
        die("token not found");
    }

    if (strtotime($user["reset_token_expires_at"]) <= time()) {
        die("token has expired");
    }

    if (strlen($_POST["pword"]) < 8) {
        die("Password must be at least 8 characters");
    }
    
    if ( ! preg_match("/[a-z]/i", $_POST["pword"])) {
        die("Password must contain at least one letter");
    }
    
    if ( ! preg_match("/[0-9]/", $_POST["pword"])) {
        die("Password must contain at least one number");
    }
    
    if ($_POST["pword"] !== $_POST["cpword"]) {
        die("Passwords must match");
    }
    
    $password_hash = password_hash($_POST["pword"], PASSWORD_DEFAULT);
    
    $sql = "UPDATE booking_tb
            SET pword = ?,
                reset_token_hash = NULL,
                reset_token_expires_at = NULL
            WHERE id = ?";
    
    $stmt = $mysqli->prepare($sql);
    
    $stmt->bind_param("ss", $password_hash, $user["id"]);
    
    $stmt->execute();
    
    echo "Password updated. You can now login.";
?>