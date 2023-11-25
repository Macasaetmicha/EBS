<?php

  $token = $_GET["token"];

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
        die("token not found");
  }

  if (strtotime($user["reset_token_expires_at"]) <= time()) {
        die("token has expired");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Simple Sign Up Page</title>
    <link rel="stylesheet" type="text/css" href="signStyle.css">
</head>
<body>
  <section>
    <div class="form-box">
    <div class="changepass_box">
      <form method="post" action="process-reset-password.php">
        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
        <h2>Reset Password</h2>
        <div class="inputbox3">
          <input type="password" name="pword"required>
          <label for="">New Password</label>
        </div>
        <div class="inputbox3">
          <input type="password" name="cpword" required>
          <label for="">Confirm Password</label>
        </div>
        <button type="submit" name="submit">Change Password</button>
      </form>
    </div>
    <div class="error_box">
      <?php
      if (isset($_SESSION['errorMessage']) && !empty($_SESSION['errorMessage'])) {
        echo '<p class="error-message">' . $_SESSION['errorMessage'] . '</p>';
        unset($_SESSION['errorMessage']); 
      }
      if (isset($_SESSION['successMessage']) && !empty($_SESSION['successMessage'])) {
        echo '<p class="success-message">' . $_SESSION['successMessage'] . '</p>';
        unset($_SESSION['successMessage']); 
      }
      ?>
    </div>
    </div>
  </section>
  
</body>
</html>