<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<header>
        <div class="header-container">
            <img src="images/logo.jpg" alt="HI-TECH Logo" class="logo">
            <nav class="nv00-gnb">
                <ul class="nav-links">
                    <li class="dropdown">
                        <a href="homepage.php" class="nv00-gnb__l0-menu-link">Home</a>
                        <div class="dropdown-content">
                            <p>Latest News</p>
                            <p>Our Mission</p>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="index.php" class="nv00-gnb__l0-menu-link">Products</a>
                        <div class="dropdown-content">
                            <p>Gadgets</p>
                            <p>Accessories</p>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="services.php" class="nv00-gnb__l0-menu-link">Services</a>
                        <div class="dropdown-content">
                            <p>Email Support</p>
                            <p>FAQ</p>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="contact.php" class="nv00-gnb__l0-menu-link">Contact Us</a>
                        <div class="dropdown-content">
                            <p>Email Support</p>
                            <p>FAQ</p>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="header-icons">
                <a href="signin.php" aria-label="Sign In" title="Sign In"><i class="fas fa-user-circle"></i></a>
                <a href="checkout.php" aria-label="Shopping Cart" title="Shopping Cart"><i class="fas fa-shopping-basket"></i></a>
                <a href="#" aria-label="Search" title="Search" id="search-icon"><i class="fas fa-search"></i></a>
                <div class="search-bar" id="search-bar">
                    <input type="text" placeholder="Search...">
                </div>
            </div>
        </div>
    </header>
<div class="container">
        <h1 class="heading">PRODUCT LIST</h1>

        <!-- Search Bar -->
        <div class="listing-search-bar">
            <input type="text" id="searchInput" placeholder="Search Products">
        </div>

        <!-- Category Bar -->
        <div class="category-bar">
            <div class="category-item">
                <a href="?category=Smart%20Phones">
                    <img src="images/products/1-2.png" alt="Smartphones" class="category">
                    <p>Smartphones</p>
                </a>
            </div>
            <div class="category-item">
                <a href="?category=Headphones">
                    <img src="images/products/10-4.png" alt="Headphones" class="category">
                    <p>Headphones</p>
                </a>
            </div>
            <div class="category-item">
                <a href="?category=Televisions">
                    <img src="images/products/18-3.png" alt="Televisions" class="category">
                    <p>Televisions</p>
                </a>
            </div>
            <div class="category-item">
                <a href="?category=Smart%20Watches">
                    <img src="images/products/26-2.png" alt="Smartwatches" class="category">
                    <p>Smartwatches</p>
                </a>
            </div>
            <div class="category-item">
                <a href="?category=Laptops">
                    <img src="images/products/33-1.png" alt="Laptops" class="category">
                    <p>Laptops</p>
                </a>
            </div>
            <div class="category-item">
                <a href="?category=Computers">
                    <img src="images/products/41-2.png" alt="Computers" class="category">
                    <p>Computers</p>
                </a>
            </div>
        </div>

        <!-- Product List -->
        <div id="productList" class="product-list">
            <?php
            // Database connection settings
            $servername = "localhost";  // Adjust if needed
            $username = "root";         // Adjust to your MySQL username
            $password = "";             // Adjust to your MySQL password
            $dbname = "ICT312_website"; // Ensure this matches your database name

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to fetch all products
            $sql = "SELECT * FROM products";

            // Category filtering
            if (isset($_GET['category'])) {
                $category = $conn->real_escape_string($_GET['category']);
                $sql = "SELECT * FROM products WHERE category='$category'";
            }

            // Execute the query and get all products
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Store all fetched products into an array
                $products = [];
                while ($row = $result->fetch_assoc()) {
                    $products[] = $row;
                }

                // // Shuffle the products array to display them randomly
                // shuffle($products);

                // // Limit the number of displayed products to 8 (or as required)
                // $products = array_slice($products, 0, 8);

                // Loop through and display up to 8 products
                foreach ($products as $row) {
                    // Assuming product images are saved as {product-id}-1.png, etc.
                    $product_id = $row['id'];  // Product ID

                    $image_main = "images/products/{$product_id}-1.png";

                    // Display product card with "Buy Now" and "View Details" buttons
                    echo "<div class='product-card'>";
                    echo "<img src='" . $image_main . "' alt='" . $row['name'] . "' class='productlisting-image'>";
                    echo "<div class='Name'>" . $row['name'] . "</div>";
                    echo "<div class='productlisting-price'>$" . $row['price'] . "</div>";
                    // echo "<a href='#' class='buy-now'>Buy Now</a>";
                    echo "<a href='product_db.php?id=" . $row['id'] . "' class='view-details'>View Details</a>";
                    echo "</div>";
                }
            } else {
                echo "No products found.";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>
        
        
    <footer>
    <div class="footer-content">
        <nav aria-label="Footer Navigation" class="footer-nav">
            <ul class="footer-links">
                <li><a href="#">Sustainability</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Service</a></li>
            </ul>
        </nav>
        <p>&copy; 2024 HI-TECH. All Rights Reserved.</p>
        <div class="footer-icons">
            <a href="#" aria-label="Facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Twitter" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="LinkedIn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</footer>
    <script src="script/productlisting.js"></script>
</body>
</html>
