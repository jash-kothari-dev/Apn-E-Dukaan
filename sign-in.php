<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="sign-in.css">
</head>

<body>
    <div class="outer-sign-in">
        <div class="company-logo"><a href="/index.html">
                <h1>Apn-E-Dukaan</h1>
            </a></div>
        <div class="sign-in-form">
            <h3>Create Account</h3>
            <form action="sign-in.php" method="POST">
                <label for="name">
                    <h6>Your Name</h6>
                </label>
                <input type="text" name="name" id="name" required>
                <label for="mobile_number">
                    <h6>Mobile no.</h6>
                </label>
                <input type="tel" name="mobile" id="mobile_number" required>
                <label for="email">
                    <h6>Email</h6>
                </label>
                <input type="email" name="email" id="email" required>
                <label for="password">
                    <h6>Password</h6>
                </label>
                <input type="password" name="password" id="password" required>
                <label for="re-password">
                    <h6>Re-enter password</h6>
                </label>
                <input type="password" name="re_password" id="re-password" required>
                <div class="continue"><button type="submit">Continue</button></div>
            </form>
            <p>Already have an Account? <a href="/login.html">Log in</a></p>
        </div>
        <div class="copyright">
            <i class="fa-regular fa-copyright"> </i>
            <p>2024, Apn-E-Dukaan.com, All Rights Reserved </p>
        </div>
    </div>

</body>
</html>
<?php
// Database connection parameters
$db_server = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'apn-e-dukaan';

// Create connection
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    // Insert data into the database
    $sql = "INSERT INTO user (email, password, name, mobile_no) VALUES ('$email', '$password', '$name', '$mobile')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>