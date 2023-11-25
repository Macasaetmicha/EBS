<?php
session_start();
include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$email = $_POST['email'];

$query = "SELECT username FROM logcredentials WHERE email = '$email'";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);

    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

    $sql = "UPDATE logcredentials SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $token_hash, $expiry, $email);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $mail = new PHPMailer(true);

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->isSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->Username = "micasa.cosc75g2@gmail.com";
        $mail->Password = "wtuegngmimozidgg";

        $mail->isHtml(true);

        $mail->setFrom('micasa.cosc75g2@gmail.com', 'MiCasa');
        $mail->addAddress($email, $result); 
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
        Click <a href="http://localhost/COSC75Project/reset-password.php?token=$token">here</a> 
        to reset your password.
        END;

        try {
            $mail->send();
            $_SESSION['successMessage'] = "Message sent. Please check your email.";
        } catch (Exception $e) {
            $_SESSION['errorMessage'] = "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
        }
    } else {
        $_SESSION['errorMessage'] = "Email not found.";
    }

    $stmt->close();
} else {
    $_SESSION['errorMessage'] = "Failed to fetch user information from the database.";
}

mysqli_close($con);

header("Location: fpass.php"); 
exit();

?>
