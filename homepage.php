<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>HI-TECH</title>
</head>
<body>
    <!-- Header Section with Logo -->
    <header>
        <div class="header--logo">
            <img src="images/logo.jpeg" alt="HI-TECH Logo" class="logo">
            <nav aria-label="Main Navigation">
                <ul class="nav-links">
                    <li><a href="#">Home</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle">Products</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </nav>
            <div class="header-icons">
                <a href="#" aria-label="Sign In" title="Sign In"><i class="fas fa-user-circle"></i></a>
                <a href="#" aria-label="Shopping Cart" title="Shopping Cart"><i class="fas fa-shopping-basket"></i></a>
                <a href="#" aria-label="Search" title="Search"><i class="fas fa-search"></i></a>
                <input type="text" placeholder="Search..." class="search-bar">
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-slideshow">
            <div class="hero-images">
                <img src="C:\wamp64\www\HI-TECH\testing\images\iphone16.jpg" alt="Latest iPhone model" class="hero-image active">
                <img src="C:\wamp64\www\HI-TECH\testing\images\asus rog.jpg" alt="ASUS ROG" class="hero-image">
                <img src="C:\wamp64\www\HI-TECH\testing\images\tv.jpg" alt="Latest TV Model" class="hero-image">
            </div>
        </div>
        <div class="hero-content">
            <h1>IPHONE 16 PRO</h1>
            <p>Discover the latest in cutting-edge technology.</p>
            <button class="btn-hero" type="button" onclick="location.href='#';">Explore Now</button>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <nav aria-label="Footer Navigation">
                <ul class="footer-links">
                    <li>
                        <a href="#" class="dropdown-toggle">Products</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">Support</a>
                        <ul class="dropdown-menu">
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Customer Service</a></li>
                            <li><a href="#">Returns</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Sustainability</a></li>
                    <li><a href="#">Service</a></li>
                </ul>
            </nav>
        </div>
        <p>&copy; 2024 HI-TECH. All Rights Reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
