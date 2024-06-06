<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "logindetail";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Login form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Securely hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Perform login authentication using prepared statements
    $stmt = $conn->prepare("SELECT `Password` FROM `student detail` WHERE `User name` = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['Password'];
        // Verify password
        if (password_verify($password, $stored_password)) {
            // Login successful, redirect to Home.html
            $_SESSION['username'] = $username;
            header("Location: Home.html");
            exit;
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="LoginPage.css">
</head>
<body>
    <div class="box">
        <div class="circle"></div>
        <div class="welcome">
            <pre>Enhance
the Basic 
Knowledge<pre>
        </div>
    </div>
    <div class="loginbox">
        <img src="Avatar.png" class="Avatar">
        <h1>Login Here</h1>
        <form action="log.php" method="POST">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter your username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="login" value="Login"><br>
            <a href="#">Lost your password?</a><br>
            <a href="raj.php" target="_self">Don't have an account?</a>
        </form>
    </div>
</body>
</html>

