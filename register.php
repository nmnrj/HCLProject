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

$registration_successful = false; // Flag to track registration status

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["register_username"];
    $password = $_POST["register_password"];
    $confirm_password = $_POST["register_confirm_password"];
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match. Please try again.";
    } else {
        // Check if the password is not empty
        if (empty($password)) {
            echo "Password cannot be empty. Please try again.";
        } else {
            // Hash the password using PASSWORD_DEFAULT algorithm
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert the user into the database
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            if ($conn->query($sql) === TRUE) {
                $registration_successful = true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Banking App - Register</title>
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
        .registration-box {
            background-color: rgba(0, 0, 0, 0.8);
            max-width: 400px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="registration-box">
        <h1>Register for the Banking App</h1>

        <?php
        if ($registration_successful) {
            // Display the success message
            echo "Registration successful. You can now <a href='login.php'>login</a>.";
        } else {
            // Display the registration form
        ?>
        <!-- Registration Form -->
        <form action="register.php" method="post">
            <label for="register_username">Username:</label>
            <input type="text" name="register_username" id="register_username" required><br>
            
            <label for="register_password">Password:</label>
            <input type="password" name="register_password" id="register_password" required><br>
            
            <label for="register_confirm_password">Confirm Password:</label>
            <input type="password" name="register_confirm_password" id="register_confirm_password" required><br>
            
            <input type="submit" value="Register">
        </form>
        <?php } ?>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
