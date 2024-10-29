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
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $address = $_POST['address'];
    $house_no = $_POST['house_no'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    // Insert data into the database
    $sql = "INSERT INTO billing (fname, lname, address, house_no, city, pincode, phone, email) VALUES ('$fname', '$lname', '$address', '$house_no', '$city', '$pincode', '$phone', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// Close the connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="checkout.css">
</head>
<body>
    <header>
        <div class="navbar">
          <div class="logo">
            <h1>Apn-E-Dukaan</h1>
          </div>
          <div class="nav-options">
            <nav>
              <a href="#"><u>Home</u></a>
              <a href="/contact.html">Contact</a>
              <a href="#">About</a>
              <a href="/sign-in.html">Sign Up</a>
            </nav>
          </div>
          <div class="nav-search">
            <input type="search" placeholder="  Search here" class="search-bar" />
            <div class="search-icon">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="cart"><i class="fa-solid fa-cart-shopping"></i></div>
          </div>
        </div>
      </header>

      <main>
        <div class="outer-box">
            <div class="left-box">
                <h3>Billing Details</h3>
                <form action="checkout.php" method="POST">
                    <label for="firstname">
                        <h6>First Name</h6>
                    </label>
                    <input type="text" name="firstname" id="firstname" required>
                    <label for="lastname">
                        <h6>Last Name</h6>
                    </label>
                    <input type="text" name="lastname" id="lastname" required>
                    <label for="streetaddress">
                        <h6>Street Address</h6>
                    </label>
                    <input type="text" name="address" id="streetaddress" required>
                    <label for="apartmentfloor">
                        <h6>Apartment floor, Wing, etc</h6>
                    </label>
                    <input type="text" name="apartmentfloor" id="apartmentfloor">
                    <label for="town-city">
                        <h6>Town / City</h6>
                    </label>
                    <input type="text" name="city" id="town-city" required>
                    <label for="pincode">
                        <h6>Pincode</h6>
                    </label>
                    <input type="text" name="pincode" id="pincode" required>
                    <label for=" phone_no">
                        <h6>Phone no.</h6>
                    </label>
                    <input type="tel" name="phone" id="phone_no" required>
                    <label for="email">
                        <h6>Email Address</h6>
                    </label>
                    <input type="email" name="email" id="email" required>
                    <div class="save-information">
                      <input type="checkbox" id="information-save">
                      <label for="information-save"><h6>Save this information for faster check-out next time</h6></label>
                    </div>
                    <div class="confirm-purchase">
                      <button type="submit">Confirm Purchase</button>
                    </div>
                </form>
            </div>
            <div class="right-box">
                <!-- You can add additional content here, like order summary -->
            </div>
        </div>
      </main>

      <footer>
        <div class="footer-outer">
          <div class="footer-inner">
            <div class="footer-1">
              <h1>Apn-E-Dukaan</h1>
              <h6>Subscribe</h6>
              <p>Get E-mail updates about our latest
                shop and latest offer.</p>
              <input type="email" placeholder="E-mail">
            </div>
            <div class="footer-2">
              <h3>Account</h3>
              <ul>
                <li><a href="#">Cart</a></li>
                <li><a href="#">Wishlist</a></li>
                <li><a href="#">Sign-in</a></li>
                <li><a href="#">Track my order</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </div>
            <div class="footer-3">
              <h3>Quick Link</h3>
              <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms Of Use</a></li>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
            <div class="footer-4">
              <h3>Follow us on: </h3>
              <a href="https://www.instagram.com/accounts/login/?hl=en"><i class="fa-brands fa-instagram"></i></a>
              <a href="https://www.facebook.com/login/" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="https://x.com/i/flow/login"><i class="fa-brands fa-x-twitter"></i></a>
              <a href="https://www.linkedin.com/login"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
          </div>
          <div class="copyright">
            <i class="fa-regular fa-copyright"></i>
            <p> 2024, Apn-E-Dukaan.com, All Rights Reserved </p>
          </div>
        </div>
      </footer>
</body>
</html>
