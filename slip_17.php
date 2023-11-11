<?php
// Define variables to store form input and validation messages
$name = $course = $mobile = $registration_number = '';
$nameErr = $courseErr = $mobileErr = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the name
    if (empty($_POST['name'])) {
        $nameErr = 'Name is required';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
        $nameErr = 'Name should contain only letters and spaces';
    } else {
        $name = $_POST['name'];
    }

    // Validate the course
    if (empty($_POST['course'])) {
        $courseErr = 'Course is required';
    } else {
        $course = $_POST['course'];
    }

    // Validate the mobile number
    if (empty($_POST['mobile'])) {
        $mobileErr = 'Mobile number is required';
    } elseif (!preg_match("/^\d{10}$/", $_POST['mobile'])) {
        $mobileErr = 'Mobile number should contain 10 digits';
    } else {
        $mobile = $_POST['mobile'];
    }

    // If all input is valid, generate a registration number and provide feedback
    if (empty($nameErr) && empty($courseErr) && empty($mobileErr)) {
        // Generate a unique registration number (you can implement your own logic)
        $registration_number = uniqid('REG');
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Registration</title>
</head>
<body>
    <h2>Course Registration Form</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr; ?></span>
        <br><br>

        <label for="course">Course to be admitted:</label>
        <input type="text" name="course" value="<?php echo $course; ?>">
        <span class="error"><?php echo $courseErr; ?></span>
        <br><br>

        <label for="mobile">Mobile Number:</label>
        <input type="text" name="mobile" value="<?php echo $mobile; ?>">
        <span class="error"><?php echo $mobileErr; ?></span>
        <br><br>

        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    if (!empty($registration_number)) {
        echo "<h3>Registration Successful!</h3>";
        echo "Registration Number: $registration_number<br>";
        echo "Name: $name<br>";
        echo "Course: $course<br>";
        echo "Mobile Number: $mobile<br>";
    }
    ?>

</body>
</html>
