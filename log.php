<?php
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

echo "Connected successfully";

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insert user data into the database
    $sql ="INSERT INTO `student detail` (`Sr.no`, `User name`, `Password`) VALUES (NULL, '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="stylesheet" href="Login_Page.css">
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
        <form action="Home.html">
            <p>Username</p>
            <input type="text" name="" placeholder="Enter your username">
            <p>Password</p>
            <input type="password" name="" placeholder="Enter Password">
            <input type="submit" name="" value="Login"><br>
            <a href="#">Lost your password?</a><br>
            <a href="Register_Page.html" target="_self">Don't have an account?</a>
        </form>
     </div>
</body>
</html>