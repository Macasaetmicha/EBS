<?php
session_start();
include 'connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_POST['submit'])) {
    $package = $_POST['package'];
    $funcRoom = $_POST['FRoom'];
    $eventName = $_POST['event'];
    $guestNum = $_POST['number'];
    $noFormateventDate = $_POST['dateEvent'];
    $eventDate = date('Y-m-d', strtotime($noFormateventDate));
    $eventSTime = $_POST['sTime'];
    $eventETime = $_POST['eTime'];
    $request = $_POST['reqs'];

    $refNumber = $_POST['refNum'];
    $cardNum = $_POST['cardNum'];
    $cvv = $_POST['cvv'];
    $expDate = $_POST['expDate'];

    $contNum = $_POST['contNum'];

    $userEmail = $_SESSION['email'];

    //retrieves data from specified table where email is the same as email entered.
    $querry1 = "SELECT u.userID FROM user u
    INNER JOIN logCredentials lc ON u.logID = lc.logID
    WHERE lc.email = '$userEmail'";

    //sets the retrieved data as $result
    $result1 = mysqli_query($con,$querry1);

    if ($result1->num_rows > 0) {
        // Fetch the userID
        $row = $result1->fetch_assoc();
        $userID = $row["userID"];
        // You now have the userID associated with the user's email
    } 

    echo "Package: " . $package . "<br>";
    echo "Function Room: " . $funcRoom . "<br>";
    echo "Event Name: " . $eventName . "<br>";
    echo "Guest Num: " . $guestNum . "<br>";
    echo "Event Date: " . $eventDate . "<br>";
    echo "Start Time: " . $eventSTime . "<br>";
    echo "End Time: " . $eventETime . "<br>";
    echo "request: " . $request . "<br>";
    echo "Contact Number: " . $contNum . "<br>";
    

    $sql2 = "INSERT INTO eventinfo (userID, package, funcRoom, eventType, numAttendee, eventDate, eventTimeStart, eventTimeEnd, request) 
            VALUES ('$userID', '$package', '$funcRoom', '$eventName','$guestNum', '$eventDate', '$eventSTime', '$eventETime', '$request')";
    mysqli_query($con, $sql2);

    $eventID = mysqli_insert_id($con);

    if (isset($_POST["contactChoice"]) && $_POST["contactChoice"] === "yes") {
        $sql6 = "UPDATE user
        SET contNum = '$contNum'
        WHERE userID = $userID";
        mysqli_query($con, $sql6);
    } else{

    }

    $price=0;
    $down=0;
    $full=0;

    //retrieves data from specified table where email is the same as email entered.
    $querry2 = "SELECT BasePrice FROM pricinginfo WHERE Package ='$package' AND Ballroom = '$funcRoom'";

    //sets the retrieved data as $result
    $result2 = mysqli_query($con,$querry2);

    if ($result2->num_rows > 0) {
        // Fetch the userID
        $row = $result2->fetch_assoc();
        $price = $row["BasePrice"];
        // You now have the userID associated with the user's email

        $percentage = 0.3; // 30% expressed as a decimal
        $down = $percentage * $price;

        // Subtract 30% from the original value
        $full = $price - $down;
    } 

    $type = $_POST['payType'];

    $sql4 = "INSERT INTO paymentinfo (eventID, total_bill, downpayment, paymentType, fullPayment) 
            VALUES ('$eventID', '$price', '$down', '$type','$full')";
    mysqli_query($con, $sql4);

    $paymentID = mysqli_insert_id($con);

    echo "type: " . $type . "<br>";
    echo "refNum: " . $refNumber . "<br>";
    echo "cardNum: " . $cardNum . "<br>";
    echo "cvv: " . $cvv . "<br>";
    echo "expdate: " . $expDate . "<br>";

    // Insert payment information into the database
    if ($type === "gcash" || $type === "maya") {
        $sql5 = "INSERT INTO onlineinfo (paymentID, referenceNum) VALUES ('$paymentID','$refNumber')";
        mysqli_query($con, $sql5);
    } else if ($type  === "pA" || $type  === "pB") {
        $sql6 = "INSERT INTO cardinfo (paymentID, cardNum, cvv, expDate) VALUES ('$paymentID','$cardNum','$cvv','$expDate')";
        mysqli_query($con, $sql6);
    }

    //retrieves data from specified table where email is the same as email entered.
    $querry3 = "SELECT username FROM logcredentials WHERE email = '$userEmail';";

    //sets the retrieved data as $result
    $result3 = mysqli_query($con,$querry3);

    if ($result3->num_rows > 0) {
        // Fetch the userID
        $row = $result3->fetch_assoc();
        $username = $row["username"];
        // You now have the userID associated with the user's email
    } 

    echo "email: " . $userEmail . "<br>";
    echo "name: " . $username . "<br>";

    try {
        $mail = new PHPMailer(true);

        // Your email sending configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'micasa.cosc75g2@gmail.com'; // Your email address
        $mail->Password = 'wtuegngmimozidgg'; // Your email password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('micasa.cosc75g2@gmail.com', 'MiCasa');
        $mail->addAddress($userEmail, $username);

        $mail->isHTML(true);
        $mail->Subject = 'Booking Details';
        
        $emailContent = "
        <html>
        <body>
        <p>Dear $username,</p>
        <p>We hope this email finds you well. We wanted to take a moment to express our sincere gratitude for choosing MiCasa Events for your upcoming special day. 
        It is our pleasure to assist you in making this day a memorable and stress-free experience.</p>

        <p>Here are the details of your booking:</p>

        <strong>Event Information:</strong>
        <ul>
            <li>Event Name: $eventName</li>
            <li>Event Date: $eventDate</li>
            <li>Start Time: $eventSTime</li>
            <li>End Time: $eventETime</li>
            <li>Number of Guests: $guestNum</li>
        </ul>

        <strong>Package & Function Room:</strong>
        <ul>
            <li>Package Selected: $package</li>
            <li>Function Room: $funcRoom</li>
        </ul>

        <strong>Payment Details:</strong>
        <ul>
            <li>Total Amount: Php $price</li>
            <li>Downpayment (30%): Php $down</li>
            <li>Amount to be Paid on the Day of the Event: Php $full</li>
        </ul>

        <p>If you have any special requests or additional information you'd like to share with us, please don't hesitate to let us know. 
        We are committed to ensuring that your event is tailored to your preferences and meets your expectations.</p>

        <p>Your trust in us is greatly appreciated, and we look forward to working with you to create a memorable event. 
        If you have any questions or need further assistance, please feel free to contact our team at 09123456789.</p>

        <p>Thank you once again for choosing MiCasa Events. We can't wait to make your event extraordinary!</p>

        <p>Warm regards,<br>Mica<br>MiCasa Events</p>
        </body>
        </html>
        ";

        $mail->Body = $emailContent;

            $mail->send();

            echo 'Message sent!';
        } catch (Exception $e) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        mysqli_close($con);

        $successMessage = "Booking was successful! Thank you for choosing us. 
        \n\n An email was sent to you with Event details. Mark your Calendar!";

        // Show SweetAlert with the custom class applied to the message
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                html: '" . $successMessage . "',
                customClass: {
                    popup: 'custom-swal-popup', /* Custom class for the entire popup */
                    title: 'custom-swal-title', /* Custom class for the title */
                    htmlContainer: 'custom-swal-message' /* Custom class for the message */
                }
            });
        </script>";


        header('Location: home.php?message=' . urlencode($successMessage));
        exit;

}
?>