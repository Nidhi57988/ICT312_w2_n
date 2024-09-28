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
            if ($result->num_rows > 0) {
                // Output the product details
                $row = $result->fetch_assoc();
                
                // Get all images from the comma-separated string
                $images = explode(',', $row['image_main']);
                $images = explode(',', $row['image_1']);
                $images = explode(',', $row['image_2']);
                $images = explode(',', $row['image_3']);
                $images = explode(',', $row['image_4']);
                
                // echo "<div class='product-card'>";
                
                // Display all images in a loop
                
                // foreach ($images as $image) {
                //  echo "<img src='images/products/" . $image . "' alt='" . $row['name'] . "' id='product-main-image'>";
                // }

}
        ?>

<img src="<?php echo $row['image_main']; ?>" alt="" class="product-image-main" data-image="<?php echo $row['image_main']; ?>">


    <?php
    // Fetch product details by ID using a prepared statement
            $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Fetch the product row if it exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Product not found.");
    }

    $stmt->close();
    $conn->close();

    ?>

                </div>
            


                    <div class="product-image-slider">
                    <img src="<?php echo $row['image_1']; ?>" alt="" class="image-list" data-image="<?php echo $row['image_1']; ?>">
                    <img src="<?php echo $row['image_2']; ?>" alt="" class="image-list" data-image="<?php echo $row['image_2']; ?>">
                    <img src="<?php echo $row['image_3']; ?>" alt="" class="image-list" data-image="<?php echo $row['image_3']; ?>">
                    <img src="<?php echo $row['image_4']; ?>" alt="" class="image-list" data-image="<?php echo $row['image_4']; ?>">
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

            <h3>Choose Colour</h3>
            <div class="color-options">
                <!-- <span>Colour:</span> <span class="color-selected"><?php echo $product['color']; ?></span> -->
            </div>
            <div class="product-quantity">
                <input type="number" value="1" min="1" class="quantity-input">
            </div>

            <button type='button' class='product-page-button'>Add to Cart</button>
        </div>

    </div>



    </div>
</body>
</html>
