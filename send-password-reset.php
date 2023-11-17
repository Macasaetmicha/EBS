<?php
session_start();
include 'connection.php';

$email = $_POST['email'];

$query = "SELECT username FROM logcredentials WHERE email = '$email'";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];

    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

    $sql = "UPDATE logcredentials SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $token_hash, $expiry, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $mail = require __DIR__ . "/mailer.php";

        $mail->setFrom('micasa.cosc75g2@gmail.com', 'MiCasa');
        $mail->addAddress($email, $username); // Use $email instead of $userEmail
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
        Click <a href="localhost/EBS/reset-password.php?token=$token">here</a> 
        to reset your password.
        END;

        try {
            $mail->send();
            echo "Message sent, please check your inbox.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Failed to update reset token in the database.";
    }

    $stmt->close();
} else {
    echo "Failed to fetch user information from the database.";
}

mysqli_close($con);
?>
