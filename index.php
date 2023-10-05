<!DOCTYPE html>
<html>
<head>
    <title>Banking App</title>
    <style>
        body {
            background-image: url('2.webp');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            text-align: center;
            color: #fff;
            display: flex;
            justify-content: center; /* Center align horizontally */
            align-items: center; /* Center align vertically */
            min-height: 100vh; /* Ensure the content takes up the full viewport height */
        }
        .container {
            background-color: rgba(0, 0, 0, 0.8);
            max-width: 400px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .logo {
            margin-bottom: 20px;
        }
        h1 {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="1.webp" alt="Banking Logo" width="150">
        <h1>Welcome to the Banking App</h1>

        <!-- Login Form -->
        <h2>Login</h2>
        <form action="login.php" method="post">
            <label for="login_username">Username:</label>
            <input type="text" name="login_username" id="login_username" required><br>
            
            <label for="login_password">Password:</label>
            <input type="password" name="login_password" id="login_password" required><br>
            
            <input type="submit" value="Login">
        </form>

        <!-- Registration Form -->
        <h2>Register</h2>
        <form action="register.php" method="post">
            <label for="register_username">Username:</label>
            <input type="text" name="register_username" id="register_username" required><br>
            
            <label for="register_password">Password:</label>
            <input type="password" name="register_password" id="register_password" required><br>
            
            <label for="register_confirm_password">Confirm Password:</label>
            <input type="password" name="register_confirm_password" id="register_confirm_password" required><br>
            
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
