<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Register";

$conn = new mysqli('localhost','root',"",'register');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login_error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["login_username"];
    $password = $_POST["login_password"];
    
    // Fetch user from the database based on username
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row["password"]; // Retrieve the stored password
        
        // Compare the user's input directly with the stored password
        if ($password === $stored_password) {
            session_start();
            $_SESSION["username"] = $username;
            header("Location: dashboard.php"); // Redirect to the dashboard or another secure page
            exit();
        } else {
            $login_error = "Invalid username or password.";
        }
    } else {
        $login_error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Banking App - Login</title>
    <style>
        body {
            background-image: url('2.webp');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            text-align: center;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-box {
            background-color: rgba(0, 0, 0, 0.8);
            max-width: 400px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>Login to the Banking App</h1>

        <form action="login.php" method="post">
            <label for="login_username">Username:</label>
            <input type="text" name="login_username" id="login_username" required><br>
            
            <label for="login_password">Password:</label>
            <input type="password" name="login_password" id="login_password" required><br>
            
            <input type="submit" value="Login">
        </form>

        <?php
        if (!empty($login_error)) {
            echo "<p style='color: red;'>$login_error</p>";
        }
        ?>
    </div>
</body>
</html>
