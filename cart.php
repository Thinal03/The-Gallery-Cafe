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

// Handle adding items to the cart
if (isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $session_id = session_id();

    $sql = "SELECT * FROM cart_items WHERE product_name = '$product_name' AND session_id = '$session_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql = "UPDATE cart_items SET quantity = quantity + 1 WHERE product_name = '$product_name' AND session_id = '$session_id'";
    } else {
        $sql = "INSERT INTO cart_items (product_name, product_price, product_image, quantity, session_id) VALUES ('$product_name', '$product_price', '$product_image', 1, '$session_id')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Item added to cart";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle fetching cart items
if (isset($_POST['action']) && $_POST['action'] === 'fetch_cart') {
    $session_id = session_id();

    $sql = "SELECT * FROM cart_items WHERE session_id = '$session_id'";
    $result = $conn->query($sql);

    $cart_items = array();
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
    }

    echo json_encode($cart_items);
}

// Handle updating cart item quantities
if (isset($_POST['action']) && $_POST['action'] === 'update_cart') {
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $session_id = session_id();

    if ($quantity > 0) {
        $sql = "UPDATE cart_items SET quantity = '$quantity' WHERE product_name = '$product_name' AND session_id = '$session_id'";
    } else {
        $sql = "DELETE FROM cart_items WHERE product_name = '$product_name' AND session_id = '$session_id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Cart updated";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle checkout action
if (isset($_POST['action']) && $_POST['action'] === 'checkout') {
    $session_id = session_id();

    $sql = "SELECT * FROM cart_items WHERE session_id = '$session_id'";
    $result = $conn->query($sql);

    $cart_items = array();
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
    }

    if (count($cart_items) > 0) {
        $sql = "INSERT INTO orders (session_id, order_date) VALUES ('$session_id', NOW())";
        if ($conn->query($sql) === TRUE) {
            $order_id = $conn->insert_id;
            foreach ($cart_items as $item) {
                $product_name = $item['product_name'];
                $product_price = $item['product_price'];
                $product_image = $item['product_image'];
                $quantity = $item['quantity'];

                $sql = "INSERT INTO order_items (order_id, product_name, product_price, product_image, quantity) VALUES ('$order_id', '$product_name', '$product_price', '$product_image', '$quantity')";
                $conn->query($sql);
            }

            $sql = "DELETE FROM cart_items WHERE session_id = '$session_id'";
            $conn->query($sql);

            echo "Checkout successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Your cart is empty";
    }
}

$conn->close();
?>
