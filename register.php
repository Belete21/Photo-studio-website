<?php
// Initialize variables
$name = $email = $password = $confirm_password = '';
$error_message = '';
$success_message = '';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = 'All fields are required.';
    } elseif ($password !== $confirm_password) {
        $error_message = 'Passwords do not match.';
    } else {
        // Load registered users
        $registeredUsers = json_decode(file_get_contents('registered_users.json'), true) ?? [];

        // Check if email already exists
        if (isset($registeredUsers[$email])) {
            $error_message = 'Email is already registered.';
        } else {
            // Save new user
            $registeredUsers[$email] = $password; // In a real application, hash the password
            file_put_contents('registered_users.json', json_encode($registeredUsers));
            $success_message = 'Registration successful! You can now log in.';
            // Clear input fields
            $name = $email = $password = $confirm_password = '';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 15px;
        }
        .error-message {
            color: red;
            text-align: center;
        }
        .success-message {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Registration</h2>
    <?php if (!empty($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <?php if (!empty($success_message)): ?>
        <div class="success-message"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        
        <input type="submit" value="Register">
    </form>

    <a href="login.php">Login</a>
</body>
</html>