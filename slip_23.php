<!DOCTYPE html>
<html>
<head>
    <title>Customer Bill</title>
</head>
<body>
    <?php
    // Step 3: Process the submitted data from the customer form
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["customer_submit"])) {
        $customer_name = $_POST["customer_name"];
        $customer_address = $_POST["customer_address"];
        $customer_phno = $_POST["customer_phno"];

        // Step 4: Process the submitted data from the product form
        if (isset($_POST["product_submit"])) {
            $product_name = $_POST["product_name"];
            $product_qty = $_POST["product_qty"];
            $product_rate = $_POST["product_rate"];
        }

        // Step 5: Calculate the total amount
        $total_amount = $product_qty * $product_rate;
    }
    ?>
    <!-- Step 1: Create a form to accept customer information -->
    <form method="post" action="">
        <h2>Customer Information:</h2>
        Name: <input type="text" name="customer_name"><br>
        Address: <input type="text" name="customer_address"><br>
        Phone Number: <input type="text" name="customer_phno"><br>
        <input type="submit" name="customer_submit" value="Submit Customer Information">
    </form>

    <?php
    // Step 2: Create a form to accept product information
    if (isset($_POST["customer_submit"])) {
        echo "<form method='post' action=''>";
        echo "<h2>Product Information:</h2>";
        echo "Product Name: <input type='text' name='product_name'><br>";
        echo "Quantity: <input type='number' name='product_qty'><br>";
        echo "Rate: <input type='number' name='product_rate'><br>";
        echo "<input type='submit' name='product_submit' value='Submit Product Information'>";
        echo "</form>";
    }

    // Step 5: Display the bill
    if (isset($_POST["product_submit"])) {
        echo "<h2>Customer Bill:</h2>";
        echo "Customer Information:<br>";
        echo "Name: $customer_name<br>";
        echo "Address: $customer_address<br>";
        echo "Phone Number: $customer_phno<br>";
        echo "Product Information:<br>";
        echo "Product Name: $product_name<br>";
        echo "Quantity: $product_qty<br>";
        echo "Rate: $product_rate<br>";
        echo "Total Amount: $total_amount<br>";
    }
    ?>
</body>
</html>
