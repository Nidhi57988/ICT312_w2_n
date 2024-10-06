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
    <header>
        <div class="header-container">
            <img src="images/logo.jpeg" alt="HI-TECH Logo" class="logo">
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
                <a href="#" aria-label="Shopping Cart" title="Shopping Cart"><i class="fas fa-shopping-basket"></i></a>
                <a href="#" aria-label="Search" title="Search"><i class="fas fa-search"></i></a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Empowering Your Tech Experience</h1>
            <p>Your gateway to the latest innovations in technology.</p>
            <button class="btn-hero" type="button">Explore Now</button>
        </div>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="images/iphone16.jpg" alt="iPhone 16">
                <div class="text">Slide 1 Caption</div>
            </div>
            <div class="mySlides fade">
                <img src="images/lg_tv.jpeg" alt="LG TV">
                <div class="text">Slide 2 Caption</div>
            </div>
            <div class="mySlides fade">
                <img src="images/samsung_s24.jpg" alt="Samsung S24">
                <div class="text">Slide 3 Caption</div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </section>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-list">
            <div class="product-item large-product">
                <img src="images/iphone16.jpg" alt="iPhone 16">
                <p>"The future is here."</p>
                <button onclick="location.href='product-page-iphone16.html'" class="btn-product">View Product</button>
            </div>
            <div class="product-item">
                <img src="images/lg_tv.jpeg" alt="LG TV">
                <p>"Experience every detail."</p>
                <button onclick="location.href='product-page-lg.html'" class="btn-product">View Product</button>
            </div>
            <div class="product-item">
                <img src="images/samsung_s24.jpg" alt="Samsung S24">
                <p>"Unleash your potential."</p>
                <button onclick="location.href='product-page-samsung.html'" class="btn-product">View Product</button>
            </div>
            <div class="product-item">
                <img src="images/some-other-product.jpg" alt="Some Other Product">
                <p>"Innovation at its best."</p>
                <button onclick="location.href='product-page-other.html'" class="btn-product">View Product</button>
            </div>
            <div class="product-item">
                <img src="images/yet-another-product.jpg" alt="Yet Another Product">
                <p>"Revolutionize your lifestyle."</p>
                <button onclick="location.href='product-page-yet-another.html'" class="btn-product">View Product</button>
            </div>
        </div>
    </section>

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
                <a href="#" aria-label="Sign In" title="Sign In"><i class="fas fa-user-circle"></i></a>
                <a href="#" aria-label="Shopping Cart" title="Shopping Cart"><i class="fas fa-shopping-basket"></i></a>
                <a href="#" aria-label="Contact Us" title="Contact Us"><i class="fas fa-envelope-open-text"></i></a>
            </div>
        </div>
    </footer>

    <script src="script/script.js"></script>
</body>
</html>
