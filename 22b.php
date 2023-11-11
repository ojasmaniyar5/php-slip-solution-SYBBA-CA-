<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: 22.php');
    exit();
}

$pageTotal = 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $product => $quantity): ?>
            <tr>
                <td><?php echo $product; ?></td>
                <td><?php echo $quantity; ?></td>
                <td><?php echo $quantity * $products[$product]; ?></td>
            </tr>
            <?php $pageTotal += $quantity * $products[$product]; ?>
        <?php endforeach; ?>
    </table>
    <p>Page Total: $<?php echo $pageTotal; ?></p>
    <a href="22.php">Continue Shopping</a>
    <a href="22a.php">Back to Cart</a>
</body>
</html>
