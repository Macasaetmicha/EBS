<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="signStyle.css">
</head>
<body>
  <header class="header">
    <nav class="navbar">
          <a href="#">Home</a>
          <a href="#">About</a>
          <a href="#">Contact</a>
          <a href="#">Help</a>
    </nav>
  </header>
  
  <section>
    <div class="forgetpass_box">
      <form action="send-password-reset.php" method="post">
        <h2>Forgot Password</h2>
        <div class="inputbox3">
          <input type="email" name="email" required>
          <label for="email">Email</label>
        </div>
        <button type="submit">Sent</button>
      
      </form>
    </div>
  </section>
  
</body>
</html>