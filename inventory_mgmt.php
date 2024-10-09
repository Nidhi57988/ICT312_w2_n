<?php
session_start();

// DB conn
$host = 'localhost';
$db = 'ICT312_website';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Database Connection Failed: ' . $e->getMessage());
}

// Add or update inventory item
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $quantity = $_POST['quantity'];
    $image_main = $_POST['image_main'];
    $image_1 = $_POST['image_1'];
    $image_2 = $_POST['image_2'];
    $image_3 = $_POST['image_3'];
    $image_4 = $_POST['image_4'];
    $color_1 = $_POST['color_1'];
    $color_2 = $_POST['color_2'];
    $color_3 = $_POST['color_3'];
    $color_4 = $_POST['color_4'];

    if (isset($_POST['add_item'])) {
        // Insert new item
        $sql = "INSERT INTO products (name, price, category, description, rating, quantity, image_main, image_1, image_2, image_3, image_4, color_1, color_2, color_3, color_4) 
                VALUES (:name, :price, :category, :description, :rating, :quantity, :image_main, :image_1, :image_2, :image_3, :image_4, :color_1, :color_2, :color_3, :color_4)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':category' => $category,
            ':description' => $description,
            ':rating' => $rating,
            ':quantity' => $quantity,
            ':image_main' => $image_main,
            ':image_1' => $image_1,
            ':image_2' => $image_2,
            ':image_3' => $image_3,
            ':image_4' => $image_4,
            ':color_1' => $color_1,
            ':color_2' => $color_2,
            ':color_3' => $color_3,
            ':color_4' => $color_4
        ]);
        $_SESSION['message'] = "New record created successfully";
    } elseif (isset($_POST['edit_item'])) {
        // Update existing item
        $product_id = $_POST['product_id'];
        $sql = "UPDATE products SET name = :name, price = :price, category = :category, description = :description, rating = :rating, quantity = :quantity, image_main = :image_main, image_1 = :image_1, image_2 = :image_2, image_3 = :image_3, image_4 = :image_4, color_1 = :color_1, color_2 = :color_2, color_3 = :color_3, color_4 = :color_4 WHERE id = :product_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':category' => $category,
            ':description' => $description,
            ':rating' => $rating,
            ':quantity' => $quantity,
            ':image_main' => $image_main,
            ':image_1' => $image_1,
            ':image_2' => $image_2,
            ':image_3' => $image_3,
            ':image_4' => $image_4,
            ':color_1' => $color_1,
            ':color_2' => $color_2,
            ':color_3' => $color_3,
            ':color_4' => $color_4,
            ':product_id' => $product_id
        ]);
        $_SESSION['message'] = "Record updated successfully";
    }

    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit();
}

// Delete inventory item
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    $_SESSION['message'] = "Record deleted successfully";

    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit();
}

$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

// Retrieve inventory items
$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Inventory Management</title>
    <link rel="stylesheet" type="text/css" href="inventory_mgmt.css">
</head>

<body>
    <div id="popup-message" class="popup-message"></div>
    <div class="container">
        <h1>Inventory Management</h1>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="text" name="price" placeholder="Price" required>
            <input type="text" name="category" placeholder="Category" required>
            <input type="text" name="description" placeholder="Description" required>
            <input type="number" step="0.1" name="rating" placeholder="Rating" required>
            <input type="number" name="quantity" placeholder="Quantity" required>
            <input type="text" name="image_main" placeholder="Main Image URL" required>
            <input type="text" name="image_1" placeholder="Image 1 URL">
            <input type="text" name="image_2" placeholder="Image 2 URL">
            <input type="text" name="image_3" placeholder="Image 3 URL">
            <input type="text" name="image_4" placeholder="Image 4 URL">
            <input type="text" name="color_1" placeholder="Color 1">
            <input type="text" name="color_2" placeholder="Color 2">
            <input type="text" name="color_3" placeholder="Color 3">
            <input type="text" name="color_4" placeholder="Color 4">
            <button type="submit" name="add_item">Add Item</button>
        </form>

        <div class="inventory-container">
            <?php if ($products): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo htmlspecialchars($product['image_main']); ?>" alt="Product Image">
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?php echo htmlspecialchars($product['name']); ?></h3>
                            <p class="product-price">$<?php echo htmlspecialchars($product['price']); ?></p>
                            <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                            <div class="product-stock-info">
                                <p><span>Quantity:</span> <?php echo htmlspecialchars($product['quantity']); ?></p>
                                <p><span>Rating:</span> <?php echo htmlspecialchars($product['rating']); ?></p>
                            </div>
                            <div class="product-additional-info">
                                <details>
                                    <summary>More Details</summary>
                                    <p><span>Category:</span> <?php echo htmlspecialchars($product['category']); ?></p>
                                    <p><span>Colors:</span> <?php echo htmlspecialchars($product['color_1']); ?>, <?php echo htmlspecialchars($product['color_2']); ?>, <?php echo htmlspecialchars($product['color_3']); ?>, <?php echo htmlspecialchars($product['color_4']); ?></p>
                                </details>
                            </div>
                            <div class="product-action">
                                <button class="edit-button" onclick="openEditModal(<?php echo htmlspecialchars(json_encode($product)); ?>)">Edit</button>
                                <a href="?delete=<?php echo $product['id']; ?>" class="delete-button">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-items">No items found</div>
            <?php endif; ?>
        </div>

        <div id="edit-modal" class="modal">
            <div class="modal-content">
                <span class="close-button" onclick="closeEditModal()">&times;</span>
                <h2>Edit Product</h2>
                <form id="edit-form" method="POST" action="">
                    <input type="hidden" name="product_id" id="edit-product-id">
                    <input type="text" name="name" id="edit-name" placeholder="Product Name" required>
                    <input type="text" name="price" id="edit-price" placeholder="Price" required>
                    <input type="text" name="category" id="edit-category" placeholder="Category" required>
                    <input type="text" name="description" id="edit-description" placeholder="Description" required>
                    <input type="number" step="0.1" name="rating" id="edit-rating" placeholder="Rating" required>
                    <input type="number" name="quantity" id="edit-quantity" placeholder="Quantity" required>
                    <input type="text" name="image_main" id="edit-image-main" placeholder="Main Image URL" required>
                    <input type="text" name="image_1" id="edit-image-1" placeholder="Image 1 URL">
                    <input type="text" name="image_2" id="edit-image-2" placeholder="Image 2 URL">
                    <input type="text" name="image_3" id="edit-image-3" placeholder="Image 3 URL">
                    <input type="text" name="image_4" id="edit-image-4" placeholder="Image 4 URL">
                    <input type="text" name="color_1" id="edit-color-1" placeholder="Color 1">
                    <input type="text" name="color_2" id="edit-color-2" placeholder="Color 2">
                    <input type="text" name="color_3" id="edit-color-3" placeholder="Color 3">
                    <input type="text" name="color_4" id="edit-color-4" placeholder="Color 4">
                    <button type="submit" name="edit_item">Save Changes</button>
                    <button type="button" onclick="closeEditModal()">Cancel</button>
                </form>
            </div>
        </div>

        <script>
            function openEditModal(product) {
                document.getElementById('edit-product-id').value = product.id;
                document.getElementById('edit-name').value = product.name;
                document.getElementById('edit-price').value = product.price;
                document.getElementById('edit-category').value = product.category;
                document.getElementById('edit-description').value = product.description;
                document.getElementById('edit-rating').value = product.rating;
                document.getElementById('edit-quantity').value = product.quantity;
                document.getElementById('edit-image-main').value = product.image_main;
                document.getElementById('edit-image-1').value = product.image_1;
                document.getElementById('edit-image-2').value = product.image_2;
                document.getElementById('edit-image-3').value = product.image_3;
                document.getElementById('edit-image-4').value = product.image_4;
                document.getElementById('edit-color-1').value = product.color_1;
                document.getElementById('edit-color-2').value = product.color_2;
                document.getElementById('edit-color-3').value = product.color_3;
                document.getElementById('edit-color-4').value = product.color_4;

                document.getElementById('edit-modal').style.display = 'flex';
            }

            function closeEditModal() {
                document.getElementById('edit-modal').style.display = 'none';
            }
        </script>

        <script>
            function showPopup(message, type) {
                const popup = document.getElementById('popup-message');
                popup.textContent = message;
                popup.className = `popup-message ${type}`;
                popup.style.display = 'block';

                setTimeout(() => {
                    popup.style.display = 'none';
                }, 3000);
            }

            window.onload = () => {
                const message = "<?php echo addslashes($message); ?>";
                if (message) {
                    showPopup(message, 'success');
                }
            };
        </script>
</body>

</html>
