<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_gallery_cafe";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cart items
$sql_cart = "SELECT * FROM cart_items";
$result_cart = $conn->query($sql_cart);

// Fetch orders
$sql_orders = "SELECT * FROM orders";
$result_orders = $conn->query($sql_orders);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

</head>
<body>

    
    <h2>Food oders</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>User ID</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result_cart->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['product_price']; ?></td>
                    <td><img src="<?php echo $row['product_image']; ?>" alt="Product Image" width="100"></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['session_id']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php $conn->close(); ?>
</body>
</html>
