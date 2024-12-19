<?php
session_start();

// Initialize error message
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simulating user registration data
    $registeredUsers = json_decode(file_get_contents('registered_users.json'), true) ?? [];

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists and the password matches
    if (isset($registeredUsers[$email]) && $registeredUsers[$email] === $password) {
        $_SESSION['user'] = $email; // Store user information in session
        header('Location: index.php'); // Redirect to index page
        exit;
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    .container {
      max-width: 300px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
    
    .container h2 {
      text-align: center;
    }
    
    .form-group {
      margin-bottom: 10px;
    }
    
    .form-group label {
      display: block;
      margin-bottom: 5px;
    }
    
    .form-group input[type="text"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .btn {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      text-align: center;
      cursor: pointer;
      border-radius: 5px;
      margin-top: 10px;
    }
    
    .error-message {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form method="post" action="">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Login" class="btn">
        <button type="button" onclick="window.location.reload();" class="btn">Refresh</button>
      </div>
      <div id="error-message" class="error-message" style="display: <?php echo $error_message ? 'block' : 'none'; ?>;">
        <?php echo $error_message; ?>
      </div>
    </form>
  </div>
</body>
</html>