<?php
// Start a session
session_start();

// Check if the username is set in the session
if (isset($_SESSION["username"])) {
    // The user is authenticated and the username is set in the session
    $username = $_SESSION["username"];
} else {
    // Redirect to the login page or handle unauthenticated users
    header("Location: login.php"); // Replace with your login page URL
    exit(); // Terminate script execution
}

// Fetch the account number from your database or session and store it in $account_number
// You need to implement this part based on how you store and retrieve the account number

// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = ""; // Enter your database password
$dbname = "your_database_name"; // Replace with your actual database name

$conn = new mysqli('localhost','root',"",'additional_details');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Dashboard</title>
    <style>
        /* CSS styling for the dashboard (customize as needed) */
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg'); /* Specify the image URL */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            text-align: center;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Add a semi-transparent white background */
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 400px;
            margin: 0 auto;
            margin-top: 20px;
        }
        h1 {
            color: #333;
        }
        a {
            text-decoration: none;
            background-color: #008CBA;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
            display: inline-block;
        }
        a:hover {
            background-color: #005f80;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Dashboard</h1><br>
<p> Choose your service</p>
        <a href="deposit.php">Deposit Service</a>
        <a href="transfer.php">Transfer Service</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

