<?php
session_start();

// Define the list of products
$products = [
    'Product A' => 10,
    'Product B' => 20,
    'Product C' => 15,
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($products as $product => $price) {
        if (isset($_POST[$product]) && is_numeric($_POST[$product])) {
            $quantity = intval($_POST[$product]);
            if ($quantity > 0) {
                $_SESSION['cart'][$product] = $quantity;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Selection</title>
</head>
<body>
    <h1>Product Selection</h1>
    <form method="post">
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
            <?php foreach ($products as $product => $price): ?>
                <tr>
                    <td><?php echo $product; ?></td>
                    <td><?php echo $price; ?></td>
                    <td><input type="number" name="<?php echo $product; ?>" min="0" value="0"></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <input type="submit" value="Add to Cart">
    </form>
    <a href="22a.php">View Cart</a>
</body>
</html>
