<?php
        // Get the product ID from the URL
        if (isset($_GET['id'])) {
            $product_id = $_GET['id'];

            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'ict312_website');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch product details by ID
            $sql = "SELECT * FROM products WHERE id = $product_id";
            $result = $conn->query($sql);
        }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id='product'>
    <div class="product-container">
        <div class="left-section">
            <div class="product-image">
                <div class="product-image-main">
                <?php
                    // Fetch product details by ID using a prepared statement
                    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
                    $stmt->bind_param("i", $product_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Fetch the product row if it exists
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();

                        // Get all images
                        $images = [
                            $row['image_1'],
                            $row['image_2'],
                            $row['image_3'],
                            $row['image_4']
                        ];
                    ?>
                        <img src="<?php echo $row['image_main']; ?>" alt="" id="product-main-image" class="product-image-main">

                        <div class="product-image-slider">
                            <?php foreach ($images as $image): ?>
                                <img src="<?php echo $image; ?>" alt="" class="image-list" data-image="<?php echo $image; ?>">
                            <?php endforeach; ?>
                        </div>

                    <?php
                    } else {
                        die("Product not found.");
                    }

                    // Close the statement and connection
                    $stmt->close();
                    $conn->close();
                ?>

            </div>
            </div>

        </div>

        <div class="right-section">
            <span class="badge">NEW</span>
            <h1 class="product-name"><?php echo $row['name']; ?></h1>


            <div class="rating">
                <span class="stars"><?php echo str_repeat('★', $row['rating']); ?></span> 
                <span class="rating-number"><?php echo $row['rating']; ?> (<?php echo $row['rating_count']; ?>)</span>
            </div>

            <p class="product-price">$<?php echo $row['price']; ?></p>
            <!-- <p class="product-code"><?php echo $product['code']; ?></p> -->
            <p class="product-desc"><?php echo $row['description']; ?></p>



            <!-- <h4>Choose Colour:</h4> -->
            <div class="color-options">
                 <?php
                 echo "<p>Available Colors: ";
                    $colors = array_filter([$row['color_1'], $row['color_2'], $row['color_3'], $row['color_4']]);
                    echo implode(", ", $colors);
                    echo "</p>"; ?>
                    
            </div>



            <div class="product-quantity">
                <h4>Quantity:</h4>
                <input type="number" value="1" min="1" class="quantity-input">
            </div>

            <button type='button' class='product-page-button'>Add to Cart</button>

            <div class="secure-checkout">
                    <p style="font-size: 0.9rem;">Guaranteed Safe Checkout with...</p>
                   <img src="https://www.ozquilts.com.au/images/companies/1/untitled%20folder/paypal-logo.png?1652491832766" alt="Payment options">
                </div>
        </div>

    </div>



    </div>
    <script src="script/productimage.js"></script>
</body>
</html>
