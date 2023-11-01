<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

try {
    if(isset($_POST['sendOTP'])){
        $mail = new PHPMailer(true);
    
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'micasa.cosc75g2@gmail.com';                     //SMTP username
        $mail->Password   = 'wtuegngmimozidgg';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('micasa.cosc75g2@gmail.com');
        $mail->addAddress($_SESSION['email']);     //Add a recipient
    
        $mail->isHTML(true); 
        $mail->Subject = 'Booking Verification';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    
        $mail->send();
        "
        echo 
        <script>
        alert('Sent Successfully')
        document.location.href='Booking.php';
        </script>
        ";
    }
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$e->getMessage()}";
}

?>