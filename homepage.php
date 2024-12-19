<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Photo Studio</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
            background-image: url('bb.jpg'); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        h1 {
            font-size: 100px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        a {
            display: inline-block;
            margin: 10px 20px;
            padding: 15px 30px;
            font-size: 1.2em;
            color: white;
            background-color: rgba(255, 87, 34, 0.8); /* Orange color */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        a:hover {
            background-color: rgba(255, 87, 34, 1);
            transform: scale(1.05);
        }

        img {
            float: right;
            width: 300px;
            height: 300px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <img src="cam1.jpg" alt="Camera" />
    <h1 id="welcome">Welcome to BISRAT Photo Studio</h1>
    <a href="register.php">Sign Up</a>
    <a href="login.php">Login</a>
</body>
</html>