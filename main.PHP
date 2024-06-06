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

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists in the database
    $sql = "SELECT * FROM `student detail` WHERE `User name` = '$username' AND `Password` = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, redirect to homepage
        header("Location: Home.html");
        exit;
    } else {
        // User doesn't exist, display error message
        echo '<script>alert("Invalid username or password.")</script>';
    }
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
        <form action="Home.html" method="POST">
        <form method="POST">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter your username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            <input type="submit" value="Login"><br>
            <a href="#">Lost your password?</a><br>
            <a href="Register.php" target="_self">Don't have an account?</a>
        </form> 
    </div>
</body>
</html>
