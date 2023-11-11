<?php
// Replace with your database connection information
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$database = "your_database_name";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to print the salary statement for a specific emp_no
function printSalaryStatement($emp_no) {
    global $conn;
    
    // Query to fetch employee and salary details
    $sql = "SELECT e.emp_no, e.emp_name, e.address, e.phone, d.dept_name, s.Basic, s.HR, s.TA, s.DA
            FROM Emp e
            JOIN Salary s ON e.salary_id = s.salary_id
            JOIN Dept d ON e.dept_no = d.dept_no
            WHERE e.emp_no = $emp_no";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Print the salary statement
        echo "Employee Number: " . $row["emp_no"] . "<br>";
        echo "Employee Name: " . $row["emp_name"] . "<br>";
        echo "Address: " . $row["address"] . "<br>";
        echo "Phone: " . $row["phone"] . "<br>";
        echo "Department: " . $row["dept_name"] . "<br>";
        echo "Basic Salary: $" . $row["Basic"] . "<br>";
        echo "HR Allowance: $" . $row["HR"] . "<br>";
        echo "TA Allowance: $" . $row["TA"] . "<br>";
        echo "DA Allowance: $" . $row["DA"] . "<br>";
    } else {
        echo "Employee with emp_no $emp_no not found.";
    }
}

// Specify the emp_no for which you want to print the salary statement
$emp_no_to_print = 123; // Replace with the desired emp_no

// Call the function to print the salary statement
printSalaryStatement($emp_no_to_print);

// Close the database connection
$conn->close();
?>
