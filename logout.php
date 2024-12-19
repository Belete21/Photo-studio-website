<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['user'])) {
    // Clear all session variables
    $_SESSION = [];
    
    // Destroy the session
    session_destroy();
    
    // Redirect to homepage after logout
    header("Location: homepage.php"); // Change to your actual homepage
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .logout-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
        }
        button {
            background-color: #ff4c4c;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #ff1c1c;
        }
        @media (max-width: 600px) {
            .logout-container {
                width: 90%;
                padding: 15px;
            }
            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h1>Are you sure you want to logout?</h1>
        <button id="logoutButton" onclick="logout()">Logout</button>
    </div>

    <script>
        function logout() {
            // Redirect to the same page to handle logout
            window.location.href = 'logout.php'; // Ensure this file is named correctly
        }
    </script>
</body>
</html>