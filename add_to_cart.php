<?php
session_start();
header('Content-Type: application/json'); // Set the content type to JSON

// Get the POST data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id'], $data['quantity'])) {
    $productId = $data['id'];
    $quantity = (int)$data['quantity'];

    // Initialize cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if product is already in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $productId) {
            $item['quantity'] += $quantity; // Update quantity
            $found = true;
            break;
        }
    }

    // If not found, add new product to the cart
    if (!$found) {
        // Fetch product name and price from database
        $conn = new mysqli('localhost', 'root', '', 'ict312_website');

        // Check connection
        if ($conn->connect_error) {
            echo json_encode(['success' => false, 'message' => 'Database connection failed.']);
            exit();
        }

        $stmt = $conn->prepare("SELECT name, price FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $productResult = $stmt->get_result();

        if ($productData = $productResult->fetch_assoc()) {
            $_SESSION['cart'][] = [
                'id' => $productId,
                'name' => $productData['name'],
                'price' => (float)$productData['price'],
                'quantity' => $quantity,
            ];
            $stmt->close();
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Product not found.']);
        }

        $conn->close();
    } else {
        echo json_encode(['success' => true]); // Already updated quantity
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}
