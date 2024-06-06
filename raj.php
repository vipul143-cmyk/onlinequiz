<?php
// Database connection
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$database = "registerdata";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; // Change parameter name to match the form

    // Insert user data into the database
    $sql = "INSERT INTO `registervs` (`User name`, `Email`, `Password`, `Confirm Password`) VALUES ('$name', '$email', '$password', '$confirm_password')";

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
    <title>Register Page</title>
    <link rel="stylesheet" href="Register_Page.css">
</head>
<body>
    <div class="box">
        <div class="circle"></div>
        <div class="welcome">
            <pre>  Welcome
    to 
LET'S QUIZZ<pre>
        </div>
    </div>
     <div class="loginbox">
        <img src="Avatar.png" class="Avatar">
        <h1>Register Here</h1>
        <form action="raj.php">
            <p>Name</p>
            <input type="text" name="" placeholder="Enter your name" required>
            <p>E-mail</p>
            <input type="email" name="" placeholder="Enter your e-mail address"> 
            <p>Password</p>
            <input type="password" name="" placeholder="Enter Password" required>
            <p>Confirm Password</p>
            <input type="password" name="" placeholder="Enter Confirm Password" required>
            <input type="submit" name="" value="Register"><br>
            <a href="raj.php" target="_self">Already have an account</a>
        </form>
     </div>
     
</body>
</html>








