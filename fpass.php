<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="signStyle.css">
</head>
<body>
  <section>
    <div class="form-box">
    <div class="forgetpass_box">
      <form action="send-password-reset.php" method="post">
        <h2>Forgot Password</h2>
        <div class="inputbox3">
          <input type="email" name="email" required>
          <label for="email">Email</label>
        </div>
        <button type="submit">Send</button>
        <a href="signin.php" class="back_btn">Login</a>
      </form>
    </div>
    </div>
  </section>
  
</body>
</html>