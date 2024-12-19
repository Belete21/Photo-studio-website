<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and process form input
    $fullname = htmlspecialchars($_POST['fullname']);
    $email = htmlspecialchars($_POST['email']);
    $comment = htmlspecialchars($_POST['comment']);
    
    // Here you can add code to save data to a database or send an email
    
    // Redirect or display a success message
    echo "<h2>Thank you for your comment, $fullname!</h2>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Photo Studio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Home</a>
    <h1>Contact Us</h1>
    <h3>Phone: 0902734648</h3>
    <h3>Email: 21bsisay@gmail.com</h3>
    <h3>Address: Wollo University, Kiot</h3>
    <form action="" method="post">
        <label>Full Name</label>
        <input type="text" name="fullname" required /><br><br />
        <label>Email</label>
        <input type="email" name="email" required /><br><br />
        <label>Comment</label>
        <textarea name="comment" rows="3" cols="20" placeholder="Write your comment here" required></textarea><br>
        <input type="submit" value="Send Comment">
    </form>
</body>
</html>