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

// Include your database connection code here
$servername = "localhost";
$username = "root";
$password = ""; // Enter your database password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect deposit details from the form
    $account_number = $_POST["account_number"];
    $deposit_amount = $_POST["deposit_amount"];
    
    // Connect to the deposit database
    $deposit_dbname = "deposit_details"; // Replace with your database name
    $conn = new mysqli($servername, $username, $password, $deposit_dbname);
    if ($conn->connect_error) {
        die("Deposit Connection failed: " . $conn->connect_error);
    }

    // Insert the deposit data into the "deposit_transactions" table
    $sql = "INSERT INTO deposit_transactions (account_number, deposit_amount) 
            VALUES ('$account_number', '$deposit_amount')";

    if ($conn->query($sql) === TRUE) {
        // Display a success message and hide the form
        echo '<script>
                alert("Deposit successful.");
                window.location.href = "yourdashboard.php";
              </script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Banking App - Deposit</title>
    <style>
        /* CSS styling for the form (customize as needed) */
        body {
            font-family: Arial, sans-serif;
            background-image: url('2.webp'); /* Specify the image URL */
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
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"],
        input[type="number"] {
            width: 80%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc; /* Adjust border width and style */
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #008CBA;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #005f80;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Deposit</h1>

        <!-- Deposit Form -->
        <form action="deposit.php" method="post">
            <label for="account_number">Account Number:</label>
            <input type="text" name="account_number" id="account_number" required>
            
            <label for="deposit_amount">Deposit Amount:</label>
            <input type="number" name="deposit_amount" id="deposit_amount" required>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
