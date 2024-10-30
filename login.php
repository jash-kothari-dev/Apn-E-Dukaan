<?php 
// Start the session
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$db_server = 'localhost';  // Database server
$db_user = 'root';         // Database username
$db_pass = '';             // Database password
$db_name = 'apn-e-dukaan'; // Database name

// Create connection
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT password FROM user WHERE email = ?"); // Use the correct column name
    $stmt->bind_param("s", $email); // "s" means the parameter is a string

    // Execute the statement
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        // Bind the result
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION['email'] = $email; // Example of setting a session variable

            // Redirect to homepage
            header("Location: index.php");
            exit(); // Ensure no further code is executed after the redirect
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No user found with that email.";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="outer-login">
        <div class="company-logo"><a href="/index.php">
                <h1>Apn-E-Dukaan</h1>
            </a></div>
        <div class="login-form">
            <h3>Login</h3>
            <form action="login.php" method="POST">
                <label for="email">
                    <h6>E-mail</h6>
                </label>
                <input type="email" name="email" id="email" required>
                <label for="password">
                    <h6>Password</h6>
                </label>
                <input type="password" name="password" id="password" required>
                <div class="continue">
                         <a href="index.html">
                            <button type="button">Continue</button>
                        </a>
                </div>
            </form>
            <?php if (isset($error_message)): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <p><a href="#">Forgot password</a></p>
        </div>
        <div class="copyright">
            <i class="fa-regular fa-copyright"> </i>
            <p>2024, Apn-E-Dukaan.com, All Rights Reserved </p>
        </div>
    </div>

</body>
</html>