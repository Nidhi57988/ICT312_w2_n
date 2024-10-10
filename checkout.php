<?php
session_start();

// Database connection
$host = 'localhost';
$db = 'ict312_website';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if cart is not empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}

// Calculate total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}

// Handle form submission for order processing
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $date = trim($_POST['date']);

    // Validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($address)) {
        $errors[] = "Address is required.";
    }
    if (empty($date)) {
        $errors[] = "Delivery date is required.";
    }

    // If no errors, process the order
    if (empty($errors)) {
        // Save order to the database
        try {
            $stmt = $pdo->prepare("INSERT INTO orders (name, email, address, delivery_date, total_price) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $email, $address, $date, $totalPrice]);

            // Clear cart
            unset($_SESSION['cart']);
            echo "<script>alert('Order Confirmed!'); window.location.href='homepage.php';</script>";
            exit();
        } catch (PDOException $e) {
            $errors[] = "Error processing order: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
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
        <h1>Checkout</h1>
        <div class="checkout-content">
            <div class="cart-summary">
                <h2>Cart Items</h2>
                <ul>
                    <?php foreach ($_SESSION['cart'] as $item): ?>
                        <li>
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
                            <div>
                                <strong><?php echo htmlspecialchars($item['name']); ?></strong><br>
                                $<?php echo number_format($item['price'], 2); ?> x 
                                <?php echo htmlspecialchars($item['quantity']); ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <h3>Total: $<?php echo number_format($totalPrice, 2); ?></h3>
            </div>

            <form class="billing-form" method="POST">
                <h2>Billing Information</h2>
                <?php if (!empty($errors)): ?>
                    <div class="error">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required placeholder="e.g., John Doe">
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="e.g., john@example.com">
                
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required placeholder="e.g., 123 Main St, City, State">
                
                <label for="date">Delivery Date:</label>
                <input type="date" id="date" name="date" required>
                
                <button type="submit">Complete Purchase</button>
            </form>
        </div>

        <button class="back-button" onclick="window.location.href='index.php'">Continue Shopping</button>

        <div class="secure-checkout">
            <p>Guaranteed Safe Checkout with</p>
            <img src="https://www.ozquilts.com.au/images/companies/1/untitled%20folder/paypal-logo.png?1652491832766" alt="Payment options">
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
</body>
</html>
