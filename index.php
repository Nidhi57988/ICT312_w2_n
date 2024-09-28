<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <div class="container">
        <h1 class="heading">Product Listing Page</h1>

        <!-- Product Listing Section -->
        <div class="product-list">
            <?php
            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'ict312_website');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch all products
            $sql = "SELECT id, name, image_main, description, price FROM products";
            $result = $conn->query($sql);

            // Check if the query executed successfully
            if ($result === false) {
                // Display SQL error for debugging (in production, this should be logged instead of displayed)
                die("SQL Error: " . $conn->error);  
            }

           if ($result->num_rows > 0) {
    // Output each product
    while ($row = $result->fetch_assoc()) {
        // Check if images exist in the row
        if (isset($row['image_main'])) {
            $images = explode(',', $row['image_main']);
            $first_image = $images[0];

            echo "<div class='product-card'>";

            echo "<a href='product_db.php?id=" . $row['id'] . "'>";


            echo "<img src='images/products/" . $first_image . "' alt='Product Image' class='product_image' />";

            echo "</a>";

            // echo "<div class='product-description'>" . $row['description'] . "</div>";
            echo "<div class='product-price'>$" . $row['price'] . "</div>";
            
            echo "<a href='product_db.php?id=" . $row['id'] . "' class='buy-now'>View Details</a>";
            echo "</div>";
        } else {
            echo "No images available for this product.";
        }
    }
} else {
    echo "No products found.";
}


            $conn->close();
            ?>
        </div>
    </div>
    <script src="script/productlisting.js"></script>
</body>
</html>
