<?php
// Start the session
session_start();

// Function to check if the session has expired
function isSessionExpired($timeout = 10) {
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > $timeout)) {
        return true;
    }
    $_SESSION['LAST_ACTIVITY'] = time();
    return false;
}

// Function to display a warning message
function displayWarning($message) {
    echo "<p style='color: red;'>$message</p>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // Handle the login form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Add your authentication logic here (e.g., checking credentials)
        if ($username == 'your_username' && $password == 'your_password') {
            // User is authenticated, set a session variable to indicate the login
            $_SESSION['authenticated'] = true;
        } else {
            displayWarning("Invalid username or password.");
        }
    } elseif (isset($_POST['details'])) {
        // Handle the user details form
        if (!isset($_SESSION['authenticated'])) {
            displayWarning("Session expired. Please log in again.");
        } else {
            $name = $_POST['name'];
            $city = $_POST['city'];
            $phoneno = $_POST['phoneno'];

            // Process user details here

            // Unset the authenticated session variable after details submission
            unset($_SESSION['authenticated']);

            echo "User details submitted successfully.<br>";
            echo "Name: $name<br>";
            echo "City: $city<br>";
            echo "Phone Number: $phoneno<br>";
        }
    }
}

// Check if the session has expired
if (isSessionExpired()) {
    session_unset();
    session_destroy();
    displayWarning("Session expired. Please log in again.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login and User Details Form</title>
</head>
<body>
    <?php if (!isset($_SESSION['authenticated'])): ?>
        <h2>Login</h2>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" name="login" value="Login">
        </form>
    <?php else: ?>
        <h2>User Details</h2>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br><br>
            <label for="city">City:</label>
            <input type="text" name="city" required><br><br>
            <label for="phoneno">Phone Number:</label>
            <input type="text" name="phoneno" required><br><br>
            <input type="submit" name="details" value="Submit User Details">
        </form>
    <?php endif; ?>
</body>
</html>
