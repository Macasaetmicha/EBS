<?php
session_start();
include 'connection.php';

$errorMessages = array();

if(isset($_POST['submit'])){
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
    $mname = filter_input(INPUT_POST, "mname", FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
    $gender = filter_input(INPUT_POST, "Gender", FILTER_SANITIZE_SPECIAL_CHARS);
    $bday = filter_input(INPUT_POST, "bday", FILTER_SANITIZE_NUMBER_INT);
    $contNum = filter_input(INPUT_POST, "contNum", FILTER_SANITIZE_NUMBER_INT);
    $idType = filter_input(INPUT_POST, "idType", FILTER_SANITIZE_SPECIAL_CHARS);
    $idNum = filter_input(INPUT_POST, "idNum", FILTER_SANITIZE_SPECIAL_CHARS);
    $idFront = $_POST['frontimage'];
    $idBack = $_POST['backimage'];

    $checkQuery = "SELECT * FROM logcredentials WHERE email = '$email' OR username = '$username'";
    $result1 = mysqli_query($con, $checkQuery);
    if (mysqli_num_rows($result1) > 0) {
        $errorMessages[] = "Email, username, or contact number is already in use. Please choose a different one.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages[] = "Invalid email address.";
    }
    if (strlen($password) < 8 || !preg_match('/[0-9\W]/', $password)) {
        $errorMessages[] = "Password must have at least 8 characters and include at least 1 symbol or number.";
    }
    if (!preg_match('/[0-9\W]/', $password)){
        $errorMessages[] = "Password must include at least 1 symbol or number.";
    }
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        $errorMessages[] = "Invalid username. Only letters, numbers, and underscores are allowed.";
    }
    $checkQuery2 = "SELECT * FROM user WHERE contNum = '$contNum'";
    $result2 = mysqli_query($con, $checkQuery2);
    if (mysqli_num_rows($result2) > 0) {
        $errorMessages[] = "Contact number is already in use. Please choose a different one.";
    }
    if (!preg_match("/^[a-zA-Z\s]+$/", $fname) || !preg_match("/^[a-zA-Z\s]+$/", $mname) || !preg_match("/^[a-zA-Z\s]+$/", $lname)){
        $errorMessages[] = "Numbers and symbols are not allowed in the name field!";
    }
    if (!empty($errorMessages)) {
        echo '<div class="error-message">Error(s) occurred:<ul>';
        foreach ($errorMessages as $errorMessage) {
            echo '<li>' . $errorMessage . '</li>';
        }
        echo '</ul></div>';
    } 
    else{
        
        $sql1 = "INSERT INTO logcredentials (email, username, password) 
                VALUES ('$email', '$username', '$password')";
        mysqli_query($con, $sql1);
    
        $logID = mysqli_insert_id($con);

        $sql2 = "INSERT INTO user (logID, fname, mname, lname, bday, gender, contNum, idType, idNum, idFront, idBack) 
                VALUES ($logID, '$fname' , '$mname', '$lname', '$bday', '$gender', '$contNum', '$idType', '$idNum', '$idFront', '$idBack')";
        mysqli_query($con, $sql2);

        echo "<div class='success-message'>You have successfully registered!</div>";

        exit();
    }

    mysqli_close($con);

}

?>